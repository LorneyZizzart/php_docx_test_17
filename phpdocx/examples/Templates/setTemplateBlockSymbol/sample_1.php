<?php
// change the symbol used to wrap blocks and delete MYBLOCK_1 from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateBlocksCustomSymbol.docx');

$docx->setTemplateBlockSymbol('MYBLOCK');

$docx->deleteBlock('1');

$docx->createDocx(__DIR__ . '/example_setTemplateBlockSymbol_1');