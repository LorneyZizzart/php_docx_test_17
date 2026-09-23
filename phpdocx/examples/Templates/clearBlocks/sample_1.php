<?php
// remove block placeholders from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateBlocks.docx');

$docx->clearBlocks();

$docx->createDocx(__DIR__ . '/example_clearBlocks_1');