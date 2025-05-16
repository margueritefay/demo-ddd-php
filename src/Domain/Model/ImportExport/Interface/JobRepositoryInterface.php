<?php

namespace App\Domain\Model\ImportExport\Repository;

use App\Domain\Model\ImportExport\Entity\Job;

interface JobRepositoryInterface
{
    public function save(Job $job): void;

    public function findById(string $id): ?Job;

}
