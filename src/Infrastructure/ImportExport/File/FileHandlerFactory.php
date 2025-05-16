<?php
namespace App\Infrastructure\ImportExport\File;

use App\Domain\Model\ImportExport\Interface\FileHandlerInterface;
use App\Domain\Model\ImportExport\ValueObject\FileType;
use InvalidArgumentException;

class FileHandlerFactory
{
        /**
     * @var FileHandlerInterface[]
     */
    private array $handlers;

    public function __construct(iterable $handlers)
    {
        foreach ($handlers as $handler) {
            $this->handlers[] = $handler;
        }
    }

    public function getHandler(FileType $fileType): FileHandlerInterface
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supports($fileType)) {
                return $handler;
            }
        }

        throw new \RuntimeException("No handler found for type: " . $fileType);
    }
}
