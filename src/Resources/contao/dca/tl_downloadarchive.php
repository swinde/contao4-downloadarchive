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
 * Load tl_content language file
 */
$this->loadLanguageFile('tl_content');

/**
 * Table tl_downloadarchive 
 */
$GLOBALS['TL_DCA']['tl_downloadarchive'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'					  => array('tl_downloadarchiveitems'),
		'enableVersioning'            => true,
		'switchToEdit'				  => true,
		'onload_callback'             => array
		(
			array('tl_downloadarchive', 'checkPermission')
		),
		'onsubmit_callback'			  => array
        (
            array('tl_downloadarchive','loadDirectory')
        ),
        'sql' => array
        (
            'keys' => array
            (
                'id' => 'primary'
            )
        )
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'			  => 'sort,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_downloadarchive']['edit'],
				'href'                => 'table=tl_downloadarchiveitems',
				'icon'                => 'edit.gif'
			),
            'editheader' => array
            (
                'label'               => &$GLOBALS['TL_LANG']['tl_downloadarchive']['editheader'],
                'href'                => 'act=edit',
                'icon'                => 'header.gif'
            ),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_downloadarchive']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
				'button_callback'     => array('tl_downloadarchive', 'copyArchive')
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_downloadarchive']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['tl_downloadarchive']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"',
				'button_callback'     => array('tl_downloadarchive', 'deleteArchive')
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_downloadarchive']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('loadDirectory'),
		'default'                     => '{title_legend},title,class;{directory_legend:hide},loadDirectory;{publish_legend},published,start,stop'
	),
	
	// Subpalettes
	'subpalettes' => array
	(
		'loadDirectory'                   => 'dirSRC,loadSubdir,extension,prefix,publishAll'
	),
	
	// Fields
	'fields' => array
	(
        'id' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL auto_increment"
        ),
        'tstamp' => array
        (
            'sql'                     => "int(10) unsigned NOT NULL default '0'"
        ),
        'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
            'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'loadDirectory' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
            'sql'                     => "char(1) NOT NULL default ''"
		),
		'loadSubdir' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50'),
            'sql'                     => "char(1) NOT NULL default ''"
		),
		'dirSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('files'=>false, 'fieldType'=>'radio','tl_class'=>'w50'),
            'sql'                     => "binary(16) NULL"
		),
		'prefix' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>100,'tl_class'=>'w50'),
            'sql'                     => "varchar(100) NOT NULL default ''"
		),
		'extension' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255,'tl_class'=>'clr w50'),
            'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'publishAll' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr m12'),
            'sql'                     => "char(1) NOT NULL default '0'"
		),
		'class' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['class'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255),
            'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['published'],
			'default'				  => true,
			'exclude'                 => true,
			'inputType'               => 'checkbox',
            'sql'                     => "char(1) NOT NULL default '1'"
		),
		'start' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['start'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
		),
		'stop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_downloadarchive']['stop'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
            'sql'                     => "varchar(10) NOT NULL default ''"
		)
	)
);


/**
 * Class tl_downloadarchive
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  2008 Felix Pfeiffer : Neue Medien
 * @author     Felix Pfeiffer <info@felixpfeiffer.com>
 * @package    Downlaodarchiv
 */
