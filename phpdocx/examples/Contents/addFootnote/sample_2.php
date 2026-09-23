<?php
// add HTML as footnote content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$footnote = new WordFragment($docx, 'document');

$html = new WordFragment($docx, 'footnote'); // notice the different "target"

$htmlCode = '<p>This is some HTML code with a link to <a href="http://www.phpdocx.com">phpdocx.com</a> and a random image:
<img src="' . __DIR__ . '/../../img/image.png" width="35" height="35" style="vertical-align: middle"></p>';

$html->embedHTML($htmlCode);

$footnote->addFootnote(
    array(
        'textDocument' => 'footnote',
        'textFootnote' => $html,
        'footnoteMark' => array('customMark' => '*')
    )
);


$text = array();
$text[] = array('text' => 'Here comes the ');
$text[] = $footnote;
$text[] = array('text' => ' and some other text.');

$docx->addText($text);
$docx->addText('Some other text.');

$docx->createDocx(__DIR__ . '/example_addFootnote_2');