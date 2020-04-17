<?php

namespace App\Mail;

use App\HealthInsurance;
use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketMessage extends Mailable
{
    use Queueable, SerializesModels;
    protected $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ticketMessage')->subject('Comentário respondido')->with([
            'ticket' => $this->ticket
        ]);
    }
}
