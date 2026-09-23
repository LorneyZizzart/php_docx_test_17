<?php
// add a comment to two paragraphs

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$textDocumentFragmentA = new WordFragment($docx, 'comment');
$textDocumentFragmentA->addText('The first paragraph.');
$textDocumentFragmentB = new WordFragment($docx, 'comment');
$textDocumentFragmentB->addText('The second paragraph.');
$textCommentFragment = new WordFragment($docx, 'comment');
$textCommentFragment->addText('The comment we want to insert.', array('bold' => true));

$docx->addComment(
    array(
        'textDocument' => [$textDocumentFragmentA, $textDocumentFragmentB],
        'textComment' => $textCommentFragment,
        'author' => 'PHPDocX Team',
    )
);

$docx->createDocx(__DIR__ . '/example_addComment_7');