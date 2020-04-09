<?php

namespace App\Http\Controllers;

use App\User;
use App\Client;
use App\UserType;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users/index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $types = UserType::all();
        return view('users/create')->with(['clients' => $clients, 'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'client_id' => $request->client_id,
            'type_user_id' => $request->type_user_id
        ]);
        return back()->with('success', 'Criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $user = User::find($userId);
        $clients = Client::all();
        $types = UserType::all();
        if(isset($user->id)){
            return view('users/edit')->with(['user' => $user, 'types' => $types, 'clients' => $clients]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->client_id = $request->client_id;
        $user->type_user_id = $request->type_user_id;
        $user->save();

        return back()->with('success', 'Alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return back()->with('success', 'Excluído com sucesso');
    }

    public function profile($userId)
    {
        $user = User::find($userId);
        if(isset($user->id)){
            return view('users/profile')->with(['user' => $user]);
        }
    }
}
