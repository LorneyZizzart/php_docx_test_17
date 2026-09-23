<?php
// process the variables (placeholders) from an existing DOCX to clean them

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateVariables.docx');

//You may include manually the list of variables that should be preprocessed or use
//the getTemplateVariables method for an automatic listing
$variables = $docx->getTemplateVariables();
$docx->processTemplate($variables);

$docx->createDocx(__DIR__ . '/example_processTemplate_1');