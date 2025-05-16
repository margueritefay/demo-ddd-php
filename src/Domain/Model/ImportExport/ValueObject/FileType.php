<?php

namespace App\Domain\Model\ImportExport\ValueObject;

class FileType
{
    public const CSV = 'csv';
    public const EXCEL = 'excel';

    private string $type;

    public function __construct(string $type)
    {
        if (!in_array($type, [self::CSV, self::EXCEL])) {
            throw new \InvalidArgumentException("Unsupported file type: $type");
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function equals(FileType $other): bool
    {
        return $this->type === $other->getType();
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