class tl_downloadarchive extends Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
	
	
	/**
	 * Check permissions to edit table tl_downloadarchive
	 */
	public function checkPermission()
	{

		if ($this->User->isAdmin)
		{
			return;
		}

		// Set root IDs
		if (!is_array($this->User->downloadarchives) || empty($this->User->downloadarchives))
		{
			$root = array(0);
		}
		else
		{
			$root = $this->User->downloadarchives;
		}

		$GLOBALS['TL_DCA']['tl_downloadarchive']['list']['sorting']['root'] = $root;

		
		// Check permissions to add downloadarchives
		if (!$this->User->hasAccess('create', 'downloadarchivep'))
		{
			$GLOBALS['TL_DCA']['tl_downloadarchive']['config']['closed'] = true;
		}

		// Check current action
		switch ($this->Input->get('act'))
		{
			case 'create':
			case 'select':
				// Allow
				break;

			case 'edit':
				// Dynamically add the record to the user profile
				if (!in_array($this->Input->get('id'), $root))
				{
					$arrNew = $this->Session->get('new_records');

					if (is_array($arrNew['tl_downloadarchive']) && in_array($this->Input->get('id'), $arrNew['tl_downloadarchive']))
					{
						
						// Add permissions on user level
						if ($this->User->inherit == 'custom' || !$this->User->groups[0])
						{
							$objUser = $this->Database->prepare("SELECT downloadarchives, downloadarchivep FROM tl_user WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->id);

							$arrDownloadarchivep = deserialize($objUser->downloadarchivep);

							if (is_array($arrDownloadarchivep) && in_array('create', $arrDownloadarchivep))
							{
								$arrdownloadarchives = deserialize($objUser->downloadarchives);
								$arrdownloadarchives[] = $this->Input->get('id');

								$this->Database->prepare("UPDATE tl_user SET downloadarchives=? WHERE id=?")
											   ->execute(serialize($arrdownloadarchives), $this->User->id);
							}
						}

						// Add permissions on group level
						elseif ($this->User->groups[0] > 0)
						{
							$objGroup = $this->Database->prepare("SELECT downloadarchives, downloadarchivep FROM tl_user_group WHERE id=?")
													   ->limit(1)
													   ->execute($this->User->groups[0]);

							$arrDownloadarchivep = deserialize($objGroup->downloadarchivep);

							if (is_array($arrDownloadarchivep) && in_array('create', $arrDownloadarchivep))
							{
								$arrdownloadarchives = deserialize($objGroup->downloadarchives);
								$arrdownloadarchives[] = $this->Input->get('id');

								$this->Database->prepare("UPDATE tl_user_group SET downloadarchives=? WHERE id=?")
											   ->execute(serialize($arrdownloadarchives), $this->User->groups[0]);
							}
						}

						// Add new element to the user object
						$root[] = $this->Input->get('id');
						$this->User->downloadarchives = $root;
					}
				}
				// No break;

			case 'copy':
			case 'delete':
			case 'show':
				if (!in_array($this->Input->get('id'), $root) || ($this->Input->get('act') == 'delete' && !$this->User->hasAccess('delete', 'downloadarchivep')))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' calendar ID "'.$this->Input->get('id').'"', 'tl_downloadarchive checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
				$session = $this->Session->getData();
				if ($this->Input->get('act') == 'deleteAll' && !$this->User->hasAccess('delete', 'downloadarchivep'))
				{
					$session['CURRENT']['IDS'] = array();
				}
				else
				{
					$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $root);
				}
				$this->Session->setData($session);
				break;

			default:
				if (strlen($this->Input->get('act')))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' downloadarchives', 'tl_downloadarchive checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}
	
	
	/**
	 * Add the type of input field
	 * @param array
	 * @return string
	 */
	public function loadDirectory(DC_Table $dc)
	{

        $objItems = \FelixPfeiffer\Downloadarchive\DownloadarchiveitemsModel::findPublishedByPid($dc->id);

        if(($objItems !== null && $objItems->numRows > 0) || !$dc->activeRecord->loadDirectory )
        {
            return;
        }

        $objFolder = \FilesModel::findByUuid($dc->activeRecord->dirSRC);

        if($objFolder->type == 'file') return;

        $this->extension = $dc->activeRecord->extension != '' ? explode(',',$dc->activeRecord->extension) : false;

        $arrFiles = $this->getFiles($objFolder->uuid,$dc->activeRecords->loadSubdir);


        if(!$arrFiles) return;

        $i=0;

        foreach($arrFiles as $file)
        {
            $objFile = new \File($file->path, true);

            $title = specialchars($objFile->basename);

            if($dc->activeRecord->prefix != '')
            {
                $title = $dc->activeRecord->prefix . ' ' . $i;
            }

            $varSet = array(
                'pid'       => $dc->activeRecord->id,
                'sorting'	=> ++$i * 64,
                'tstamp'	=> time(),
                'title'		=> $title,
                'singleSRC'	=> $file->uuid,
                'published' =>$dc->activeRecord->publishAll
            );

            \Database::getInstance()->prepare("INSERT INTO tl_downloadarchiveitems %s")
                ->set($varSet)
                ->execute();
        }
		
	}
	
	public function getFiles($varFolder, $loadSubdir=false)
	{
		$arrFiles = array();

        $objFiles = \FilesModel::findByPid($varFolder);

        if ($objFiles === null)
        {
            return false;
        }

        while ($objFiles->next())
        {

            // Skip subfolders
            if ($objFiles->type == 'folder')
            {
                #echo $objFiles->path . "<br>";
                $varSubfiles = $this->getFiles($objFiles->uuid, $loadSubdir);

                if($varSubfiles)
                {
                    $arrFiles = array_merge($arrFiles,$varSubfiles);
                }

                continue;
            }

            if($this->extension && !in_array($objFiles->extension, $this->extension)) continue;

            $arrFiles[] = $objFiles;
        }

        if(is_array($arrFiles) && count($arrFiles) > 0) return $arrFiles;
        else return false;

	}
	


	/**
	 * Return the copy archive button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function copyArchive($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $this->User->hasAccess('create', 'downloadarchivep')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}


	/**
	 * Return the delete archive button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function deleteArchive($row, $href, $label, $title, $icon, $attributes)
	{
		return ($this->User->isAdmin || $this->User->hasAccess('delete', 'downloadarchivep')) ? '<a href="'.$this->addToUrl($href.'&amp;id='.$row['id']).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ' : $this->generateImage(preg_replace('/\.gif$/i', '_.gif', $icon)).' ';
	}
}
