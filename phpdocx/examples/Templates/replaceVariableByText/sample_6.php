<?php
// replace text variables (placeholders) with new text using {{ and }} as wrapping symbols from an existing DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateSimpleText_symbols_2.docx');
$docx->setTemplateSymbol('{{', '}}');

$first = 'PHPDocX';
$multiline = 'This is the first line.\nThis is the second line of text.';

$variables = array('FIRSTTEXT' => $first, 'MULTILINETEXT' => $multiline);
// replace \n with line breaks
$options = array('parseLineBreaks' => true);

$docx->replaceVariableByText($variables, $options);

$docx->createDocx(__DIR__ . '/example_replaceVariableByText_6');