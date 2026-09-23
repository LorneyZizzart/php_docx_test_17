<?php
// replace image variables (placeholders) in headers from an existing DOCX using a stream source. The placeholder has been added to the alt text content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/placeholderImage.docx');

$image_1 = array(
    'height' => 'auto',
    'streamMode' => true,
    'width' => 'auto',
    'target' => 'header',
);

$docx->replacePlaceholderImage('HEADERIMG', 'https://www.phpdocx.com/img/logo_badge.png', $image_1);

$docx->createDocx(__DIR__ . '/example_replacePlaceholderImage_3');