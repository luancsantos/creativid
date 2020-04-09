<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;

class UsersTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userType = UserType::all();
        return view('userstype/index')->with(['userType' => $userType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userstype/create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($typeId)
    {
        $type = UserType::find($typeId);
        if(isset($type->id)){
            return view('userstype/edit')->with(['type' => $type]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserType::create([
            'label' => $request->label
        ]);

        return back()->with('success', 'Criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $types = UserType::find($request->id);
        $types->label = $request->name;
        $types->save();

        return back()->with('success', 'Alterado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $types = UserType::find($id);
        $types->delete();

        return back()->with('success', 'Excluído com sucesso');
    }
}
