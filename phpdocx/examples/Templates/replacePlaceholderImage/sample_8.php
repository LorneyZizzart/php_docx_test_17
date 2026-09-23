<?php
// replace image variables (placeholders) from an existing DOCX adding hyperlinks. The placeholder has been added to the alt text content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/placeholderImage.docx');

$image_1 = array(
	'height' => 3,
	'width' => 3,
	'target' => 'header',
	'hyperlink' => 'https://www.phpdocx.com',
);

$docx->replacePlaceholderImage('HEADERIMG', __DIR__ . '/../../img/logo_header.jpg', $image_1);
$docx->replacePlaceholderImage('LOGO', __DIR__ . '/../../img/imageP3.png', array('hyperlink' => 'https://www.phppptx.com'));

$docx->createDocx(__DIR__ . '/example_replacePlaceholderImage_8');