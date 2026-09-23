<?php
// add a footer

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// create a Word fragment with an image to be inserted in the header of the document
$imageOptions = array(
	'src' => __DIR__ . '/../../img/image.png',
	'dpi' => 300,
);

$footerImage = new WordFragment($docx, 'defaultFooter');
$footerImage->addImage($imageOptions);

$docx->addFooter(array('default' => $footerImage));
// add some text
$docx->addText('This document has a footer with just one image.');

$docx->createDocx(__DIR__ . '/example_addFooter_1');