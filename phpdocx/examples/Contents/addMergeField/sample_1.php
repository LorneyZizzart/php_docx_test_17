<?php
// add a merge field

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('This example illustrates how to add a mergefield to a Word document.');

$mergeParameters = array(
	'textBefore' => 'A mergefield example: ',
	'textAfter' => ' and some text afterwards.'
);
$options = array('color' => 'B70000');
$docx->addMergeField('MyMergeField example', $mergeParameters, $options);

// remove the shading from the mergeField data
$docx->docxSettings(array('doNotShadeFormData' => 0));

$docx->createDocx(__DIR__ . '/example_addMergeField_1');