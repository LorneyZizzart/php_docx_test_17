<?php
// parse styles from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/simpleTemplate.docx');

// parse styles of the current template
// notice that besides the original template styles PHPDocX has included additional useful styles
$docx->parseStyles();

$docx->createDocx(__DIR__ . '/example_parseStyles_2');