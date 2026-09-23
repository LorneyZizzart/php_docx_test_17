<?php
// parse styles from an existing DOCX with character styles

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateCharacterStyles.docx');

$docx->parseStyles();

$docx->createDocx(__DIR__ . '/example_parseStyles_3');