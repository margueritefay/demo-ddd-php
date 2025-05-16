<?php

namespace App\Domain\Model\ImportExport\ValueObject;

class FilePath
{
    private string $path;

    public function __construct(string $path)
    {
         if (empty($path)) {
            throw new \InvalidArgumentException('File path cannot be empty.');
        }

        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    public function __toString(): string
    {
        return $this->path;
    }

    public function equals(FilePath $other): bool
    {
        return $this->path === $other->getPath();
    }
}
