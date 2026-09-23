<?php

require_once __DIR__ . '/phpdocx/classes/CreateDocx.php';

$docx = new CreateDocx();

$html = '
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial;
            font-size: 11pt;
        }

        h1 {
            font-size: 20pt;
            color: #ea0e0e;
            text-align: center;
        }

        h2 {
            font-size: 14pt;
            color: #333333;
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #cccccc;
            padding: 6px;
        }

        th {
            background-color: #eeeeee;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>Performance Review Report</h1>

    <h2>Employee Information</h2>

    <table>
        <tr>
            <td><strong>Employee</strong></td>
            <td>John Smith</td>
        </tr>
        <tr>
            <td><strong>Position</strong></td>
            <td>Software Developer</td>
        </tr>
        <tr>
            <td><strong>Department</strong></td>
            <td>Engineering</td>
        </tr>
        <tr>
            <td><strong>Review Period</strong></td>
            <td>January - June 2026</td>
        </tr>
    </table>

    <h2>Performance Summary</h2>

    <p>
        The employee demonstrated strong technical skills
        and consistent performance throughout the review period.
    </p>

    <h2>Performance Evaluation</h2>

    <table>
        <tr>
            <th>Category</th>
            <th>Rating</th>
            <th>Comments</th>
        </tr>

        <tr>
            <td>Technical Skills</td>
            <td>Excellent</td>
            <td>Strong programming skills.</td>
        </tr>

        <tr>
            <td>Code Quality</td>
            <td>Good</td>
            <td>Clean and maintainable code.</td>
        </tr>

        <tr>
            <td>Teamwork</td>
            <td>Excellent</td>
            <td>Works effectively with the team.</td>
        </tr>

        <tr>
            <td>Communication</td>
            <td>Good</td>
            <td>Communicates clearly.</td>
        </tr>
    </table>

</body>
</html>
';

$docx->embedHTML($html);

$output = __DIR__ . '/documents/html-to-docx.docx';

$docx->createDocx($output);

echo "DOCX generated successfully." . PHP_EOL;
echo $output . PHP_EOL;