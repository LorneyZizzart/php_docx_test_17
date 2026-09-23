<?php
// add an image using relative positions

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('Image with relativeToHorizontal and relativeToVertical values.');

$options = array(
    'src' => __DIR__ . '/../../img/image.png',
    'scaling' => 50,
    'relativeToHorizontal' => 'page',
    'relativeToVertical' => 'page',
    'textWrap' => 2,
    'float' => 'right',
    'verticalAlign' => 'top',
);

$docx->addImage($options);

$docx->createDocx(__DIR__ . '/example_addImage_5');