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
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = array('Title', 'The title will be displayed as the download link text. It should ideally give a short and concise description of the text.<br />(eg "price product no. 1")');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = array('Description', 'Use the description to give detailed information about the file. This information will be shown with the matching file, depending on the template you\'re using.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['singleSRC'] = array('File', 'Select the file that\'s supposed to be downloaded.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected']   = array('Protect file', 'Show file to certain member groups only.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests']      = array('Show to guests only', 'Hide the file unless a member is logged in.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['groups']      = array('Allowed member groups', 'Here you can choose which groups will be allowed to download the file.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage']     = array('Add an image', 'If you choose this option, an image will be added to the news article.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImage']     = array('Imagelink', 'Do you want to use an link on the image?');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published']     = array('Published', 'Unless you choose this option the file is not visible to the visitors of your website.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['start']        	= array('Show from', 'Do not show the file on the website before this day.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['stop']         	= array('Show until', 'Do not show the file on the website on and after this day.');

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['deleteConfirm'] = 'Do you really want to remove the file with the ID %s from the download archive?\n(The file will NOT be deleted from the server)';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference']['0'] = 'none';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference']['1'] = 'Fullsize';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference']['2'] = 'Downloadlink';

/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['new']    = array('New file', 'Create a new file');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['edit']   = array('Edit file', 'Edit the file with the ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['copy']   = array('Copy file', 'Copy the file with the ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['delete'] = array('Delete file', 'Delete the file with the ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['toggle']     = array('Publish/unpublish file', 'Publish/unpublish file ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['show']   = array('File details', 'Show the details of the file with the ID %s');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend']      = 'Titel and description';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend']       = 'File';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend']      = 'Use an image';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'File protection';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend']    = 'Publishing';
