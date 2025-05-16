<?php

namespace App\Domain\Model\ImportExport\Entity;

use App\Domain\Model\ImportExport\ValueObject\FilePath;
use App\Domain\Model\ImportExport\ValueObject\FileType;
use App\Domain\Model\ImportExport\ValueObject\JobType;
use App\Domain\Model\ImportExport\ValueObject\Schedule;
use Symfony\Component\Uid\Uuid;

class Job
{
    private string $id;
    private int $clientId;
    private JobType $jobType;
    private FileType $fileType;
    private FilePath $filePath;
    private ?Schedule $schedule;
    private \DateTimeImmutable $createdAt;

    public function __construct(
        int $clientId,
        JobType $jobType,
        FileType $fileType,
        FilePath $filePath,
        ?Schedule $schedule = null
    ) {
        $this->id = Uuid::v7()->toRfc4122();
        $this->clientId = $clientId;
        $this->jobType = $jobType;
        $this->fileType = $fileType;
        $this->filePath = $filePath;
        $this->schedule = $schedule;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getClientId(): int
    {
        return $this->clientId;
    }

    public function getJobType(): JobType
    {
        return $this->jobType;
    }

    public function getFileType(): FileType
    {
        return $this->fileType;
    }

    public function getFilePath(): FilePath
    {
        return $this->filePath;
    }

    public function getSchedule(): ?Schedule
    {
        return $this->schedule;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function isScheduled(): bool
    {
        return $this->schedule !== null;
    }
}
