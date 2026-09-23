<?php
// add a comment to a text and reply it

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$comment = new WordFragment($docx, 'document');

// create a custom paraId as the comment ID
$paraIdComment = dechex(mt_rand(9, 999999));

$comment->addComment(
    array(
        'textDocument' => 'comment',
        'textComments' => array(
            array(
                'textComment' => 'The comment we want to insert.',
                'initials' => 'PT',
                'author' => 'PHPDocX Team',
                'date' => '10 September 2020',
                'paraId' => $paraIdComment,
            ),
            array(
                'textDocument' => '',
                'textComment' => 'The reply.',
                'initials' => 'PT',
                'author' => 'PHPDocX rev Team',
                'date' => '11 September 2020',
                'parentId' => $paraIdComment,
            ),
        )
    )
);

$text = array();
$text[] = array('text' => 'Here comes the ');
$text[] = $comment;
$text[] = array('text' => ' and some other text.');

$docx->addText($text);

$docx->createDocx(__DIR__ . '/example_addComment_6');