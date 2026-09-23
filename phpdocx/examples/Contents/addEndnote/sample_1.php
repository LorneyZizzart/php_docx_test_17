<?php
// add an endnote

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$endnote = new WordFragment($docx, 'document');

$endnote->addEndnote(
    array(
        'textDocument' => 'endnote',
        'textEndnote' => 'The endnote we want to insert.',
    )
);

$text = array();
$text[] = array('text' => 'Here comes the ');
$text[] = $endnote;
$text[] = array('text' => ' and some other text.');

$docx->addText($text);
$docx->addText('Some other text.');

$docx->createDocx(__DIR__ . '/example_addEndnote_1');