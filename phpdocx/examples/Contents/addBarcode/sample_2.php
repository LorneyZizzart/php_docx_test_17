<?php
// add barcode elements in header and footer

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// add a barcode in the default header setting foreground color and scaling
$barcodeFragmentHeader = new WordFragment();
$barcodeFragmentHeader->addBarcode('https://www.phpdocx.com', 'QR', array('\f FF0000', '\s 30'));
$docx->addHeader(array('default' => $barcodeFragmentHeader));

// add a barcode in the default footer setting right alignment and sizes
$barcodeFragmentFooter = new WordFragment();
$barcodeFragmentFooter->addBarcode('490123456789', 'CODE128', array('\t', '\h 800', '\w 800'), array('textAlign' => 'right'));
$docx->addFooter(array('default' => $barcodeFragmentFooter));

$docx->createDocx(__DIR__ . '/example_addBarcode_2');