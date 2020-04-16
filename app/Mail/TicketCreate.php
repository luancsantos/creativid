<?php

namespace App\Mail;

use App\HealthInsurance;
use App\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class TicketCreate extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Ticket $ticket)
    {
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
        if ($this->ticket->health_insurance_id !== null) {
            $health = HealthInsurance::find($this->ticket->health_insurance_id);
            $health = $health->name;
        } else {
            $health = 'Convênio não informado';
        }

        return $this->view('emails.ticketCreate')->subject('Criação de chamado')->with([
            'user' => $this->user,
            'ticket' => $this->ticket,
            'health' => $health
        ]);
    }
}
