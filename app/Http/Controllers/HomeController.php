<?php

namespace App\Http\Controllers;
use App\Department;
use App\Client;
use App\User;
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
        $users = User::all();

        if(Auth::user()->type_user_id == 1){
            $client = Client::all();
            $tickets = DB::table('tickets')
                                        ->whereIn('status_id', [1,3])
                                        ->orderBy("created_at","DESC")->get();

            return view('home')->with(['tickets' => $tickets,
                                        'status' => $status,
                                        'types' => $types,
                                        'users' => $users,
                                        'clients' => $client]);

        } else {
            $departments = Department::all();
            $tickets = DB::table('tickets')
                                        ->whereIn('status_id', [1,3])
                                        ->where('client_id', Auth::user()->client_id)
                                        ->orderBy("created_at","DESC")->get();

            return view('home')->with(['tickets' => $tickets,
                                        'status' => $status,
                                        'types' => $types,
                                        'users' => $users,
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
