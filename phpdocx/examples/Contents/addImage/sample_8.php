<?php
// add an image with a bookmark

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

// add a new bookmark
$docx->addBookmark(array('type' => 'start', 'name' => 'mybookmark'));
$docx->addText('Text that has been bookmarked.');
$docx->addBookmark(array('type' => 'end', 'name' => 'mybookmark'));

// add a page break
$docx->addBreak(array('type' => 'page'));

// add an image with a bookmark as hyperlink
$options = array(
    'src' => __DIR__ . '/../../img/image.png',
    'scaling' => 50,
    'spacingTop' => 10,
    'spacingBottom' => 0,
    'spacingLeft' => 0,
    'spacingRight' => 20,
    'hyperlink' => '#mybookmark', // use # to set the hyperlink as bookmark
);
$docx->addImage($options);

$docx->createDocx(__DIR__ . '/example_addImage_8');