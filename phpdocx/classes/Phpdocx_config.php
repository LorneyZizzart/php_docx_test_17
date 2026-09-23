<?php
/**
 * phpdocx constants
 *
 * @category   Phpdocx
 * @package    config
 * @copyright  Copyright (c) Narcea Labs SL
 *             (https://www.narcealabs.com)
 * @license    phpdocx LICENSE
 * @link       https://www.phpdocx.com
 */
// set default locale for numeric formats
setlocale(LC_NUMERIC, 'C');

// set error level
error_reporting(PhpdocxLogger::$errorReporting);

/**
 * The default base template folder
 */
if (!defined('PHPDOCX_BASE_FOLDER')) {
    define('PHPDOCX_BASE_FOLDER', __DIR__ . '/../templates/');
}
/**
 * The default base template
 * WARNING: if you choose to change this default template you should make sure
 * that certain required styles in createDocx for formatting are exported
 */
if (!defined('PHPDOCX_BASE_TEMPLATE')) {
    define('PHPDOCX_BASE_TEMPLATE', PHPDOCX_BASE_FOLDER . 'phpdocxBaseTemplate.docx');
}
/**
 * The default path to the dompdf dir
 */
if (!defined('PHPDOCX_DIR_DOMPDF')) {
    define('PHPDOCX_DIR_DOMPDF', PHPDOCX_BASE_FOLDER . '/../pdf');
}
/**
 * The default path to the HTML parser
 */
if (!defined('PHPDOCX_DIR_PARSER')) {
    define('PHPDOCX_DIR_PARSER', PHPDOCX_BASE_FOLDER . '/../lib/dompdfParser');
}
/**
 * The allowed file extensions for HTML2WordML conversion
 */
if (!defined('PHPDOCX_ALLOWED_IMAGE_EXT')) {
    define('PHPDOCX_ALLOWED_IMAGE_EXT', 'gif,png,jpg,jpeg,bmp,svg,webp');
}