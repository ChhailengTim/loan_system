<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompanyRejectRequest extends Mailable
{
    use Queueable, SerializesModels;

    private $items;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Request Loan Approved')
            ->view('emails.company_reject_request')
            ->with(['data' => $this->items]);
    }
}
