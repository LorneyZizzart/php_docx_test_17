<?php

/**
 * XML functions
 *
 * @category   Phpdocx
 * @package    utilities
 * @copyright  Copyright (c) Narcea Labs SL
 *             (https://www.narcealabs.com)
 * @license    phpdocx LICENSE
 * @link       https://www.phpdocx.com
 */
class XmlUtilities
{
    /**
     *
     * @access public
     * @static
     * @var mixed
     */
    public static $xmlFlags = null;

    /**
     * Sets LIBXML_PARSEHUGE option
     *
     * @access public
     * @static
     */
    public static function enableHugeXmlMode() {
        self::$xmlFlags = LIBXML_PARSEHUGE;
    }

    /**
     * Generate a DOM document from a XML string
     *
     * @param string $xml XML content
     * @param bool $internalError Enable use internal errors
     */
    public function generateDomDocument($xml, $internalError = false)
    {
        $domDocument = new DOMDocument();
        if (PHP_VERSION_ID < 80000) {
            $optionEntityLoader = libxml_disable_entity_loader(true);
        }
        if ($internalError) {
            $prevValueLibXmlInternalErrors = libxml_use_internal_errors(true);
        }
        if (!self::$xmlFlags) {
            $domDocument->loadXML($xml);
        } else {
            $domDocument->loadXML($xml, self::$xmlFlags);
        }
        if (PHP_VERSION_ID < 80000) {
            libxml_disable_entity_loader($optionEntityLoader);
        }
        if ($internalError) {
            libxml_clear_errors();
            libxml_use_internal_errors($prevValueLibXmlInternalErrors);
        }

        return $domDocument;
    }

    /**
     * Generates a SimpleXMLElement from an XML string
     *
     * @param string $xml XML content
     * @return SimpleXMLElement
     */
    public function generateSimpleXmlElement($xml)
    {
        if (PHP_VERSION_ID < 80000) {
            $optionEntityLoader = libxml_disable_entity_loader(true);
        }
        if (!self::$xmlFlags) {
            $simpleXmlElement = simplexml_load_string($xml);
        } else {
            $simpleXmlElement = simplexml_load_string($xml, 'SimpleXMLElement', self::$xmlFlags);
        }
        if (PHP_VERSION_ID < 80000) {
            libxml_disable_entity_loader($optionEntityLoader);
        }

        return $simpleXmlElement;
    }

    /**
     * Parses and clean a text string to be added
     *
     * @access protected
     * @param string $content
     * @return string
     */
    public function parseAndCleanTextString($content)
    {
        $content = htmlspecialchars($content);

        // cleans UTF-8 charset removing not UTF-8 valid chars
        if (CreateDocx::$cleanUTF8) {
            // clean 0x02 character
            $content = preg_replace("/\x02/", '', $content);
        }

        return $content;
    }
}