<?php
// transform a DOCX to TXT

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$options = array('paragraph' => true, 'list' => true, 'table' => true, 'footnote' => true, 'endnote' => true, 'chart' => 0);
CreateDocx::DOCX2TXT(__DIR__ . '/../../files/second.docx', __DIR__ . '/document_1.txt', $options);