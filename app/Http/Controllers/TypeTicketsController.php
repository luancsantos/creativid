<?php

namespace App\Http\Controllers;

use App\TypeTicket;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TypeTicketsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = TypeTicket::all();
        return view('types/index')->with(['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TypeTicket::create([
            'name' => $request->name,
        ]);
        return back()->with('success', 'Criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($typeId)
    {
        $type = TypeTicket::find($typeId);
        if(isset($type->id)){
            return view('types/edit')->with(['type' => $type]);
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
        $type = TypeTicket::find($request->id);
        $type->name = $request->name;
        $type->save();

        return back()->with('success', 'Convênio alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = TypeTicket::find($id);
        $user->delete();

        return back()->with('success', 'Excluído com sucesso');
    }
}
