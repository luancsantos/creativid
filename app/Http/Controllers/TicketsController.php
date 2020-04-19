<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Department;
use App\Client;
use App\Status;
use App\TypeTicket;
use App\HealthInsurance;
use App\Mail\TicketCreate;
use App\Mail\TicketStatus;
use App\UploadTicket;
use App\User;
use App\UserType;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $userType = UserType::find(Auth::user()->type_user_id);

        $ticket = Ticket::create([
            'label' => $request->label,
            'description' => $request->description,
            'health_insurance_id' => $request->health_insurance_id,
            'type_id' => $request->type_id,
            'department_id' => $userType->department_id,
            'client_id' => Auth::user()->client_id,
            'user_id' => Auth::user()->id,
            'status_id' => 1
        ]);

        Mail::to('suporte.pro@creativid.com.br')->send(new TicketCreate(Auth::user(), $ticket));

        if($request->hasfile('filename'))
         {
            $this->validate($request, [
                'filename' => 'required',
                'filename.*' => 'max:2048'
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
        $health = HealthInsurance::find($ticket->health_insurance_id);
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
                                                'health' =>$health,
                                                'images' => $list]);
            } else {
                return view('tickets/show')->with(['ticket' => $ticket,
                                                'types' => $types,
                                                'users' => $users,
                                                'status' => $status,
                                                'health' => $health,
                                                'departments' => $departments,
                                                'comments' => $comments]);
            }
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
        $ticket = Ticket::find($request->id);
        $ticket->status_id = $request->status_id;

        if($ticket->save()){
            $status = Status::find($request->status_id);
            $user = User::find($ticket->user_id);

            Mail::to($user->email)->send(new TicketStatus($user, $ticket, $status));
        }

        return back()->with('success', 'Status Alterado com sucesso');
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
