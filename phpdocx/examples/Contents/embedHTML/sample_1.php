<?php
// convert HTML to DOCX

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$html = '<h1 style="color: #b70000">An embedHTML() example</h1>';
$html .= '<p>We draw a table with border and rowspans and colspans:</p>';
$html .= '
<style>
    td {
        vertical-align: top;
    }
</style>
<table border="1" style="border-collapse: collapse" width="500">
    <tbody>
        <tr>
            <td style="background-color: yellow" width="400">1_1</td>
            <td rowspan="3" colspan="2" width="100">1_2</td>
        </tr>
        <tr>
            <td width="500">Some random text.</td>
        </tr>
        <tr>
            <td width="500">
                <ul>
                    <li>One</li>
                    <li>Two <b>and a half</b></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td width="400">3_2</td>
            <td width="50">3_3</td>
            <td width="50">3_3</td>
        </tr>
    </tbody>
</table>';
$docx->embedHTML($html);

$docx->createDocx(__DIR__ . '/example_embedHTML_1');