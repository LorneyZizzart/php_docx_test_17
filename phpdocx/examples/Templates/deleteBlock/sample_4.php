<?php
// delete an inline block content from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateBlocks_4_symbols.docx');
$docx->setTemplateSymbol('${', '}');

$docx->deleteBlock('INTERNAL', 'inline');

$docx->createDocx(__DIR__ . '/example_deleteBlock_4');