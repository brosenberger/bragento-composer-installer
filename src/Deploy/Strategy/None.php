<?php
/**
 * None.php
 *
 * PHP Version 5
 *
 * @category  Bragento_MagentoComposerInstaller
 * @package   Bragento\Magento\Composer\Installer\Deploy\Strategy
 * @author    David Verholen <david.verholen@brandung.de>
 * @copyright 2014 Brandung GmbH & Co. KG
 * @license   http://opensource.org/licenses/OSL-3.0 OSL-3.0
 * @link      http://www.brandung.de
 */

namespace Bragento\Magento\Composer\Installer\Deploy\Strategy;

/**
 * Class None
 *
 * @category  Bragento_MagentoComposerInstaller
 * @package   Bragento\Magento\Composer\Installer\Deploy\Strategy
 * @author    David Verholen <david.verholen@brandung.de>
 * @copyright 2014 Brandung GmbH & Co. KG
 * @license   http://opensource.org/licenses/OSL-3.0 OSL-3.0
 * @link      http://www.brandung.de
 */
class None extends AbstractStrategy
{
    /**
     * createDelegates
     *
     * @return void
     */
    protected function createDelegates()
    {

    }

    /**
     * removeDelegates
     *
     * @return void
     */
    protected function removeDelegates()
    {

    }

    /**
     * createDelegate
     *
     * @param string $src
     * @param string $dest
     *
     * @return mixed
     */
    protected function createDelegate($src, $dest)
    {

    }

    /**
     * removeDelegate
     *
     * @param string $delegate
     *
     * @return mixed
     */
    protected function removeDelegate($delegate)
    {

    }
}
