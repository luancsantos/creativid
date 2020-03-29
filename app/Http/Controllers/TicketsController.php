<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Department;
use App\Status;
use App\TypeTicket;
use App\UploadTicket;
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
        $clientId = Auth::user()->client_id;
        if($clientId == null){
            $tickets = Ticket::all();
        } else {
            $tickets = DB::table('tickets')->where('client_id', $clientId)->orderBy("created_at")->get();
        }

        $types = TypeTicket::all();
        $departments = Department::all();

        return view('tickets/index')->with(['tickets' => $tickets,
                                            'types' => $types,
                                            'departments' => $departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $status = Status::all();
        $types = TypeTicket::all();

        return view('tickets/create')->with([
                                            'departments' => $departments,
                                            'status' => $status,
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

        $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $ticket = Ticket::create([
            'label' => $request->label,
            'description' => $request->description,
            'type_id' => $request->type_id,
            'department_id' => $request->department_id,
            'client_id' => Auth::user()->client_id,
            'status_id' => $request->status_id
        ]);

        if($request->hasfile('filename'))
         {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/'.$ticket->id, $name);
                $data[] = $name;
            }
         }

        $form= new UploadTicket();
        $form->image=json_encode($data);
        $form->ticket_id=$ticket->id;
        $form->save();

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
        $status = Status::find($ticket->status_id);
        $images = DB::table('upload_tickets')->where('ticket_id', $ticketId)->get();

        foreach ($images as $value) {
            $decode = json_decode($value->image, TRUE);

            foreach($decode as $key => $img){

                $list = [];
                array_push($list,$img);
            }


        }

        if(isset($ticket->id)){
            return view('tickets/show')->with(['ticket' => $ticket,
                                                'types' => $types,
                                                'status' => $status,
                                                'departments' => $departments,
                                                'images' => $list]);
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

        return back()->with([
            'type'    => 'success',
            'message' => 'Usuário excluído com sucesso'
        ]);
    }
}
