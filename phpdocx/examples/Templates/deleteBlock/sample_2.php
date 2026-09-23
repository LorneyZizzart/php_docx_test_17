<?php
// delete a block content from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateBlocks_symbols.docx');
$docx->setTemplateSymbol('${', '}');

$docx->deleteBlock('FIRST');

$docx->createDocx(__DIR__ . '/example_deleteBlock_2');