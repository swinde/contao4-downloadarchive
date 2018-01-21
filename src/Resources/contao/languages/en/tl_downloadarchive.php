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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_downloadarchive']['title'] = array('Name', 'Enter a name for the download archive. This name will only be displayed in the backend.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['showMeta']     = array('Show meta data?', 'Do you want to show the upload date and the file size for each item?');
$GLOBALS['TL_LANG']['tl_downloadarchive']['loadDirectory'] = array('Read a directory?', 'You can add all files inside a choosen directory. This only works if there are no files connected to this download archive.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['loadSubdir'] = array('Scan subdirectories?', 'Do you want to scan all subdirectories?');
$GLOBALS['TL_LANG']['tl_downloadarchive']['dirSRC'] = array('Select a directory', 'Select the directory you want to scan.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['prefix'] = array('Use a name prefix', 'You can autogenerate the title for each download element by using this prefix string and an increasing number (Example: "Our Products 0001").');
$GLOBALS['TL_LANG']['tl_downloadarchive']['extension'] = array('Extensions', 'You can limit the scan to special file extensions. Please enter a comma separated list of extensions you want to be added.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['publishAll'] = array('Auto publish all files', 'Check this option to publish all files when you import the folder.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['class'] = array('CSS class', 'You can add an css class to the archive. This class will be set to every file.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['published']     = array('Published', 'Unless you choose this option the archive is not visible to the visitors of your website.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['start']        	= array('Show from', 'Do not show the archive on the website before this day.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['stop']         	= array('Show until', 'Do not show the archive on the website on and after this day.');

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_downloadarchive']['deleteConfirm'] = 'Do you really want to remove the download archive ID%?\n(The files WILL NOT be deleted from the server)';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_downloadarchive']['new']    = array('New archive', 'Create a new download archive.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['edit']   = array('Edit archive', 'Edit the archive with the ID %s.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['copy']   = array('Copy archive', 'Copy the archive with the ID %s.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['delete'] = array('Delete archive', 'Delete the archive with the ID %s.');
$GLOBALS['TL_LANG']['tl_downloadarchive']['show']   =array('Show details', 'Show the details of the archive with the ID %s.');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_downloadarchive']['title_legend']      = 'Titel';
$GLOBALS['TL_LANG']['tl_downloadarchive']['directory_legend']  = 'Read folder';
