<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Service;



class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->role == 'admin'){
            $tickets = Ticket::all();
           return view('dashboard', ['tickets' => $tickets]); 
        }
        else{
            $user= Auth::id();
            $tickets = Ticket::all()->where('user_id','=',$user);

            return view('tickets.index', ['tickets' => $tickets]); 
        }
            
    }
    public function question(){
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('tickets.question', ['tickets' => $tickets]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service=Service::all();
        return view('tickets.create',['service'=>$service]);
    }
    public function answer()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $ticket = new Ticket();

        $ticket->summary = request('summary');
        $ticket->description = request('description');
        $ticket->service_id = request('services');
        $ticket->statut_id = request('status');
        $ticket->user_id = Auth::id();

        $ticket->save();

        return redirect('/tickets');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
