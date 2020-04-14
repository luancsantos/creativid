<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Department;
use App\Client;
use App\Status;
use App\TypeTicket;
use App\HealthInsurance;
use App\UploadTicket;
use App\User;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type_user_id == 1){
            $tickets = Ticket::orderBy("created_at","DESC")->get();;
        } else {
            $tickets = DB::table('tickets')->where('user_id', Auth::user()->id)->orderBy("created_at","DESC")->get();
        }

        $status = Status::all();
        $types = TypeTicket::all();
        $departments = Department::all();
        $users = User::all();
        $clients = Client::all();

        return view('tickets/index')->with(['tickets' => $tickets,
                                            'types' => $types,
                                            'users' => $users,
                                            'status' => $status,
                                            'clients' => $clients,
                                            'departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = TypeTicket::all();

        $health = HealthInsurance::orderBy('name', 'ASC')->get();

        return view('tickets/create')->with([
                                            'health' => $health,
                                            'types' => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = Ticket::create([
            'label' => $request->label,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'department_id' => Auth::user()->type_user_id,
            'client_id' => Auth::user()->client_id,
            'user_id' => Auth::user()->id,
            'status_id' => 1
        ]);

        if($request->hasfile('filename'))
         {
            $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/'.$ticket->id, $name);
                $data[] = $name;
            }
            $form= new UploadTicket();
            $form->image=json_encode($data);
            $form->ticket_id=$ticket->id;
            $form->save();
         }

        return back()->with('success', 'Chamado aberto com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($ticketId)
    {
        $ticket = Ticket::find($ticketId);
        $types = TypeTicket::find($ticket->type_id);
        $departments = Department::find($ticket->department_id);
        $status = Status::all();
        $users = User::all();
        $comments = DB::table('comments')->where('ticket_id', $ticketId)->orderBy('created_at','asc')->get();

        $images = DB::table('upload_tickets')->where('ticket_id', $ticketId)->get();
        if(!empty($images)){
            $list = [];
            foreach ($images as $value) {
                $decode = json_decode($value->image, TRUE);

                foreach($decode as $key => $img){
                    array_push($list,$img);
                }
            }
        }

        if(isset($ticket->id)){
            if (isset($list)) {
                return view('tickets/show')->with(['ticket' => $ticket,
                                                'types' => $types,
                                                'users' => $users,
                                                'status' => $status,
                                                'departments' => $departments,
                                                'comments' => $comments,
                                                'images' => $list]);
            } else {
                return view('tickets/show')->with(['ticket' => $ticket,
                                                'types' => $types,
                                                'users' => $users,
                                                'status' => $status,
                                                'departments' => $departments,
                                                'comments' => $comments]);
            }
        }
    }

    public function edit($userId)
    {
        $tickets = Ticket::find($userId);

        if(isset($tickets->id)){
            return view('tickets/edit')->with(['tickets' => $tickets]);
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
        $ticket = Ticket::find($id);
        $ticket->delete();

        return back()->with('success', 'Excluído com sucesso');
    }
}
