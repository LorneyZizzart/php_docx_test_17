<?php
require_once __DIR__ . '/phpdocx/classes/CreateDocx.php';

$docx = new CreateDocx();

/*
 * Título
 */
$docx->addText(
    'Performance Review Report',
    [
        'bold' => true,
        'font' => 'Arial',
        'fontSize' => 20,
        'color' => '333333',
        'textAlign' => 'center',
        'spacingAfter' => 200
    ]
);

/*
 * Información
 */
$docx->addText(
    'Employee Information',
    [
        'bold' => true,
        'font' => 'Arial',
        'fontSize' => 14,
        'color' => '333333',
        'spacingBefore' => 200,
        'spacingAfter' => 100
    ]
);

$data = [
    ['Employee', 'John Smith'],
    ['Position', 'Software Developer'],
    ['Department', 'Engineering'],
    ['Review Period', 'January - June 2026'],
];

$docx->addTable(
    $data,
    [
        'border' => 'single',
        'borderWidth' => 6,
        'borderColor' => 'CCCCCC',
        'font' => 'Arial',
        'fontSize' => 10,
        'tableAlign' => 'center',
        'columnWidths' => [
            2500,
            5000
        ]
    ]
);

/*
 * Performance summary
 */
$docx->addText(
    'Performance Summary',
    [
        'bold' => true,
        'font' => 'Arial',
        'fontSize' => 14,
        'spacingBefore' => 300,
        'spacingAfter' => 100
    ]
);

$docx->addText(
    'The employee demonstrated strong technical skills and '
    . 'consistent performance throughout the review period.',
    [
        'font' => 'Arial',
        'fontSize' => 11
    ]
);

/*
 * Evaluations
 */
$docx->addText(
    'Performance Evaluation',
    [
        'bold' => true,
        'font' => 'Arial',
        'fontSize' => 14,
        'spacingBefore' => 300,
        'spacingAfter' => 100
    ]
);

$evaluation = [
    ['Category', 'Rating', 'Comments'],
    ['Technical Skills', 'Excellent', 'Strong programming skills.'],
    ['Code Quality', 'Good', 'Clean and maintainable code.'],
    ['Teamwork', 'Excellent', 'Works effectively with the team.'],
    ['Communication', 'Good', 'Communicates clearly.'],
];

$docx->addTable(
    $evaluation,
    [
        'border' => 'single',
        'borderWidth' => 6,
        'borderColor' => 'CCCCCC',
        'font' => 'Arial',
        'fontSize' => 10,
        'tableAlign' => 'center',
        'columnWidths' => [
            2500,
            1800,
            4500
        ]
    ]
);

/*
 * Generate DOCX
 */
$documentsPath = __DIR__ . '/documents';

if (!is_dir($documentsPath)) {
    mkdir($documentsPath, 0777, true);
}

$wordFile = $documentsPath . '/performance-review.docx';

$docx->createDocx($wordFile);

echo "DOCX created:\n";
echo $wordFile . PHP_EOL;


/*
 * Convert DOCX -> PDF using LibreOffice
 */

if (PHP_OS_FAMILY === 'Darwin') {
    $libreOffice = '/Applications/LibreOffice.app/Contents/MacOS/soffice'; // MACOS
} elseif (PHP_OS_FAMILY === 'Linux') {
    $libreOffice = '/usr/bin/soffice'; // LINUX
} else {
    throw new Exception(
        'Operating system not supported: ' . PHP_OS_FAMILY
    );
}

if (!file_exists($libreOffice)) {
    throw new Exception(
        'LibreOffice executable not found: ' . $libreOffice
    );
}

$pdfFile = $documentsPath . '/performance-review.pdf';

$command = sprintf(
    '%s --headless --convert-to pdf --outdir %s %s 2>&1',
    escapeshellarg($libreOffice),
    escapeshellarg($documentsPath),
    escapeshellarg($wordFile)
);

exec($command, $output, $returnCode);

echo "\nLibreOffice output:\n";
echo implode(PHP_EOL, $output) . PHP_EOL;

if ($returnCode !== 0) {
    throw new Exception(
        'LibreOffice conversion failed. Exit code: ' . $returnCode
    );
}

if (!file_exists($pdfFile)) {
    throw new Exception(
        'LibreOffice finished, but PDF was not generated: ' . $pdfFile
    );
}

echo "\nPDF created successfully:\n";
echo $pdfFile . PHP_EOL;