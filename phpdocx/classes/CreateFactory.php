<?php

/**
 * Simple factory, creates objects to add in other elements
 *
 * @category   Phpdocx
 * @package    factory
 * @copyright  Copyright (c) Narcea Labs SL
 *             (https://www.narcealabs.com)
 * @license    phpdocx LICENSE
 * @link       https://www.phpdocx.com
 */
class CreateFactory
{
    /**
     * Create an object
     *
     * @access public
     * @param string $type Object type
     * @return mixed
     * @static
     */
    public static function createObject($type)
    {
        return new $type();
    }

}
