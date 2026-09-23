<?php
// add HTML as comment content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$comment = new WordFragment($docx, 'document');

$html = new WordFragment($docx, 'comment'); // notice the different "target"

$htmlCode = '<p>This is some HTML code with a link to <a href="http://www.phpdocx.com">phpdocx.com</a> and a random image:
<img src="' . __DIR__ . '/../../img/image.png" width="35" height="35" style="vertical-align: -15px"></p>';

$html->embedHTML($htmlCode);

$comment->addComment(
    array(
        'textDocument' => 'comment',
        'textComment' => $html,
        'initials' => 'PT',
        'author' => 'PHPDocX Team',
        'date' => '10 September 2000'
    )
);

$text = array();
$text[] = array('text' => 'Here comes the ');
$text[] = $comment;
$text[] = array('text' => ' and some other text.');

$docx->addText($text);

$docx->createDocx(__DIR__ . '/example_addComment_2');