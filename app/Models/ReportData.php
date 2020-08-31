<?php


namespace App\Models;


class ReportData
{
    public array $files;

    public function __construct(IndividualReport $individualReport)
    {
        if (isset($individualReport['package']) && $individualReport['package'] === 'phpmd') {
            $this->handlePhpMdData($individualReport);
        } else {
            $this->handlePhpCsFixerDate($individualReport);
        }

    }

    private function handlePhpMdData(IndividualReport $individualReport)
    {
        foreach ($individualReport['files'] as $file) {
            $this->files[] = [
                'file' => $file['file'],
                'errors' => [],
            ];
        }
    }
}
