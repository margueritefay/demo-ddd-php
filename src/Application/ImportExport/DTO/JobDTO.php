<?php

namespace App\Application\Dto;

use App\Domain\Model\ImportExport\Entity\Job;

class JobDto
{
    public string $id;
    public string $clientId;
    public string $filePath;
    public string $fileType;
    public string $jobType;
    public ?string $scheduledAt;

    public function __construct(Job $job)
    {
        $this->id = $job->getId();
        $this->clientId = $job->getClientId();
        $this->filePath = (string) $job->getFilePath();
        $this->fileType = $job->getFileType();
        $this->jobType = $job->getJobType();
        $this->scheduledAt = $job->getSchedule();
    }
}
