<?php

namespace App\Models;

class IndividualReport
{
    public const PHP_CS_FIXER = 'PhpCsFixer';
    public const PHP_MESS_DETECTOR = 'PhpMessDetector';
    public const PHP_LOC = 'Phploc';

    private string $name;

    private array $decodedJson;

    private string $json;

    private ReportData $reportData;

    /**
     * @throws \JsonException
     */
    public function __construct(string $json, string $name)
    {
        $this->name = $name;
        $this->decodedJson = json_decode($json, true);
        $this->reportData = new ReportData($this);

        if ($this->decodedJson) {
            $this->json = $json;
        } else {
            throw new \JsonException('Invalid JSON');
        }
    }

    public function getJson(): string
    {
        return $this->json;
    }

    public function getDecodedJson(): array
    {
        return $this->decodedJson;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getReportData(): ReportData
    {
        return $this->reportData;
    }
}
