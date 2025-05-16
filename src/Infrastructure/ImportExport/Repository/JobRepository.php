<?php

namespace App\Infrastructure\Repository;

use App\Domain\Model\ImportExport\Entity\Job;
use App\Domain\Model\ImportExport\ValueObject\FilePath;
use App\Domain\Model\ImportExport\ValueObject\FileType;
use App\Domain\Model\ImportExport\ValueObject\JobType;
use App\Domain\Model\ImportExport\Repository\JobRepositoryInterface;

class JobRepository implements JobRepositoryInterface
{
    public function findById(string $id): ?Job
    {

        #todo
    }

    public function save(Job $job): void
    {
        #todo
    }

}
