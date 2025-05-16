<?php

namespace App\Application\Service;

use App\Domain\Model\ImportExport\Entity\Job;
use App\Domain\Model\ImportExport\ValueObject\FileType;
use App\Domain\Model\ImportExport\ValueObject\JobType;
use App\Domain\Model\ImportExport\Repository\JobRepositoryInterface;
use App\Domain\Model\ImportExport\ValueObject\FilePath;
use App\Domain\Model\ImportExport\ValueObject\Schedule;
use DateTimeImmutable;

class CreateJobService
{
    public function __construct(
        private readonly JobRepositoryInterface $jobRepositoryInterface
    ) {}

    public function execute(
        int $clientId,
        string $filePath,
        string $fileType,
        string $jobType,
        DateTimeImmutable $scheduleAt
    ): Job {
        $job = new Job(
            $clientId,
            new JobType($jobType),
            new FileType($fileType),
            new FilePath($filePath),
            new Schedule($scheduleAt)
        );

        $this->jobRepositoryInterface->save($job);

        return $job;
    }
}
