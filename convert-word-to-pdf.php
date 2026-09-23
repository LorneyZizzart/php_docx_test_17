<?php

declare(strict_types=1);

/**
 * Represents a supported operating system for locating the LibreOffice binary.
 */
final class OperatingSystem {
    public const MACOS = 'Darwin';
    public const WINDOWS = 'Windows';
    public const LINUX = 'Linux';

    public static function current(): string {
        return in_array(PHP_OS_FAMILY, [self::MACOS, self::WINDOWS, self::LINUX], true)
            ? PHP_OS_FAMILY
            : self::LINUX;
    }

    public static function defaultSofficePath(string $operatingSystem): string {
        return match ($operatingSystem) {
            self::MACOS => '/Applications/LibreOffice.app/Contents/MacOS/soffice',
            self::WINDOWS => 'C:\\Program Files\\LibreOffice\\program\\soffice.exe',
            self::LINUX => '/usr/bin/soffice',
        };
    }
}

/**
 * Thrown when a LibreOffice-based document conversion fails.
 */
final class DocumentConversionException extends RuntimeException {}

/**
 * Converts office documents (e.g. .docx) to PDF using LibreOffice's headless CLI.
 */
final readonly class LibreOfficeConverter {
    public function __construct(
        private ?string $sofficePath = null,
    ) {  }

    public function convertToPdf(string $source, string $target): string {
        $sourceFile = new SplFileInfo($source);

        if (!$sourceFile->isFile()) {
            throw new DocumentConversionException("Word document not found: {$source}");
        }

        $sofficeBinary = $this->resolveSofficePath();

        if (!is_file($sofficeBinary)) {
            throw new DocumentConversionException("LibreOffice binary not found at: {$sofficeBinary}");
        }

        $outputDir = dirname($target);
        $this->ensureDirectoryExists($outputDir);

        [$exitCode, $output] = $this->runConversion($sofficeBinary, $sourceFile->getPathname(), $outputDir);

        if ($exitCode !== 0) {
            throw new DocumentConversionException(
                "LibreOffice conversion failed (exit code {$exitCode}): " . implode("\n", $output)
            );
        }

        $generatedPdf = $outputDir . DIRECTORY_SEPARATOR . $sourceFile->getBasename('.' . $sourceFile->getExtension()) . '.pdf';

        if (!is_file($generatedPdf)) {
            throw new DocumentConversionException(
                "Conversion reported success but PDF was not found at: {$generatedPdf}\nOutput: " . implode("\n", $output)
            );
        }

        if ($generatedPdf !== $target && !rename($generatedPdf, $target)) {
            throw new DocumentConversionException("Could not move generated PDF to target path: {$target}");
        }

        return $target;
    }

    private function resolveSofficePath(): string {
        return $this->sofficePath ?? OperatingSystem::defaultSofficePath(OperatingSystem::current());
    }

    private function ensureDirectoryExists(string $directory): void {
        if (is_dir($directory)) {
            return;
        }

        if (!mkdir($directory, 0755, true) && !is_dir($directory)) {
            throw new DocumentConversionException("Could not create output directory: {$directory}");
        }
    }

    /**
     * @return array{0: int, 1: string[]}
     */
    private function runConversion(string $sofficeBinary, string $sourcePath, string $outputDir): array {
        $command = sprintf(
            '%s --headless --convert-to pdf --outdir %s %s 2>&1',
            escapeshellarg($sofficeBinary),
            escapeshellarg($outputDir),
            escapeshellarg($sourcePath),
        );

        exec($command, $output, $exitCode);

        return [$exitCode, $output];
    }
}

// --- Usage ---

$source = __DIR__ . '/documents/existing-document.docx';
$target = __DIR__ . '/documents/existing-document.pdf';

$converter = new LibreOfficeConverter();

try {
    $pdfPath = $converter->convertToPdf($source, $target);

    echo "Word document converted successfully." . PHP_EOL;
    echo "PDF: {$pdfPath}" . PHP_EOL;
} catch (DocumentConversionException $e) {
    fwrite(STDERR, "ERROR: " . $e->getMessage() . PHP_EOL);
    exit(1);
}