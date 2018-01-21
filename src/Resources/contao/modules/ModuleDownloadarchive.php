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

use Patchwork\Utf8;

/**
 * Class ContentDownload
 *
 * Front end content element "download".
 * @copyright  Felix Pfeiffer 2008 - 2014
 * @author     Felix Pfeiffer :: Neue Medien 
 * @package    downloadarchive
 */
class ModuleDownloadarchive extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_downloadarchive';
	
	/**
	 * Download-archives
	 * @var string
	 */
	protected $arrDownloadarchives = array();

    protected $arrDownloadfiles = array();


	/**
	 * Return if the file does not exist
	 * @return string
	 */
	public function generate()
	{
		$this->arrDownloadarchives = unserialize($this->downloadarchive);
		
		if( $this->downloadarchive != null && !is_array($this->arrDownloadarchives) )
		{
			$this->arrDownloadarchives = array($this->downloadarchive);
		}
		
		// Return if there are no categories
		if (count($this->arrDownloadarchives) < 1)
		{
			return '';
		}
		
		if (TL_MODE == 'BE')
		{
			$title = array();
			foreach($this->arrDownloadarchives as $archive)
			{
				$objDownloadarchivee = \FelixPfeiffer\Downloadarchive\DownloadarchiveModel::findByPk($archive);
			
				$title[] = $objDownloadarchivee->title;
			}

            $objTemplate = new \BackendTemplate('be_wildcard');

            //$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['downloadarchive'][0]) . ' - ' . implode(", ",$title) . ' ###';
            $objTemplate->wildcard = '### ' . Utf8::strtoupper($GLOBALS['TL_LANG']['FMD']['downloadarchive'][0]) . ' ###';
            $objTemplate->title = $this->headline;
            $objTemplate->id = $this->id;
            $objTemplate->link = $this->name;
            $objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;
            return $objTemplate->parse();

		}

		$this->checkForPublishedArchives();

        $this->import('FrontendUser', 'User');

        foreach($this->arrDownloadarchives as $archive)
        {

            $objFiles = \FelixPfeiffer\Downloadarchive\DownloadarchiveitemsModel::findPublishedByPid($archive);

            if($objFiles === null) continue;

            while($objFiles->next())
            {
                $objFile = \FilesModel::findByUuid($objFiles->singleSRC);

                if(!file_exists(TL_ROOT . '/' . $objFile->path) || ($objFiles->guests && FE_USER_LOGGED_IN) || ($objFiles->protected == 1 && !FE_USER_LOGGED_IN && !BE_USER_LOGGED_IN))
                {
                    continue;
                }

                $arrGroups = deserialize($objFiles->groups);

                if ($objFiles->protected == 1 && is_array($arrGroups) && count(array_intersect($this->User->groups, $arrGroups)) < 1 && !BE_USER_LOGGED_IN)
                {
                    continue;
                }

                $allowedDownload = trimsplit(',', strtolower($GLOBALS['TL_CONFIG']['allowedDownload']));

                if (!in_array($objFile->extension, $allowedDownload))
                {
                    continue;
                }

                $arrFile = $objFiles->row();

                $filename = $objFile->path;

                $arrFile['filename'] = $filename;

                $this->arrDownloadfiles[$archive][$filename] = $arrFile;
            }
        }

        $file = \Input::get('file', true);

        // Send the file to the browser and do not send a 404 header (see #4632)
        if ($file != '' && !preg_match('/^meta(_[a-z]{2})?\.txt$/', basename($file)))
        {
            foreach ($this->arrDownloadfiles as $k=>$archive)
            {
                if(array_key_exists($file,$archive))
                {
                    \Controller::sendFileToBrowser($file);
                }
            }
        }


		return parent::generate();
	}


	/**
	 * Generate content element
	 */
	protected function compile()
	{
		global $objPage;
        $this->import('StringUtil');

		$arrDownloadFiles = array();

		$time = time();


		foreach($this->arrDownloadfiles as $k=>$archive)
		{

			$objArchive = \FelixPfeiffer\Downloadarchive\DownloadarchiveModel::findByPk($k);

            $strLightboxId = 'lightbox[' . substr(md5($objArchive->title . '_' . $objArchive->id), 0, 6) . ']';

			foreach($archive as $f => $arrFile)
			{

                #$objFile = \FilesModel::findByUuid($arrFile['singleSRC']);
                $objFile = new \File($f, true);

                // Clean the RTE output
                if ($objPage->outputFormat == 'xhtml')
                {
                    $arrFile['description'] = \StringUtil::toXhtml($arrFile['description']);
                }
                else
                {
                    $arrFile['description'] = \StringUtil::toHtml5($arrFile['description']);
                }

                $arrFile['description'] = \StringUtil::encodeEmail($arrFile['description']);
				$arrFile['css'] = ( $objArchive->class != "" ) ? $objArchive->class . ' ' : '';

				$arrFile['ctime'] = $objFile->ctime;
				$arrFile['ctimeformated'] = date($GLOBALS['TL_CONFIG']['dateFormat'], $objFile->ctime);
                $arrFile['mtime'] = $objFile->mtime;
				$arrFile['mtimeformated'] = date($GLOBALS['TL_CONFIG']['dateFormat'], $objFile->mtime);
                $arrFile['atime'] = $objFile->mtime;
				$arrFile['atimeformated'] = date($GLOBALS['TL_CONFIG']['dateFormat'], $objFile->atime);


                // Add an image
                if ($arrFile['addImage'] && $arrFile['imgSRC'] != '')
                {
                    $objModel = \FilesModel::findByUuid($arrFile['imgSRC']);

                    if (is_file(TL_ROOT . '/' . $objModel->path))
                    {
                        $size = deserialize($arrFile['size']);

                        $arrFile['imgSRC'] = $arrFile['imgSrc'] = \Image::get($objModel->path,$size[0],$size[1],$size[2]);

                        // Image dimensions
                        if (($imgSize = @getimagesize(TL_ROOT .'/'. rawurldecode($arrFile['imgSRC']))) !== false)
                        {
                            $arrFile['arrSize'] = $imgSize;
                            $arrFile['imageSize'] = ' ' . $imgSize[3];
                        }

                        $arrFile['imgHref'] = $objModel->path;
                        $arrFile['alt'] = specialchars($arrFile['alt']);
                        $arrFile['imagemargin'] = $this->generateMargin(deserialize($arrFile['imagemargin']), 'padding');
                        $arrFile['floating'] = in_array($arrFile['floating'], array('left', 'right')) ? sprintf(' float:%s;', $arrFile['floating']) : '';
                        $arrFile['addImage'] = true;

                        $arrFile['lightbox'] = ($objPage->outputFormat == 'xhtml' || VERSION < 2.11) ? ' rel="' . $strLightboxId . '"' : ' data-lightbox="' . substr($strLightboxId, 9, -1) . '"';

                    }
                }

				$arrFile['size'] = $this->getReadableSize($objFile->filesize);

				$src = TL_ASSETS_URL . 'assets/contao/images/' . $objFile->icon;
				
				if (($imgSize = @getimagesize(TL_ROOT . '/' . $src)) !== false)
				{
					$arrFile['iconSize'] = ' ' . $imgSize[3];
				}
		
				$arrFile['icon'] = $src;
				$arrFile['href'] = $this->Environment->request . (stristr($this->Environment->request,'?') ? '&' : '?') . 'file=' . $this->urlEncode($f);
				
				$arrFile['archive'] = $objArchive->title;
				
				$strSorting = str_replace(array(' ASC',' DESC'),'',$this->downloadSorting);
				
				$arrDownloadFiles[$arrFile[$strSorting]][] =  $arrFile;
				
			}
		}
		
		if(stristr($this->downloadSorting,'DESC')) krsort($arrDownloadFiles);
		else ksort($arrDownloadFiles);
		
		$arrFiles = array();
		
		foreach($arrDownloadFiles as $row)
		{
			foreach($row as $file)
			{
				$arrFiles[] = $file;
			} 
		}
		
		if($this->downloadNumberOfItems > 0)
		{
			$arrFiles = array_slice($arrFiles,0,$this->downloadNumberOfItems);
		}
		
		$i=0;
		$length = count($arrFiles);
		
		if($this->perPage > 0)
		{
			
			// Get the current page
			$page = $this->Input->get('page') ? $this->Input->get('page') : 1;

			if ($page > ($length/$this->perPage))
			{
				$page = ceil($length/$this->perPage);
			}
			
			$offset = ((($page > 1) ? $page : 1) - 1) * $this->perPage;
			
			$arrFiles = array_slice($arrFiles,$offset,$this->perPage);
			
			// Add pagination menu
			$objPagination = new Pagination($length, $this->perPage);
			$this->Template->pagination = $objPagination->generate("\n  ");
			
			$length = count($arrFiles);
			
		}
		
		foreach($arrFiles as $file)
		{
			$class = "";
			if($i++ == 0) $class = "first ";
			$class .= ( $i % 2 == 0 ) ? "even" : "odd";
			if($i == $length) $class .= " last";
			
			$arrFiles[$i-1]['css'] .= $class;
		}
		
		
		if(count($arrFiles) < 1)
		{
			$this->Template->arrFiles = $GLOBALS['TL_LANG']['MSC']['keinDownload'];
		}
		else 
		{
			$this->Template->showMeta = $this->downloadShowMeta ? true : false;
			$this->Template->hideDate = $this->downloadHideDate ? true : false;
			$this->Template->arrFiles = $arrFiles;
		}
	}
	
	protected function checkForPublishedArchives()
	{
		$arrNew = array();
		foreach($this->arrDownloadarchives as $archive)
		{
			$objDownloadarchive = \FelixPfeiffer\Downloadarchive\DownloadarchiveModel::findPublishedById($archive);
			
			if($objDownloadarchive !== null) $arrNew[] = $objDownloadarchive->id;
			
		}
		
		$this->arrDownloadarchives = $arrNew;
		
	}
}

?>