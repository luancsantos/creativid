<?php

namespace App\Http\Controllers;

use App\Client;
use App\Comment;
use App\Mail\TicketMessage;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Comment::create([
            'description' => $request->message,
            'ticket_id' => $request->ticket_id,
            'user_id' => $request->user_id
        ]);

        $ticket = Ticket::find($request->ticket_id);
        if(Auth::user()->id !== $ticket->user_id) {
            $user = User::find($ticket->user_id);
            $user = $user->email;
        } else {
            $user = 'contato@creativid.com.br';
        }

        Mail::to($user)->send(new TicketMessage($ticket));

        return back()->with('success', 'Enviado com sucesso');
    }
}
