<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Downloadarchive
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
    'FelixPfeiffer',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
    // Elements
    'FelixPfeiffer\Downloadarchive\ContentDownloadarchive'   => 'system/modules/downloadarchive/elements/ContentDownloadarchive.php',

    // Models
    'FelixPfeiffer\Downloadarchive\DownloadarchiveitemsModel' => 'system/modules/downloadarchive/models/DownloadarchiveitemsModel.php',
    'FelixPfeiffer\Downloadarchive\DownloadarchiveModel'      => 'system/modules/downloadarchive/models/DownloadarchiveModel.php',

    // Modules
    'FelixPfeiffer\Downloadarchive\ModuleDownloadarchive'     => 'system/modules/downloadarchive/modules/ModuleDownloadarchive.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
    'ce_downloadarchive'  => 'system/modules/downloadarchive/templates',
    'mod_downloadarchive' => 'system/modules/downloadarchive/templates',
));
