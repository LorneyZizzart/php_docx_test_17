<?php
// remove headers from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateHeaderAndFooter.docx');

$docx->removeHeaders();

$docx->createDocx(__DIR__ . '/example_removeHeaders_1');