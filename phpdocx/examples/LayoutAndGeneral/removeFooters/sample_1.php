<?php
// remove footers from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateHeaderAndFooter.docx');

$docx->removeFooters();

$docx->createDocx(__DIR__ . '/example_removeFooters_1');