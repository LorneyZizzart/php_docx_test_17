<?php

/**
 * Theme math equations
 *
 * @category   Phpdocx
 * @package    theme
 * @copyright  Copyright (c) Narcea Labs SL
 *             (https://www.narcealabs.com)
 * @license    phpdocx LICENSE
 * @link       https://www.phpdocx.com
 */
class ThemeMath
{
    /**
     * Theme math equation
     *
     * @access public
     * @param string $equation Math equation content
     * @param array $options Theme options
     * @return string
     */
    public function theme($equation, $options)
    {
        $xmlUtilities = new XmlUtilities();
        $equationStyledDOM = $xmlUtilities->generateDomDocument($equation, true);

        if (isset($options['bold']) || isset($options['italic'])) {
            $styleMPR = '';
            if (isset($options['bold']) && $options['bold']) {
                $styleMPR .= 'b';
            }
            if (isset($options['italic']) && $options['italic']) {
                $styleMPR .= 'i';
            }
            if (isset($options['bold']) && !$options['bold'] && isset($options['italic']) && !$options['italic']) {
                $styleMPR = 'p';
            }
            $elementsMR = $equationStyledDOM->getElementsByTagName('m:r');
            if ($elementsMR->length > 0) {
                foreach ($elementsMR as $elementMR) {
                    $elementRPR = $elementMR->getElementsByTagName('m:rPr');
                    // w:rPR doesn't exist, create it
                    if ($elementRPR->length == 0) {
                        $elementTag = $elementMR->ownerDocument->createElement('m:rPr');
                        $elementMR->insertBefore($elementTag, $elementMR->firstChild);

                        $elementRPRItem = $elementTag;
                    } else {
                        $elementRPRItem = $elementRPR->item(0);
                    }

                    // add the style only if not exists, otherwise change it
                    $elementMSTY = $elementRPRItem->getElementsByTagName('m:sty');
                    if ($elementMSTY->length == 0) {
                        $elementTag = $elementRPRItem->ownerDocument->createElement('m:sty');
                        $elementRPRItem->appendChild($elementTag);

                        $elementMSTYItem = $elementTag;
                    } else {
                        $elementMSTYItem = $elementMSTY->item(0);
                    }
                    $elementMSTYItem->setAttribute('m:val', $styleMPR);
                }
            }
        }

        if (isset($options['color'])) {
            $elementsMR = $equationStyledDOM->getElementsByTagName('m:r');
            if ($elementsMR->length > 0) {
                foreach ($elementsMR as $elementMR) {
                    $elementRPR = $elementMR->getElementsByTagName('w:rPr');
                    // w:rPR doesn't exist, create it
                    if ($elementRPR->length == 0) {
                        $elementTag = $elementMR->ownerDocument->createElement('w:rPr');
                        $elementMR->insertBefore($elementTag, $elementMR->firstChild);

                        $elementRPRItem = $elementTag;
                    } else {
                        $elementRPRItem = $elementRPR->item(0);
                    }

                    // add the style only if not exists, otherwise change it
                    $elementColor = $elementRPRItem->getElementsByTagName('w:color');
                    if ($elementColor->length == 0) {
                        $elementTag = $elementRPRItem->ownerDocument->createElement('w:color');
                        $elementRPRItem->appendChild($elementTag);

                        $elementColorItem = $elementTag;
                    } else {
                        $elementColorItem = $elementColor->item(0);
                    }
                    $elementColorItem->setAttribute('w:val', $options['color']);
                }
            }
        }

        if (isset($options['fontSize'])) {
            $elementsMR = $equationStyledDOM->getElementsByTagName('m:r');
            if ($elementsMR->length > 0) {
                foreach ($elementsMR as $elementMR) {
                    $elementRPR = $elementMR->getElementsByTagName('w:rPr');
                    // w:rPR doesn't exist, create it
                    if ($elementRPR->length == 0) {
                        $elementTag = $elementMR->ownerDocument->createElement('w:rPr');
                        $elementMR->insertBefore($elementTag, $elementMR->firstChild);

                        $elementRPRItem = $elementTag;
                    } else {
                        $elementRPRItem = $elementRPR->item(0);
                    }

                    // add the style only if not exists, otherwise change it
                    $elementRPRSZ = $elementRPRItem->getElementsByTagName('w:sz');
                    $elementRPRSZCS = $elementRPRItem->getElementsByTagName('w:szCs');
                    if ($elementRPRSZ->length == 0) {
                        $elementTag = $elementRPRItem->ownerDocument->createElement('w:sz');
                        $elementRPRItem->appendChild($elementTag);

                        $elementRPRSZItem = $elementTag;
                    } else {
                        $elementRPRSZItem = $elementRPRSZ->item(0);
                    }
                    $elementRPRSZItem->setAttribute('w:val', (int)$options['fontSize']*2);
                    if ($elementRPRSZCS->length == 0) {
                        $elementTag = $elementRPRItem->ownerDocument->createElement('w:szCs');
                        $elementRPRItem->appendChild($elementTag);

                        $elementRPRSZCSItem = $elementTag;
                    } else {
                        $elementRPRSZCSItem = $elementRPRSZ->item(0);
                    }
                    $elementRPRSZCSItem->setAttribute('w:val', (int)$options['fontSize']*2);
                }
            }
        }

        if (isset($options['underline'])) {
            $elementsMR = $equationStyledDOM->getElementsByTagName('m:r');
            if ($elementsMR->length > 0) {
                foreach ($elementsMR as $elementMR) {
                    $elementRPR = $elementMR->getElementsByTagName('w:rPr');
                    // w:rPR doesn't exist, create it
                    if ($elementRPR->length == 0) {
                        $elementTag = $elementMR->ownerDocument->createElement('w:rPr');
                        $elementMR->insertBefore($elementTag, $elementMR->firstChild);

                        $elementRPRItem = $elementTag;
                    } else {
                        $elementRPRItem = $elementRPR->item(0);
                    }

                    // add the style only if not exists, otherwise change it
                    $elementU = $elementRPRItem->getElementsByTagName('w:u');
                    if ($elementU->length == 0) {
                        $elementTag = $elementRPRItem->ownerDocument->createElement('w:u');
                        $elementRPRItem->appendChild($elementTag);

                        $elementUItem = $elementTag;
                    } else {
                        $elementUItem = $elementU->item(0);
                    }
                    $elementUItem->setAttribute('w:val', $options['underline']);
                }
            }
        }

        return $equationStyledDOM->saveXML($equationStyledDOM->documentElement);
    }
}