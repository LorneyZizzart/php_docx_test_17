<?php
// change DOCX settings to set grammar and spelling values as dirty

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$text = 'Enable proofState option to set spelling and grammatical checking state';
$docx->addText($text);

$settings = array(
    'customSetting' => array(
        'tag' => 'proofState',
        'values' => array('w:grammar' => 'dirty', 'w:spelling' => 'dirty'),
    )
);
$docx->docxSettings($settings);

$docx->createDocx(__DIR__ . '/example_docxSettings_2');