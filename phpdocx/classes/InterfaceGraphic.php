<?php

/**
 * Interface for charts
 *
 * @category   Phpdocx
 * @package    elements
 * @copyright  Copyright (c) Narcea Labs SL
 *             (https://www.narcealabs.com)
 * @license    phpdocx LICENSE
 * @link       https://www.phpdocx.com
 */
interface InterfaceGraphic
{
    /**
     * Create embedded xml chart
     *
     * @access public
     */
    public function createEmbeddedXmlChart();

    /**
     * return the tags where the data is written
     *
     * @access public
     */
    public function dataTag();

    /**
     * return the object type of the xlsx
     *
     * @access public
     */
    public function getXlsxType();
}
