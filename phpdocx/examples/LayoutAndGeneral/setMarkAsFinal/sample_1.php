<?php
// set mark as final to the document to prevent changing it. Premium licenses include crypto and sign features to get better protection

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->addText('This is just a simple text to help illustrate how to mark a document as final.');
$docx->addText('Beware that this \'protection\' can be easily removed by a user.');

$docx->setMarkAsFinal();

$docx->createDocx(__DIR__ . '/example_setMarkAsFinal_1');