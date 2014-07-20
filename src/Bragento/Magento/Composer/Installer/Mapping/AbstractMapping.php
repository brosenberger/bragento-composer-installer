<?php
/**
 * AbstractMapping.php
 *
 * PHP Version 5
 *
 * @category  Bragento_MagentoComposerInstaller
 * @package   Bragento\Magento\Composer\Installer\Mapping
 * @author    David Verholen <david.verholen@brandung.de>
 * @copyright 2014 Brandung GmbH & Co. KG
 * @license   http://opensource.org/licenses/OSL-3.0 OSL-3.0
 * @link      http://www.brandung.de
 */

namespace Bragento\Magento\Composer\Installer\Mapping;

use Bragento\Magento\Composer\Installer\Util\Filesystem;
use Bragento\Magento\Composer\Installer\Util\String;
use Composer\Package\PackageInterface;
use Symfony\Component\Finder\SplFileInfo;


/**
 * Class AbstractMapping
 *
 * @category  Bragento_MagentoComposerInstaller
 * @package   Bragento\Magento\Composer\Installer\Mapping
 * @author    David Verholen <david.verholen@brandung.de>
 * @copyright 2014 Brandung GmbH & Co. KG
 * @license   http://opensource.org/licenses/OSL-3.0 OSL-3.0
 * @link      http://www.brandung.de
 */
abstract class AbstractMapping
{
    /**
     * _mappings
     *
     * @var array
     */
    protected $_mappingsArray;

    /**
     * _moduleDir
     *
     * @var SplFileInfo
     */
    private $_moduleDir;

    /**
     * _fs
     *
     * @var Filesystem
     */
    private $_fs;

    /**
     * _package
     *
     * @var PackageInterface
     */
    private $_package;

    /**
     * construct mappings
     *
     * @param SplFileInfo      $moduleDir
     * @param PackageInterface $package
     */
    function __construct(
        SplFileInfo $moduleDir,
        PackageInterface $package
    ) {
        $this->_fs = new Filesystem();
        $this->_moduleDir = $moduleDir;
        $this->_package = $package;
    }


    /**
     * getMappingsArray
     *
     * @return array
     */
    public function getMappingsArray()
    {
        if (null === $this->_mappingsArray) {
            $this->_mappingsArray = $this->parseMappings();
        }

        return $this->_mappingsArray;
    }

    /**
     * getTranslatedMappingsArray
     *
     * parse mappings like wildcards
     *
     * @return array
     */
    public function getTranslatedMappingsArray()
    {
        return $this->translateMappings($this->getMappingsArray());
    }

    /**
     * getFs
     *
     * @return Filesystem
     */
    protected function getFs()
    {
        return $this->_fs;
    }

    /**
     * getModuleDir
     *
     * @return SplFileInfo
     */
    protected function getModuleDir()
    {
        return $this->_moduleDir;
    }

    /**
     * getPackage
     *
     * @return PackageInterface
     */
    protected function getPackage()
    {
        return $this->_package;
    }


    /**
     * _pathMappingTranslations
     *
     * get the mappings from the source and return them
     *
     * * $example = array(
     * *    $source1 => $target1,
     * *    $source2 => target2
     * * )
     *
     * @return array
     */
    abstract protected function parseMappings();

    /**
     * translateMappings
     *
     * @param array $mappings
     *
     * @return array
     */
    protected function translateMappings(array $mappings)
    {
        $translatedMap = array();
        foreach ($this->_mappingsArray as $src => $dest) {
            if (String::endsWith($src, '*')) {
                $glob = $this->getModuleDir() . DIRECTORY_SEPARATOR . $src;
                foreach (glob($glob) as $file) {
                    $newSrc = rtrim($src, '*') . basename($file);
                    $newDest = ltrim($dest . basename($file), '/\\');
                    $translatedMap[$newSrc] = $newDest;
                }
            } else {
                $translatedMap[$src] = $dest;
            }
        }

        return $translatedMap;
    }
} 
