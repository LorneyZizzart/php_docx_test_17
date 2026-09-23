<?php
require_once __DIR__ . '/phpdocx/classes/CreateDocx.php';

$docx = new CreateDocx();

// --------------------------------------------------
// 1. Title
// --------------------------------------------------

$docx->addText(
    'Employee Performance Review',
    array(
        'bold' => true,
        'fontSize' => 20,
        'color' => '333333',
        'font' => 'Arial'
    )
);

// --------------------------------------------------
// 2. Employee Information
// --------------------------------------------------

$docx->addText(
    'Employee Information',
    array(
        'bold' => true,
        'fontSize' => 14,
        'color' => '333333',
        'font' => 'Arial',
        'spacingBefore' => 200,
        'spacingAfter' => 100
    )
);

$employeeTable = array(
    array('Employee', 'John Smith'),
    array('Position', 'Software Developer'),
    array('Department', 'Engineering'),
    array('Review Period', 'January - June 2026'),
    array('Reviewer', 'Jane Doe')
);

$docx->addTable(
    $employeeTable,
    array(
        'border' => 'single',
        'borderWidth' => 6,
        'borderColor' => 'CCCCCC',
        'font' => 'Arial',
        'fontSize' => 10,
        'tableAlign' => 'center',
        'columnWidths' => array(2500, 5000)
    )
);

// --------------------------------------------------
// 3. Summary
// --------------------------------------------------

$docx->addText(
    'Performance Summary',
    array(
        'bold' => true,
        'fontSize' => 14,
        'color' => '333333',
        'font' => 'Arial',
        'spacingBefore' => 300,
        'spacingAfter' => 100
    )
);

$docx->addText(
    'During the review period, the employee demonstrated consistent '
    . 'performance in software development, problem solving and '
    . 'collaboration with the engineering team.',
    array(
        'font' => 'Arial',
        'fontSize' => 11,
        'lineSpacing' => 1.15
    )
);

// --------------------------------------------------
// 4. Key achievements
// --------------------------------------------------

$docx->addText(
    'Key Achievements',
    array(
        'bold' => true,
        'fontSize' => 14,
        'color' => '333333',
        'font' => 'Arial',
        'spacingBefore' => 300,
        'spacingAfter' => 100
    )
);

$achievements = array(
    'Implemented new web application features.',
    'Improved application performance.',
    'Resolved production issues.',
    'Participated in code reviews.',
    'Collaborated with the QA team.'
);

$docx->addList($achievements, 1);

// --------------------------------------------------
// 5. Performance evaluation
// --------------------------------------------------

$docx->addText(
    'Performance Evaluation',
    array(
        'bold' => true,
        'fontSize' => 14,
        'color' => '333333',
        'font' => 'Arial',
        'spacingBefore' => 300,
        'spacingAfter' => 100
    )
);

$evaluationTable = array(
    array(
        'Category',
        'Rating',
        'Comments'
    ),
    array(
        'Technical Skills',
        'Excellent',
        'Strong programming and debugging skills.'
    ),
    array(
        'Code Quality',
        'Good',
        'Produces maintainable and readable code.'
    ),
    array(
        'Teamwork',
        'Excellent',
        'Works effectively with team members.'
    ),
    array(
        'Communication',
        'Good',
        'Communicates clearly with the development team.'
    )
);

$docx->addTable(
    $evaluationTable,
    array(
        'border' => 'single',
        'borderWidth' => 6,
        'borderColor' => 'CCCCCC',
        'font' => 'Arial',
        'fontSize' => 10,
        'tableAlign' => 'center',
        'columnWidths' => array(
            2500,
            1800,
            4500
        )
    )
);

// --------------------------------------------------
// 6. Final comments
// --------------------------------------------------

$docx->addText(
    'Final Comments',
    array(
        'bold' => true,
        'fontSize' => 14,
        'color' => '333333',
        'font' => 'Arial',
        'spacingBefore' => 300,
        'spacingAfter' => 100
    )
);

$docx->addText(
    'The employee has demonstrated positive progress during the '
    . 'review period and should continue developing technical and '
    . 'communication skills.',
    array(
        'font' => 'Arial',
        'fontSize' => 11
    )
);

// --------------------------------------------------
// 7. Generate DOCX
// --------------------------------------------------

$output = __DIR__ . '/documents/create-word.docx';

$docx->createDocx($output);

echo "DOCX generated successfully:\n";
echo $output . PHP_EOL;
