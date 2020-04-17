<?php

namespace App\Http\Controllers;

use App\UserType;
use App\Department;
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
        return view('usersType/index')->with(['userType' => $userType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = Department::all();
        return view('usersType/create')->with(['department' => $department]);
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
        $department = Department::all();
        if(isset($type->id)){
            return view('usersType/edit')->with(['type' => $type, 'department' => $department]);
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
            'label' => $request->label,
            'department_id' => $request->department_id
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
        $types->department_id = $request->department_id;
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
