<?php
// return the variables (placeholders) from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateVariables_symbols.docx');
$docx->setTemplateSymbol('${', '}');

print_r($docx->getTemplateVariables());