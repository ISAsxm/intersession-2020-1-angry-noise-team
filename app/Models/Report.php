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

    public function __construct(array $individualReports)
    {
        $this->individualReports = collect($individualReports)
            ->reject(function ($individualReport) {
                return !$individualReport instanceof IndividualReport;
            })
        ;
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
            $foo = (array) $individualReport->getReportData();

            foreach ($foo['files'] as $key => $file) {
                if (!is_numeric($key)) {
                    $this->reportData[$key] = $file;
                } else {
                    $this->reportData[] = $file;
                }
            }
        }

        return $this->reportData;
    }
}
