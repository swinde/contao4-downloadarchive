<?php
/**
 * @copyright  Felix Pfeiffer 2018 <m.cupic@gmx.ch>
 * @author     Felix Pfeiffer
 * @package    GalleryCreatrBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/markocupic/gallery-creator-bundle
 *
 */
namespace FelixPfeiffer\Downloadarchive\ContaoManager;

use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

/**
 * Plugin for the Contao Manager.
 *
 * @author Felix Pfeiffer
 */
class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create('FelixPfeiffer\Downloadarchive\FelixPfeifferDownloadarchive')
                ->setLoadAfter(['Contao\CoreBundle\ContaoCoreBundle'])
                ->setReplace(['downloadarchive']),
        ];
    }
}