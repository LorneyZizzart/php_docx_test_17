<?php
// encode to UTF8 the contents

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$docx->setEncodeUTF8();

$docx->createDocx(__DIR__ . '/example_setEncodeUTF8_1');