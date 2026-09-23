<?php
// add an image with an URL

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$options = array(
    'src' => __DIR__ . '/../../img/image.png',
    'scaling' => 50,
    'spacingTop' => 10,
    'spacingBottom' => 0,
    'spacingLeft' => 0,
    'spacingRight' => 20,
    'hyperlink' => 'http://www.google.com',
);

$docx->addImage($options);

$docx->createDocx(__DIR__ . '/example_addImage_3');