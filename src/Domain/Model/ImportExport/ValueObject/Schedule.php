<?php

namespace App\Domain\Model\ImportExport\ValueObject;

class Schedule
{
    private \DateTimeImmutable $nextRun;
    private ?string $cronExpression;

    public function __construct(\DateTimeImmutable $nextRun, ?string $cronExpression = null)
    {
        $this->nextRun = $nextRun;
        $this->cronExpression = $cronExpression;
    }

    public function getNextRun(): \DateTimeImmutable
    {
        return $this->nextRun;
    }

    public function getCronExpression(): ?string
    {
        return $this->cronExpression;
    }

    public function isRecurring(): bool
    {
        return $this->cronExpression !== null;
    }
}
