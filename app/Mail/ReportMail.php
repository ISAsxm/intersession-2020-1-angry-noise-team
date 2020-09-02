<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $reportData;
    public int $errorNumber = 0;
    public int $linesParsed = 0;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $reportData)
    {
        $this->reportData = $reportData;
        $this->setErrorNumber($reportData);
        $this->setLinesParsed($reportData);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('contact@CodeLaïka.fr')
            ->subject('Success !')
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
        unset($reportData['numberOfLines']);
        $this->reportData = $reportData;
    }
}
