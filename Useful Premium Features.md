# Useful Premium Features

This guide explains when to use the advanced phpdocx features listed in this repository. Each section follows the same structure:

1. **What it solves**
2. **Common use cases**
3. **Small example**
4. **Implementation notes**

> **License note:** These features depend on the phpdocx edition and modules enabled by your license. The local Trial edition may not include every Premium capability.

## Contents

- [Extended HTML](#1-extended-html)
- [Extended CSS](#2-extended-css)
- [JavaScript API](#3-javascript-api)
- [Processing Tools and Batch Processing](#4-processing-tools-and-batch-processing)
- [Feature Selection](#feature-selection)

## 1. Extended HTML

### What it solves

Extended HTML uses HTML as an interface to Word and phpdocx features that standard HTML cannot represent directly. It is more than a basic HTML-to-DOCX conversion.

### Common use cases

- Add headers and footers.
- Insert page breaks and page numbers.
- Add bookmarks and cross-references.
- Add comments, footnotes, and endnotes.
- Generate captions, a table of contents, or bibliographic elements.
- Insert barcodes, MathML, SVG, and Word fragments.
- Set document properties and list-related options.

### Small example: header, footer, and page numbers

```php
require_once __DIR__ . '/phpdocx/classes/CreateDocx.php';

$docx = new CreateDocx();

$html = '
<phpdocx_header data-type="default">
    <p style="font-size: 18px; font-weight: bold;">
        Performance Review
    </p>
</phpdocx_header>

<h1>Employee Evaluation</h1>
<p>Employee: John Smith</p>
<p>This is the performance review content.</p>

<phpdocx_footer>
    <p style="font-size: 9px; text-align: center;">
        Confidential - Performance Review
    </p>
    <phpdocx_pagenumber
        data-target="defaultFooter"
        data-type="page-of"
        data-textAlign="right"
    />
</phpdocx_footer>
';

$docx->embedHTML($html, [
    'useHTMLExtended' => true,
]);

$docx->createDocx(__DIR__ . '/documents/performance-review.docx');
```

### Implementation notes

- The repository's `create-html-to-docx.php` demonstrates the basic `embedHTML` workflow.
- Use the official phpdocx documentation as the source of truth for supported custom tags and attributes.
- Validate the generated DOCX in Microsoft Word or LibreOffice when using page layout features.

## 2. Extended CSS

### What it solves

Extended CSS maps additional CSS properties and `data-*` attributes to Word-specific properties. It is useful when the document must preserve a brand style or a controlled layout.

### Common use cases

- Apply corporate fonts, colors, and heading styles.
- Control Word paragraph, run, table, row, and cell properties.
- Reuse the same HTML for a web preview and a DOCX export.
- Embed a custom TTF font in the generated DOCX.

### Small example: Word properties and embedded font

```php
$html = '
<style>
    @font-face {
        font-family: "Lato";
        src: url("/absolute/path/to/fonts/Lato-Regular.ttf");
    }

    .report-title {
        font-family: Lato;
        font-size: 18pt;
        color: #333333;
    }
</style>

<p
    class="report-title"
    data-heading-level="1"
    data-lang="en-US"
>
    Performance Review Report
</p>';

$docx->embedHTML($html, [
    'useHTMLExtended' => true,
    'embedFonts' => true,
]);
```

### Useful extensions

Common extended attributes include `data-heading-level`, `data-lang`, `data-style`, `data-ppr`, `data-rpr`, `data-tblpr`, `data-trpr`, and `data-tcpr`. Other supported extensions include `border-spacing`, `max-height`, `max-width`, and `@font-face`.

### Implementation notes

- Use an absolute font path when the PHP process may run from different working directories.
- Confirm that the PHP process can read every font file.
- Keep the CSS small and test long text, tables, and page breaks in the final DOCX.

## 3. JavaScript API

### What it solves

The JavaScript API is intended for applications where document generation belongs in Node.js, a browser-based workflow, or another JavaScript service.

### Common use cases

- A Node.js backend that owns the reporting workflow.
- A browser-based document editor.
- A service that receives JSON and returns a DOCX.
- A JavaScript application that reads or modifies existing DOCX files.

### Small integration example

The exact package, imports, and method names depend on the installed phpdocx JavaScript build and license. The following shows the intended application flow:

```js
import { Phpdocx } from 'phpdocx-js';

const document = await Phpdocx.create();
document.addText('Monthly Sales Report');
document.addTable([
  ['Region', 'Total'],
  ['North', '$24,500'],
]);

await document.save('./documents/monthly-sales.docx');
```

### Implementation notes

- Verify the package name and API against the phpdocx Premium documentation before implementation.
- Confirm the supported Node.js or browser runtime.
- This repository currently exercises the PHP API, not the JavaScript API.

## 4. Processing Tools and Batch Processing

### What it solves

Batch processing turns one document operation into a repeatable job. Instead of running one record manually:

```text
1 record -> 1 DOCX
```

the application can process a dataset in one execution:

```text
100 employees -> 100 data records -> 100 DOCX files
```

### Common use cases

- Generate one performance review per employee.
- Generate contracts for many customers or workers.
- Create invoices, certificates, or monthly reports.
- Replace variables in a folder of existing documents.
- Apply the same cleanup or transformation to many DOCX files.

### Small example: process a template for several customers

```php
require_once __DIR__ . '/phpdocx/classes/CreateDocxFromTemplate.php';

$customers = [
    ['name' => 'Acme Ltd', 'file' => 'acme'],
    ['name' => 'Northwind Inc', 'file' => 'northwind'],
];

foreach ($customers as $customer) {
    $docx = new CreateDocxFromTemplate(__DIR__ . '/templates/contract.docx');
    $docx->replaceVariableByText([
        'CUSTOMER_NAME' => $customer['name'],
    ]);
    $docx->createDocx(
        __DIR__ . '/documents/contract-' . $customer['file'] . '.docx'
    );
}
```

### Implementation notes

For large jobs, plan for:

- input validation before processing;
- unique and predictable output names;
- logging for successful and failed records;
- per-record error handling so one bad input does not stop the job;
- temporary-file cleanup and storage limits;
- memory and execution-time limits.

The examples under `phpdocx/examples/Templates/` show related operations such as variable discovery and block replacement.

## Feature Selection

| Requirement | Recommended feature |
| --- | --- |
| Existing web content must become a Word document | Extended HTML |
| HTML needs branded fonts or Word-specific styling | Extended CSS |
| The application is written in Node.js or JavaScript | JavaScript API |
| One template must produce many documents | Processing tools / batch processing |