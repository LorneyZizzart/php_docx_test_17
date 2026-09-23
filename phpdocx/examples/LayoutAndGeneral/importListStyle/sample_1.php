<?php
// import list styles from an existing DOCX and use them to add a new content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// import custom list styles
$docx->importListStyle(__DIR__ . '/../../files/TemplateStyleList.docx', '1', 'myliststyle');

$itemList = array(
    'Line 1',
    'Line 2',
    'Line 3',
    'Line 4',
    'Line 5'
);
// add a list using an imported numbering style
$docx->addList($itemList, 'myliststyle');

$docx->createDocx(__DIR__ . '/example_importListStyle_1');