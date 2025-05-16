<?php

namespace App\UI\Controller;

use App\Application\ImportExport\Service\FileExporterService;
use App\Application\Service\CreateJobService;
use App\Domain\Model\ImportExport\Repository\JobRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Application\ImportExport\Message\ExportJobMessage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;

class ImportExportController extends AbstractController
{
    public function __construct(
        private FileExporterService $fileExporter,
        private CreateJobService $createJobService,
        private JobRepositoryInterface $jobRepository,
        private MessageBusInterface $messageBus
    ) {}

    #[Route('/export-job', name: 'export_job', methods: ['POST'])]
    public function __invoke(): Response
    {
        $job = $this->createJobService->execute(
        1,
        '/tmp/export_' . 1 . '.csv',
        'csv',
        'user_job',
        new \DateTimeImmutable('now'),
        );
        try {
            $this->messageBus->dispatch(new ExportJobMessage($job->getId()));

        } catch (\Exception $e) {
            return new Response("Error during export : " . $e->getMessage(), 500);
        }

        return new Response("Export created and launched", 202);
    }
}
