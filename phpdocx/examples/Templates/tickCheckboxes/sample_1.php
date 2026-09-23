<?php
// tick checkboxes from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/Checkbox.docx');

// 1 enabled, 0 disabled
$variables = array('check1' => 1, 'check2' => 0, 'check3' => 1);
$docx->tickCheckboxes($variables);

$docx->createDocx(__DIR__ . '/example_tickCheckboxes_1');