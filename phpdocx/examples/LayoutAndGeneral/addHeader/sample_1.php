<?php
// add a header

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// create a Word fragment with an image to be inserted in the header of the document
$imageOptions = array(
	'src' => __DIR__ . '/../../img/image.png',
	'dpi' => 300,
);

$headerImage = new WordFragment($docx, 'defaultHeader');
$headerImage->addImage($imageOptions);

$docx->addHeader(array('default' => $headerImage));
// add some text
$docx->addText('This document has a header with just one image.');

$docx->createDocx(__DIR__ . '/example_addHeader_1');