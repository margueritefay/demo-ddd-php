<?php 

namespace App\Domain\Model\ImportExport\Interface;


use App\Domain\Model\ImportExport\ValueObject\FilePath;
use App\Domain\Model\ImportExport\ValueObject\FileType;
interface FileHandlerInterface
{
    /**
     *
     * @param FilePath $filePath
     * @param FileType $fileType
     * @param int   $clientId
     */
    public function write(FilePath $filePath, FileType $fileType, array $data): void;
    public function read(string $path): array;
}
