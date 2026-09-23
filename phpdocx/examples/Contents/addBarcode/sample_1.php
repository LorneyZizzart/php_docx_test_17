<?php
// add barcode elements

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// add a barcode link
$docx->addBarcode('https://www.phpdocx.com', 'QR');

// add a barcode CODE128 with the data text
$docx->addBarcode('490123456789', 'CODE128', array('\t'));

// add a barcode CODE39 with Start/Stop characters and the data text
$docx->addBarcode('2345678', 'CODE39', array('\d', '\t'));

// add a barcode as WordFragment
$barcodeFragment = new WordFragment();
$barcodeFragment->addBarcode('https://www.phpdocx.com', 'QR', array('\f FF0000'));
$text = array();
$text[] = array(
    'text' => 'A barcode added as WordFragment: ',
    'bold' => true,
);
$text[] = $barcodeFragment;
$docx->addText($text);

$docx->createDocx(__DIR__ . '/example_addBarcode_1');