# Developer Notes

## Purpose

This repository tests phpdocx 17 with PHP 8.3. It contains three small examples:

| Script | Result |
| --- | --- |
| `create-word.php` | Creates `documents/create-word.docx`. |
| `create-pdf.php` | Creates a DOCX, converts it with LibreOffice, and leaves `documents/create-pdf.pdf`. |
| `convert-word-to-pdf.php` | Converts `documents/existing-document.docx` to `documents/existing-document.pdf`. |

All generated documents belong in `documents/`.

## Recommended Test Sequence

```text
PHP 8.3
  -> phpdocx 17 Trial
  -> CreateDocx
  -> DOCX generation
  -> LibreOffice headless conversion
  -> PDF in documents/
```

Run the complete generation and conversion test with:

```bash
php create-pdf.php
```

For a conversion-only test, place `existing-document.docx` in `documents/` and run:

```bash
php convert-word-to-pdf.php
```

## LibreOffice Setup

LibreOffice is required because the phpdocx Trial edition may not allow the licensed `transformDocument()` PDF conversion feature. The examples call LibreOffice in headless mode, so no graphical application needs to be open.

### macOS

```bash
brew install --cask libreoffice
"/Applications/LibreOffice.app/Contents/MacOS/soffice" --version
```

Expected executable:

```text
/Applications/LibreOffice.app/Contents/MacOS/soffice
```

### Linux

Ubuntu or Debian:

```bash
sudo apt update
sudo apt install libreoffice
soffice --version
```

Fedora:

```bash
sudo dnf install libreoffice
soffice --version
```

Expected executable:

```text
/usr/bin/soffice
```

### Windows

Install LibreOffice from [libreoffice.org/download](https://www.libreoffice.org/download/download-libreoffice/). In PowerShell, verify it with:

```powershell
& "C:\Program Files\LibreOffice\program\soffice.exe" --version
```

Expected executable:

```text
C:\Program Files\LibreOffice\program\soffice.exe
```

If LibreOffice is installed in another location, update the corresponding default path in `convert-word-to-pdf.php` and `create-pdf.php`.

## Licensing Reminder

phpdocx editions are licensed separately:

- **Trial:** free for evaluation and may include a watermark.
- **Advanced, Premium, and Bureau:** commercial editions.

There is no free Developer edition equivalent to the commercial editions. Keep this limitation in mind when a DOCX is generated successfully but phpdocx's own PDF transformation is unavailable.