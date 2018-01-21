<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @copyright  Felix Pfeiffer 2008
 * @author     Felix Pfeiffer :: Neue Medien
 * @package    downloadarchive
 * @license    LGPL
 */


/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace FelixPfeiffer\Downloadarchive;


/**
 * Reads and writes news
 *
 * @package   Models
 * @copyright  Felix Pfeiffer 2008 - 2014
 * @author     Felix Pfeiffer :: Neue Medien
 */
class DownloadarchiveitemsModel extends \Model
{

	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_downloadarchiveitems';

    /**
     * Find all published files by their parent IDs
     *
     * @param integer $intPid      The archive ID
     * @param array   $arrOptions An optional options array
     *
     * @return \Model|null The model or null if there is no published page
     */
    public static function findPublishedByPid($intPid, array $arrOptions=array())
    {
        $t = static::$strTable;
        $arrColumns = array("$t.pid=?");

        if (!BE_USER_LOGGED_IN)
        {
            $time = time();
            $arrColumns[] = "($t.start='' OR $t.start<$time) AND ($t.stop='' OR $t.stop>$time) AND $t.published=1";
        }

        return static::findBy($arrColumns, $intPid, $arrOptions);
    }
}
