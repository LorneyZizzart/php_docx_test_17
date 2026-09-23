<?php
// replace image variables (placeholders) in headers from an existing DOCX using a stream source and a fit type replacement. The placeholder has been added to the alt text content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/placeholderImage.docx');

$image_1 = array(
    'width' => 'fit',
);

$docx->replacePlaceholderImage('LOGO', __DIR__ . '/../../img/logo_header.jpg', $image_1);

$docx->createDocx(__DIR__ . '/example_replacePlaceholderImage_7');