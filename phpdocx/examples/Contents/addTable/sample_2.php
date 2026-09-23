<?php
// add a table that includes WordFragments

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// create a few Word fragments to insert rich content in a table

$link = new WordFragment($docx);
$options = array(
    'url' => 'http://www.google.com'
);

$link->addLink('Link to Google', $options);

$image = new WordFragment($docx);
$options = array(
    'src' => __DIR__ . '/../../img/image.png'
);

$image->addImage($options);

$text = new WordFragment($docx);
$text->addText("Line A\nand more content", array('parseLineBreaks' => true));

$valuesTable = array(
    array(
        'Title A',
        'Title B',
        'Title C'
    ),
    array(
        $text,
        $link,
        $image
    )
);

$paramsTable = array(
    'tableStyle' => 'LightListAccent1PHPDOCX',
    'tableAlign' => 'center',
    'columnWidths' => array(1000, 2500, 5000),
);

$docx->addTable($valuesTable, $paramsTable);

$docx->createDocx(__DIR__ . '/example_addTable_2');