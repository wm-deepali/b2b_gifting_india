<?php

namespace App\Mail;

use App\Models\Quote;
use App\Models\QuoteSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteProposalMail extends Mailable
{
    use Queueable, SerializesModels;

    public Quote $quote;
    public ?QuoteSetting $settings;
    public string $pdfContent;

    public function __construct(Quote $quote, ?QuoteSetting $settings, string $pdfContent)
    {
        $this->quote = $quote;
        $this->settings = $settings;
        $this->pdfContent = $pdfContent;
    }

    public function build()
    {
        $companyName = $this->settings?->company_name ?? config('app.name');

        return $this
            ->subject('Proposal ' . $this->quote->proposal_id . ' from ' . $companyName)
            ->view('emails.quotes.proposal')
            ->attachData($this->pdfContent, $this->quote->proposal_id . '.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}