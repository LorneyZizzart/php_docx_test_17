<?php
// insert math equations as WordFragments in a table

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocx();

$mathFragmentA = new WordFragment($docx);
$mathFragmentA->addMathEquation(
    '<m:oMathPara><m:oMath><m:r><m:t>∪±∞=~×</m:t></m:r></m:oMath></m:oMathPara>',
	'omml'
);

$mathML = '<math xmlns="http://www.w3.org/1998/Math/MathML"><mrow><mi>A</mi><mo>=</mo><mfenced open="[" close="]"><mtable><mtr><mtd><mi>x</mi></mtd><mtd><mn>2</mn></mtd></mtr><mtr><mtd><mn>3</mn></mtd><mtd><mi>w</mi></mtd></mtr></mtable></mfenced></mrow></math>';
$mathFragmentB = new WordFragment($docx);
$mathFragmentB->addMathEquation($mathML, 'mathml');

$mathFragmentC = new WordFragment($docx);
$mathFragmentC->addMathEquation(
    '<m:oMathPara><m:oMath><m:sSup><m:sSupPr><m:ctrlPr><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr></m:ctrlPr></m:sSupPr><m:e><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>a</m:t></m:r></m:e><m:sup><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>2</m:t></m:r></m:sup></m:sSup><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>+</m:t></m:r><m:sSup><m:sSupPr><m:ctrlPr><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr></m:ctrlPr></m:sSupPr><m:e><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>b</m:t></m:r></m:e><m:sup><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>2</m:t></m:r></m:sup></m:sSup><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>=</m:t></m:r><m:sSup><m:sSupPr><m:ctrlPr><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr></m:ctrlPr></m:sSupPr><m:e><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>c</m:t></m:r></m:e><m:sup><m:r><w:rPr><w:rFonts w:ascii="Cambria Math" w:hAnsi="Cambria Math"/></w:rPr><m:t>2</m:t></m:r></m:sup></m:sSup></m:oMath></m:oMathPara>',
	'omml'
);

$valuesTable = array(
    array(
        'Equation 1',
        $mathFragmentA,
    ),
    array(
        'Equation 2',
        $mathFragmentB,
    ),
	array(
        'Equation 3',
        $mathFragmentC,
    ),
);

$paramsTable = array(
    'border' => 'single',
    'tableAlign' => 'center',
    'borderWidth' => 10,
);

$docx->addTable($valuesTable, $paramsTable);

$docx->createDocx(__DIR__ . '/example_addMathML_6');