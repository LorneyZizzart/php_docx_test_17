<?php
// return the variables (placeholders) from an existing DOCX using the parse mode.
// The parse mode is slower than the default one, but it's more accurate when the template includes placeholder symbols as regular contents

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateVariables.docx', array('parseMode' => true));

print_r($docx->getTemplateVariables());