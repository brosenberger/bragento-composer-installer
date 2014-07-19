<?php
/**
 * CoreInstaller.php
 *
 * PHP Version 5
 *
 * @category  Bragento_MagentoComposerInstaller
 * @package   Bragento\Magento\Composer\Installer\Installer
 * @author    David Verholen <david@verholen.com>
 * @copyright 2014 David Verholen
 * @license   http://opensource.org/licenses/OSL-3.0 OSL-3.0
 * @link      http://www.brandung.de
 */

namespace Bragento\Magento\Composer\Installer\Installer;

use Composer\IO\IOInterface;
use Composer\Composer;
use Bragento\Magento\Composer\Installer\Util\Filesystem;
use Bragento\Magento\Composer\Installer\Deploy;


/**
 * Class CoreInstaller
 *
 * @category  Bragento_MagentoComposerInstaller
 * @package   Bragento\Magento\Composer\Installer\Installer
 * @author    David Verholen <david@verholen.com>
 * @copyright 2014 David Verholen
 * @license   http://opensource.org/licenses/OSL-3.0 OSL-3.0
 * @link      http://www.brandung.de
 */
class Core extends AbstractInstaller
{
    /**
     * Installer Constructor
     *
     * @param IOInterface    $io         IO Interface
     * @param Composer       $composer   Composer Instance
     * @param Deploy\Manager $dm         Deploy Manager
     * @param Filesystem     $filesystem Filesystem Util
     */
    public function __construct(
        IOInterface $io,
        Composer $composer,
        Deploy\Manager $dm,
        Filesystem $filesystem
    ) {
        parent::__construct(
            $io,
            $composer,
            $dm,
            Types::MAGENTO_CORE,
            $filesystem
        );
    }
}