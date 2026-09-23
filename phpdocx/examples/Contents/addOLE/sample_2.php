<?php
// add OLE files using custom images

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('DOCX file:', array('bold' => true, 'fontSize' => 18));
$docx->addOLE(array('src' => __DIR__ . '/../../files/ole/sample.docx', 'image' => __DIR__ . '/../../img/imageP1.png', 'width' => 60, 'height' => 60));

$docx->createDocx(__DIR__ . '/example_addOLE_2');