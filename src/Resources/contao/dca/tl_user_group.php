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
 * Extend default palette
 */
$GLOBALS['TL_DCA']['tl_user_group']['palettes']['default'] = str_replace('fop;', 'fop;{downloadarchive_legend},downloadarchives,downloadarchivep;', $GLOBALS['TL_DCA']['tl_user_group']['palettes']['default']);


/**
 * Add fields to tl_user_group
 */
$GLOBALS['TL_DCA']['tl_user_group']['fields']['downloadarchives'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['downloadarchives'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_downloadarchive.title',
	'eval'                    => array('multiple'=>true),
    'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_user_group']['fields']['downloadarchivep'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_user']['downloadarchivep'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options'                 => array('create', 'delete'),
	'reference'               => &$GLOBALS['TL_LANG']['MSC'],
	'eval'                    => array('multiple'=>true),
    'sql'                     => "blob NULL"
);

