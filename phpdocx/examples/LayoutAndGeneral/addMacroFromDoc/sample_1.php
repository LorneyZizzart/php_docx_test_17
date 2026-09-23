<?php
// add a macro from an existing DOCM

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx('docm');

$docx->addMacroFromDoc(__DIR__ . '/../../files/fileMacros.docm');

// documents with macros use docm as extension
$docx->createDocx(__DIR__ . '/example_addMacroFromDoc_1.docm');