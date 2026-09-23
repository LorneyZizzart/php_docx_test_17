<?php

/**
 * Autoloader
 *
 * @category   Phpdocx
 * @package    loader
 * @copyright  Copyright (c) Narcea Labs SL
 *             (https://www.narcealabs.com)
 * @license    phpdocx LICENSE
 * @link       https://www.phpdocx.com
 */
class AutoLoader
{
    /**
     * Main tags of relationships XML
     *
     * @access public
     * @static
     */
    public static function load()
    {
        spl_autoload_register(array('AutoLoader', 'autoloadGenericClasses'));
    }

    /**
     * Autoload phpdocx
     *
     * @access public
     * @param string $className Class to load
     */
    public static function autoloadGenericClasses($className)
    {
        $pathPhpdocx = __DIR__ . '/' . $className . '.php';
        if (file_exists($pathPhpdocx)) {
            require_once $pathPhpdocx;
        }
    }
}