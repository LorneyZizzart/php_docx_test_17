<?php
// replace table variables (placeholders) in headers, footers and document from an existing DOCX using WordFragments

require_once __DIR__ . '/../../../classes/CreateDocx.php';

$docx = new CreateDocxFromTemplate(__DIR__ . '/../../files/TemplateSimpleTable_header_footer.docx');

$link1 = new WordFragment($docx);
$linkOptions = array(
	'url'=> 'https://www.phpdocx.com',
    'color' => '0000FF',
    'underline' => 'single',
);
$link1->addLink('link to product A', $linkOptions);

$link2 = new WordFragment($docx);
$linkOptions = array(
	'url'=> 'https://www.phpxlsx.com',
    'color' => '0000FF',
    'underline' => 'single',
);
$link2->addLink('link to product B', $linkOptions);

$link3 = new WordFragment($docx);
$linkOptions = array(
	'url'=> 'https://www.phppptx.com',
    'color' => '0000FF',
    'underline' => 'single',
);
$link3->addLink('link to product C', $linkOptions);

$image1 = new WordFragment($docx);
$imageOptions = array(
    'src' => __DIR__ . '/../../img/image.png',
    'scaling' => 30,
    );
$image1->addImage($imageOptions);

$image2 = new WordFragment($docx);
$imageOptions = array(
    'src' => __DIR__ . '/../../img/image_xlsx.png',
    'scaling' => 30,
    );
$image2->addImage($imageOptions);

$image3 = new WordFragment($docx);
$imageOptions = array(
    'src' => __DIR__ . '/../../img/image_pptx.png',
    'scaling' => 30,
    );
$image3->addImage($imageOptions);

$dataHeader = array(
	        array(
	            'ITEM_HEADER' => $link1,
	            'REFERENCE_HEADER' => $image1,
	        ),
	        array(
	            'ITEM_HEADER' => $link2,
	            'REFERENCE_HEADER' => $image2,
	        ),
	        array(
	            'ITEM_HEADER' => $link3,
	            'REFERENCE_HEADER' => $image3,
	        )
        );

$dataBody = array(
	        array(
	            'ITEM' => $link1,
	            'REFERENCE' => $image1,
	        ),
	        array(
	            'ITEM' => $link2,
	            'REFERENCE' => $image2,
	        ),
	        array(
	            'ITEM' => $link3,
	            'REFERENCE' => $image3,
	        )
        );

$dataFooter = array(
	        array(
	            'ITEM_FOOTER' => $link1,
	            'REFERENCE_FOOTER' => $image1,
	        ),
	        array(
	            'ITEM_FOOTER' => $link2,
	            'REFERENCE_FOOTER' => $image2,
	        ),
	        array(
	            'ITEM_FOOTER' => $link3,
	            'REFERENCE_FOOTER' => $image3,
	        )
        );

// replace the table variable in headers
$docx->replaceTableVariable($dataHeader, array('parseLineBreaks' => true, 'target' => 'header'));
// replace the table variable in the document
$docx->replaceTableVariable($dataBody, array('parseLineBreaks' => true));
// replace the table variable in footers
$docx->replaceTableVariable($dataFooter, array('parseLineBreaks' => true, 'target' => 'footer'));

$docx->createDocx(__DIR__ . '/example_replaceTableVariable_4');