<?php

namespace App\Application\ImportExport\Service;

use App\Domain\Model\ImportExport\Entity\Job;
use App\Infrastructure\ImportExport\File\FileHandlerFactory;


class FileExporterService
{
    public function __construct(
        private FileHandlerFactory $fileHandlerFactory,
        private iterable $dataProviders
    ) {}

    public function export(Job $job): void
    {
         foreach ($this->dataProviders as $provider) {
            if ($provider->supports($job)) {
                $data = $provider->getData($job);
                $handler = $this->fileHandlerFactory->getHandler($job->getFileType());

                $handler->write(
                    $job->getFilePath(),
                    $job->getFileType(),
                    $data
                );
                return;
            }
        }


        throw new \RuntimeException("No data provider found for this job");
    }
}
