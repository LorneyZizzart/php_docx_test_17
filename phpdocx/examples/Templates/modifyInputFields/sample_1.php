<?php
// modify input field values from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/inputFields.docx');

$data = array(
	'textfield_1' => 'first',
	'textfield_2' => 'second',
	'sdt_1' => 'third',
	'sdt_2' => 'fourth'
);

$docx->modifyInputFields($data);

$docx->createDocx(__DIR__ . '/example_modifyInputFields_1');