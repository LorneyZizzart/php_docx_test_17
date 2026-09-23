<?php
// replace image variables (placeholders) in footnotes from an existing DOCX. The placeholder has been added to the alt text content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/placeholderImageFootnote.docx');

$image_1 = array(
	'height' => 2,
	'width' => 2,
	'target' => 'footnote',
);

$docx->replacePlaceholderImage('FOOTNOTEIMG', __DIR__ . '/../../img/logo_header.jpg', $image_1);

$docx->createDocx(__DIR__ . '/example_replacePlaceholderImage_2');