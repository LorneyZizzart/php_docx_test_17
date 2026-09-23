<?php
// add HTML as endnote content

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$endnote = new WordFragment($docx, 'document');

$html = new WordFragment($docx, 'endnote'); // notice the different "target"

$htmlCode = '<p>This is some HTML code with a link to <a href="http://www.phpdocx.com">phpdocx.com</a> and a random image:
<img src="' . __DIR__ . '/../../img/image.png" width="35" height="35" style="vertical-align: middle"></p>';

$html->embedHTML($htmlCode);

$endnote->addEndnote(
    array(
        'textDocument' => 'endnote',
        'textEndnote' => $html,
        'endnoteMark' => array('customMark' => '*')
    )
);

$text = array();
$text[] = array('text' => 'Here comes the ');
$text[] = $endnote;
$text[] = array('text' => ' and some other text.');

$docx->addText($text);
$docx->addText('Some other text.');

$docx->createDocx(__DIR__ . '/example_addEndnote_2');