<?php
// create and apply a custom list style using a custom type numbering format

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// custom options
$latinListOptions = array();
$latinListOptions[0]['typeCustom'] = '001, 002, 003, ...';
$latinListOptions[0]['format'] = '%1.';

$docx->createListStyle('padthreenumbering', $latinListOptions);

// list items
$myList = array('item 1', 'item 2', 'item 3');

// insert the custom list into the Word document
$docx->addList($myList, 'padthreenumbering');

$docx->createDocx(__DIR__ . '/example_createListStyle_6');