<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package Downloadarchive
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.assets LGPL
 */


class DownloadarchiveRunonce
{

    public function run()
    {
        $objDatabase = \Database::getInstance();

        if ($objDatabase->tableExists('tl_downloadarchiv') && $objDatabase->tableExists('tl_downloadarchivitems'))
        {
            $objDatabase->execute("RENAME TABLE tl_downloadarchiv TO tl_downloadarchive, tl_downloadarchivitems TO tl_downloadarchiveitems;");

        }

        if (version_compare(VERSION, '3.3', '<')) {
            $this->updateFileTreeFields();
        }

        if($objDatabase->fieldExists('downloadarchiv','tl_module') && $objDatabase->fieldExists('downloadarchiv','tl_content'))
        {
            $objDatabase->execute("ALTER TABLE tl_module CHANGE downloadarchiv downloadarchive text");
            $objDatabase->execute("ALTER TABLE tl_content CHANGE downloadarchiv downloadarchive text");
        }
    }


    /**
     * Update FileTree fields
     */
    public function updateFileTreeFields()
    {

        $objDatabase = \Database::getInstance();

        $arrFields = array('singleSRC','imgSRC');

        // Check the column type
        $objDesc = $objDatabase->query("DESC tl_downloadarchiveitems singleSRC");

        // Change the column type
        if ($objDesc->Type != 'binary(16)')
        {

            foreach($arrFields as $field)
            {

                $objFiles = $objDatabase->execute("SELECT id,$field FROM tl_downloadarchiveitems");

                $objDatabase->query("ALTER TABLE tl_downloadarchiveitems CHANGE $field $field binary(16) NULL");
                #$objDatabase->query("UPDATE tl_downloadarchiveitems SET $field=NULL WHERE $field='' OR $field=0");

                while ($objFiles->next())
                {
                    $objHelper = $this->generateHelperObject($this->changePath($objFiles->$field));

                    // UUID already
                    if ($objHelper->isUuid)
                    {
                        continue;
                    }

                    // Numeric ID to UUID
                    if ($objHelper->isNumeric)
                    {
                        $objFile = \FilesModel::findByPk($objHelper->value);

                        $objDatabase->prepare("UPDATE tl_downloadarchiveitems SET $field=? WHERE id=?")
                            ->execute($objFile->uuid, $objFiles->id);
                    }

                    // Path to UUID
                    else
                    {
                        $objFile = \FilesModel::findByPath($objHelper->value);

                        $objDatabase->prepare("UPDATE tl_downloadarchiveitems SET $field=? WHERE id=?")
                            ->execute($objFile->uuid, $objFiles->id);
                    }

                }

            }

        }

    }

    /**
     * Generate a helper object based on a field value
     *
     * @param mixed $value The field value
     *
     * @return \stdClass The helper object
     */
    protected function generateHelperObject($value)
    {
        $return = new \stdClass();

        if (!is_array($value))
        {
            $return->value = rtrim($value, "\x00");
            $return->isUuid = (strlen($value) == 16 && !is_numeric($return->value) && strncmp($return->value, \Config::get('uploadPath') . '/', strlen(\Config::get('uploadPath')) + 1) !== 0);
            $return->isNumeric = (is_numeric($return->value) && $return->value > 0);
        }
        else
        {
            $return->value = array_map(function($var) { return rtrim($var, "\x00"); }, $value);
            $return->isUuid = (strlen($value[0]) == 16 && !is_numeric($return->value[0]) && strncmp($return->value[0], \Config::get('uploadPath') . '/', strlen(\Config::get('uploadPath')) + 1) !== 0);
            $return->isNumeric = (is_numeric($return->value[0]) && $return->value[0] > 0);
        }

        return $return;
    }


    protected function changePath($varValue)
    {

        $strGlobalPath = $GLOBALS['TL_CONFIG']['uploadPath'];

        $re = "/(\\w+)(.*)/";

        return preg_replace($re, $strGlobalPath.'$2', $varValue);

    }

}

$objDownloadarchiveRunonce = new \DownloadarchiveRunonce();
$objDownloadarchiveRunonce->run();
