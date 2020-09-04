<?php


namespace App\Models;


use Illuminate\Support\Collection;

class Report
{
    /**
     * @var Collection|IndividualReport[]
     */
    private Collection $individualReports;

    private array $reportData = [];

    private string $repoUrl;

    public function __construct(array $individualReports, string $repoUrl)
    {
        $this->individualReports = collect($individualReports)
            ->reject(function ($individualReport) {
                return !$individualReport instanceof IndividualReport;
            })
        ;
        $this->repoUrl = $repoUrl;
    }

    /**
     * @return Collection|IndividualReport[]
     */
    public function getIndividualReports(): Collection
    {
        return $this->individualReports;
    }

    public function getReportData(): array
    {
        foreach ($this->individualReports as $individualReport) {
            $reportData = (array) $individualReport->getReportData();

            foreach ($reportData['files'] as $key => $file) {
                if (!is_numeric($key)) {
                    $this->reportData[$key] = $file;
                } else {
                    $this->reportData[] = $file;
                }
            }
        }

        $this->reportData['repoUrl'] = $this->repoUrl;

        return $this->reportData;
    }
}
