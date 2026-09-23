<?php
// generate a DOCX from a TXT file

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->txt2docx(__DIR__ . '/../../files/Text.txt');

$docx->createDocx(__DIR__ . '/example_txt2docx');