<?php
// add a caption

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('A new caption:');

$options = array(
    'fontSize' => 32,
);
$docx->addCaption('Sample caption', $options);

$docx->createDocx(__DIR__ .  '/example_addCaption_1');