<?php

namespace App\Infrastructure\ImportExport\File;

use App\Domain\Model\ImportExport\Interface\FileHandlerInterface;
use App\Domain\Model\ImportExport\ValueObject\FilePath;
use App\Domain\Model\ImportExport\ValueObject\FileType;

class CsvFileHandler implements FileHandlerInterface
{
    public function write(FilePath $filePath, FileType $fileType, array $data): void
    {
        if (FileType::CSV !== $fileType->getType()) {
            throw new \InvalidArgumentException('Invalid file type for CSV writer.');
        }


        $path = $filePath->getPath();

        $handle = fopen($path, 'w');
        if ($handle === false) {
            throw new \RuntimeException("Can not open file : $path");
        }

        foreach ($data as $row) {
            fputcsv($handle, $row);
        }

        fclose($handle);
    }

    public function read(string $filePath): array{
        #todo if import
        return [];
    }

    public function supports(FileType $type):void{}
}
