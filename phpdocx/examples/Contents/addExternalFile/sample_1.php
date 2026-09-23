<?php
// add a DOCX as external file

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('We are going to insert now a full Word document. Beware that this method is not compatible with legacy versions of Word running the docx compatibility pack.');
$docx->addExternalFile(array('src' => __DIR__ . '/../../files/Text.docx'));
$docx->addText('A new paragraph.');

$docx->createDocx(__DIR__ . '/example_addDOCX');