<?php
// replace a text variable (placeholder) with a cross-reference from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/Heading_First.docx');

$link = new WordFragment($docx);
$link->addCrossReference('Page-3', array('type' => 'bookmark', 'referenceName'=> 'sample'));
$docx->replaceVariableByWordFragment(array('link' => $link));

$docx->addCrossReference('Page-1', array('type' => 'heading', 'referenceName'=> 'Heading First'));

$docx->createDocx(__DIR__ . '/example_replaceVariableByWordFragment_4');