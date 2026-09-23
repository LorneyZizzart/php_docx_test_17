# PHPDocx 17 Test Project

This project is a small PHP 8.3 test application for generating Word documents and converting them to PDF with [phpdocx 17](phpdocx/).

The examples write their generated files to the `documents/` directory. The directory is created automatically by `create-pdf.php` and `convert-word-to-pdf.php`; make sure it is writable when running `create-word.php`.

## Project Scripts

### `create-word.php`

Creates an employee performance review as a Word document:

```text
documents/create-word.docx
```

Run it with:

```bash
php create-word.php
```

### `create-pdf.php`

Creates a Word document, converts it to PDF through LibreOffice in headless mode, and removes the temporary DOCX file. The final file is:

```text
documents/create-pdf.pdf
```

Run it with:

```bash
php create-pdf.php
```

### `convert-word-to-pdf.php`

Converts an existing Word document to PDF. The sample input is:

```text
documents/existing-document.docx
```

The generated PDF is:

```text
documents/existing-document.pdf
```

Run it with:

```bash
php convert-word-to-pdf.php
```

To convert a different file, update the `$source` and `$target` paths in the script.

## Requirements

- PHP 8.3 or newer.
- The phpdocx 17 library included in `phpdocx/`.
- LibreOffice installed and available at the default path for your operating system. LibreOffice is required for DOCX-to-PDF conversion.

Check PHP with:

```bash
php --version
```

## Install LibreOffice

### macOS

With Homebrew:

```bash
brew install --cask libreoffice
```

Verify the installation:

```bash
"/Applications/LibreOffice.app/Contents/MacOS/soffice" --version
```

The PHP scripts use this default executable:

```text
/Applications/LibreOffice.app/Contents/MacOS/soffice
```

### Linux

Ubuntu or Debian:

```bash
sudo apt update
sudo apt install libreoffice
```

Fedora:

```bash
sudo dnf install libreoffice
```

Verify the installation:

```bash
soffice --version
```

The scripts expect the executable at `/usr/bin/soffice`. If your distribution installs it elsewhere, update the Linux path in the script or pass the correct path through your own converter configuration.

### Windows

Install LibreOffice from [libreoffice.org/download](https://www.libreoffice.org/download/download-libreoffice/), then open a new PowerShell window.

Verify the default installation:

```powershell
& "C:\Program Files\LibreOffice\program\soffice.exe" --version
```

The scripts expect the executable at:

```text
C:\Program Files\LibreOffice\program\soffice.exe
```

If LibreOffice was installed in a different directory, update the Windows path in the PHP script.

## Typical Workflow

1. Install PHP and LibreOffice for your operating system.
2. Confirm that `php --version` and the LibreOffice version command work.
3. Run `php create-word.php` to generate a DOCX.
4. Run `php create-pdf.php` to test DOCX generation and PDF conversion together.
5. Place an input DOCX in `documents/` and run `php convert-word-to-pdf.php` to test conversion independently.

Generated files remain in `documents/` so they can be opened and inspected.

## Important Note About phpdocx Licensing

The included phpdocx Trial edition is suitable for evaluation and may add a watermark. PDF conversion through phpdocx's licensed transformation features may be unavailable in the Trial edition. This project therefore uses LibreOffice for the DOCX-to-PDF conversion step.