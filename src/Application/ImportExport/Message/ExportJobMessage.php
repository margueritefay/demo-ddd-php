<?php
namespace App\Application\ImportExport\Message;

class ExportJobMessage
{
    public function __construct(
        public readonly string $jobId
    ) {}
}
