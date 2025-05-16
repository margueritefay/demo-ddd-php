<?php

use App\Application\ImportExport\DataProvider\ExportDataProviderInterface;
use App\Domain\Model\ImportExport\Entity\Job;

class UsersExportProvider implements ExportDataProviderInterface
{
    
    public function supports(Job $job): bool
    {
        //could be other type of data 
        return $job->getJobType()->getType() === 'user_job';
    }

    public function getData(Job $job): array
    {
        
        //here retreive datas (for now it's static but can depend on job (which depend on client and other configuration))
       $data = [
            ['ID', 'Nom', 'Email'],
            ['1', 'Jean Dupont', 'jean@example.com'],
            ['2', 'Alice Martin', 'alice@example.com'],
        ];

        return $data;
    }
}
