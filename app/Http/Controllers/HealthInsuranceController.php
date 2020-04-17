<?php

namespace App\Http\Controllers;

use App\HealthInsurance;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class HealthInsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $health = HealthInsurance::paginate(10);
        return view('healthInsurance/index')->with(['health' => $health]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('healthInsurance/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        HealthInsurance::create([
            'name' => $request->name,
            'cd_health_insurance' => $request->cd_health_insurance,
        ]);
        return back()->with('success', 'Criado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($health)
    {
        $health = HealthInsurance::find($health);
        if(isset($health->id)){
            return view('healthInsurance/edit')->with(['health' => $health]);
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
        $level = HealthInsurance::find($request->id);
        $level->name = $request->name;
        $level->cd_health_insurance = $request->cd_health_insurance;
        $level->save();

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
        $user = HealthInsurance::find($id);
        $user->delete();

        return back()->with('success', 'Convênio excluído com sucesso');
    }
}
