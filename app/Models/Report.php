<?php


namespace App\Models;


use Illuminate\Support\Collection;

class Report
{
    private Collection $individualReports;

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
}
