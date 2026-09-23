<?php
// add a chart from a XLSX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('We will now add a chart from a XLSX:');

$paramsChart = array(
    'externalXLSX' => array(
        'src' => __DIR__ . '/../../files/Book.xlsx',
    ),
    'sizeX' => 10,
    'sizeY' => 5,
);
$docx->addChart($paramsChart);

$docx->createDocx(__DIR__ . '/example_addChart_15');