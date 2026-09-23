<?php
// replace a text variable (placeholder) with an external file from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateExternalFile.docx');

$docx->replaceVariableByExternalFile(array('EXTERNAL' => __DIR__ . '/../../files/External.docx'), array('matchSource' => true));

$docx->createDocx(__DIR__ . '/example_replaceVariableByExternalFile_1');