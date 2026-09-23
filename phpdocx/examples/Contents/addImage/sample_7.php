<?php
// add an image using an image resource

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$imageResource = imagecreatefromjpeg(__DIR__ . '/../../img/image.jpg');
$options = array(
    'src' => $imageResource,
    'resourceMode' => true,
);

$docx->addImage($options);

$docx->createDocx(__DIR__ . '/example_addImage_7');