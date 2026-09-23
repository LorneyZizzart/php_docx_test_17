<?php
// change the symbol used to wrap variables (placehoders) and replace a text variable (placeholder) with new text from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplatePipeSymbol.docx');
$docx->setTemplateSymbol('|');

$docx->replaceVariableByText(array('FIRST' => 'Hello World!'));

$docx->createDocx(__DIR__ . '/example_setTemplateSymbol_1');