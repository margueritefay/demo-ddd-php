<?php

namespace App\Domain\Model\ImportExport\ValueObject;

class JobType
{
    public const IMPORT = 'import';
    public const EXPORT = 'export';

    private string $type;

    public function __construct(string $type)
    {
        if (!in_array($type, [self::IMPORT, self::EXPORT])) {
            throw new \InvalidArgumentException("Unsupported job type: $type");
        }

        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function equals(JobType $other): bool
    {
        return $this->type === $other->getType();
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
