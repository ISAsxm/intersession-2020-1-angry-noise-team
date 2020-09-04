<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $reportData;
    public string $repoUrl;
    public int $errorNumber = 0;
    public int $linesParsed = 0;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $reportData)
    {
        $this->setErrorNumber($reportData);
        $this->setLinesParsed($reportData);
        $this->setRepoUrl($reportData);
        $this->setReportData($reportData);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('contact@CodeLaika.fr')
            ->subject('Code Laïka - Votre rapport est arrivé !')
            ->view('emails.report')
        ;
    }

    private function setErrorNumber(array $reportData)
    {
        foreach ($reportData as $file) {
            if (isset($file['errors'])) {
                $this->errorNumber += count($file['errors']);
            }
        }
    }

    private function setLinesParsed(array $reportData)
    {
        $this->linesParsed = $reportData['numberOfLines'];
    }

    private function setRepoUrl(array $reportData)
    {
        $this->repoUrl = $reportData['repoUrl'];
    }

    private function setReportData(array $reportData)
    {
        foreach ($reportData as $index => $file) {
            if (!is_numeric($index)) {
                unset($reportData[$index]);
            }

            $this->reportData = $reportData;
        }
    }
}
