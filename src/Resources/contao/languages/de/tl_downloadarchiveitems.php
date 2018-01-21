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
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title'] = array('Titel', 'Der Titel wird als Linktext angezeigt. Er sollte die Datei möglichst kurz beschreiben.<br />(z.B. Preisliste Produkt1)');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['description'] = array('Beschreibung', 'Mit der Beschreibung können Sie genauere Informationen zur Datei angeben. Der Inhalt kann, je nach Template, passend zu einer Datei angezeigt werden.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['singleSRC'] = array('Datei', 'Wählen Sie die Datei aus, die heruntergeladen werden soll.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protected']   = array('Element schützen', 'Das Element nur bestimmten Gruppen anzeigen.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['guests']      = array('Nur Gästen anzeigen', 'Das Element nur Gästen zeigen.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['groups']      = array('Erlaubte Mitgliedergruppen', 'Hier können Sie festlegen, welche Mitgliedergruppen das Element sehen können.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['addImage']     = array('Ein Bild einfügen', 'Wenn Sie diese Option wählen, wird dem Beitrag ein Bild hinzugefügt.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImage']     = array('Bildlink', 'Soll das Bild mit einem Link versehen werden?');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['published']     = array('Veröffentlicht', 'Solange Sie diese Option nicht wählen, ist das Downloadelement für die Besucher Ihrer Webseite nicht sichtbar.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['start']        = array('Anzeigen ab', 'Die Datei erst ab diesem Tag auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['stop']         = array('Anzeigen bis', 'Die Datei nur bis zu diesem Tag auf der Webseite anzeigen.');

/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['deleteConfirm'] = 'Möchten Sie die Datei ID %s wirklich aus dem Download-Archiv entfernen?\n(Die Datei wird dabei NICHT vom Server gelöscht)';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference']['0'] = 'kein';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference']['1'] = 'Großansicht';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['useImageReference']['2'] = 'Downloadlink';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['new']    = array('Neue Datei', 'Erstellen Sie eine neue Datei.');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['edit']   = array('Datei bearbeiten', 'Bearbeiten Sie die Datei ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['copy']   = array('Datei kopieren', 'Kopieren Sie die Datei ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['cut']   = array('Datei verschieben', 'Kopieren Sie die Datei ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['delete'] = array('Datei löschen', 'Entfernen Sie die Datei ID %s');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['toggle']     = array('Datei  veröffentlichen/unveröffentlichen', 'Die Datei mit der ID %s veröffentlichen/unveröffentlichen');
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['show']   = array('Dateidetails anzeigen', 'Zeigen Sie die Details zur Datei ID %s');

/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['title_legend']      = 'Titel & Beschreibung';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['file_legend']       = 'Datei';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['image_legend']      = 'Foto anzeigen';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['protection_legend'] = 'Dateifreigabe';
$GLOBALS['TL_LANG']['tl_downloadarchiveitems']['publish_legend']    = 'Veröffentlichung';
