<?php
// add an image using a stream source

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$options = array(
    'src' => 'https://www.phpdocx.com/img/logo_badge.png',
    'imageAlign' => 'center',
    'streamMode' => true,
);

$docx->addImage($options);

$docx->createDocx(__DIR__ . '/example_addImage_4');