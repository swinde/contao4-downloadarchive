<?php
/**
 * @copyright  Felix Pfeiffer 2018 <m.cupic@gmx.ch>
 * @author     Felix Pfeiffer
 * @package    GalleryCreatrBundle
 * @license    LGPL-3.0+
 * @see	       https://github.com/markocupic/gallery-creator-bundle
 *
 */
namespace Swinde\Downloadarchive\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Swinde\Downloadarchive\SwindeDownloadarchive;

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
            BundleConfig::create(SwindeDownloadarchive::class)
                ->setLoadAfter([ContaoCoreBundle::class]),

        ];
    }
}
