<?php
// replace list variables (placeholders) from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateList_symbols.docx');
$docx->setTemplateSymbol('${', '}');

$items = array('First item', 'Second item', 'Third item');

$docx->replaceListVariable('LISTVAR', $items);

$docx->createDocx(__DIR__ . '/example_replaceListVariable_4');