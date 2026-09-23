<?php
// change DOCX settings

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$settings = array(
    'view' => 'outline',
    'zoom' => 70,
);
$text = 'In this case we set the view mode as "outline" and the default zoom on opening to 70%.';
$docx->addText($text);

$docx->docxSettings($settings);

$docx->createDocx(__DIR__ . '/example_docxSettings_1');