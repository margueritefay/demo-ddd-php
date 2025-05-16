<?php

namespace App\Application\ImportExport\MessageHandler;

use App\Application\ImportExport\Message\ExportJobMessage;
use App\Application\ImportExport\Service\FileExporterService;
use App\Domain\Model\ImportExport\Repository\JobRepositoryInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class ExportJobMessageHandler
{
    public function __construct(
        private JobRepositoryInterface $jobRepository,
        private FileExporterService $fileExporterService,
    ) {}

    public function __invoke(ExportJobMessage $message): void
    {
        $job = $this->jobRepository->findById($message->jobId);
        if (!$job) {
            throw new \RuntimeException("Export job not found");
        }

        $this->fileExporterService->export($job);
    }
}
