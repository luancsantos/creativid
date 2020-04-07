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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients/create');
    }

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
        return back()->with([
            'type'    => 'success',
            'message' => 'Usuário excluído com sucesso'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $user = Client::find($userId);
        if(isset($user->id)){
            return view('clients/edit')->with(['user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Client::find($id);
        $user->delete();

        return back()->with([
            'type'    => 'success',
            'message' => 'Usuário excluído com sucesso'
        ]);
    }
}
