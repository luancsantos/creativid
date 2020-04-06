<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Status;
use App\TypeTicket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $status = Status::all();
        $types = TypeTicket::all();
        $departments = Department::all();
        $clientId = Auth::user()->client_id;
        if($clientId == null){
            $tickets = DB::table('tickets')
                                        ->whereIn('status_id', [1,3])
                                        ->orderBy("created_at")->get();
            return view('home')->with(['tickets' => $tickets,
                                        'status' => $status,
                                        'types' => $types,
                                        'departments' => $departments]);

        } else {
            $tickets = DB::table('tickets')
                                        ->whereIn('status_id', [1,3])
                                        ->where('client_id', $clientId)
                                        ->orderBy("created_at")->get();
            return view('home')->with(['tickets' => $tickets,
                                        'status' => $status,
                                        'types' => $types,
                                        'departments' => $departments]);
        }


    }

    public function className($id){
        if ($id == 1) {
            return 'btn btn-danger';
        } elseif ($id == 2){
            return 'btn btn-success';
        } else {
            return 'btn btn-warning';
        }
    }
}
