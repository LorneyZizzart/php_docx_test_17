<?php
// import headers and footers from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->importHeadersAndFooters(__DIR__ . '/../../files/TemplateHeaderAndFooter.docx');
$docx->addText('This is the resulting word document with imported header and footer.');
//You may import only the header with
//$docx->importHeadersAndFooters(__DIR__ . '/../../files/TemplateHeaderAndFooter.docx', 'header');
//and only the footer with
//$docx->importHeadersAndFooters(__DIR__ . '/../../files/TemplateHeaderAndFooter.docx', 'footer');

$docx->createDocx(__DIR__ . '/example_importHeadersAndFooters_1');