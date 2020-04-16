<?php

namespace App\Mail;

use App\HealthInsurance;
use App\Status;
use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class TicketStatus extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $ticket;
    protected $status;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Ticket $ticket, Status $status)
    {
        $this->status = $status;
        $this->user = $user;
        $this->ticket = $ticket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.ticketStatus')->subject('Mudança de status')->with([
            'user' => $this->user,
            'ticket' => $this->ticket,
            'status' => $this->status
        ]);
    }
}
