<?php
// insert a math equation from an external DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('We extract a math equation from an external Word file:');

$docx->addMathEquation(__DIR__ . '/../../files/math.docx', 'docx');

$docx->createDocx(__DIR__ . '/example_addMathDocx_1');