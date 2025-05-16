<?php 

namespace App\Application\ImportExport\DataProvider;

use App\Domain\Model\ImportExport\Entity\Job;

interface ExportDataProviderInterface
{
    public function supports(Job $job): bool;

    public function getData(Job $job): array;
}
