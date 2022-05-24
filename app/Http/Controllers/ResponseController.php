<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Response;
use App\Models\Ticket;
use Illuminate\Http\Request;


class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // dd($request);
        $ticket = Ticket::findOrFail($request->ticket_id);
        // $responses = Response::where('ticket_id','=',$request->ticket_id);
        $responses = $ticket->response;
        // dd($responses);
      
        return view('responses.index', ['responses' => $responses, 'ticket' => $ticket]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        Response::create([
            'response' => $request->response,
            'user_id' => Auth::id(),
            'ticket_id' => $request->ticket_id,
            
        ]);
        
        

        $ticket = Ticket::findOrFail($request->ticket_id);
        $responses = Response::where('ticket_id','=',$request->ticket_id)->get();
        // dd($responses);

        return view('responses.index', ['responses' => $responses, 'ticket' => $ticket]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
