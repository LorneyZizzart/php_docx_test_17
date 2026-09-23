<?php
// modify page layout to A4-landscape and 2 columns

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/MultipleSections.docx');

// using the sectionNumbers option one may choose the sections to modify
$docx->modifyPageLayout('A4-landscape', array('numberCols' => '2', 'sectionNumbers' => array(2)));

$docx->createDocx(__DIR__ . '/example_modifyPageLayout_2');