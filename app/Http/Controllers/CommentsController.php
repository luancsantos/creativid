<?php

namespace App\Http\Controllers;

use App\Client;
use App\Comment;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
        return back()->with('success', 'Enviado com sucesso');
    }
}
