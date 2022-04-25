@extends('layouts.app')

@section('content')

        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
     -->
<div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="/"> Support Tickets System</a>
	</div>
    @if(Auth::user()->role == 'user')
    <div>
        <a  class="btn btn-success" href="/tickets/add"> Add Ticket </a>
    </div>
    @endif

</div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="card-body"> 
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Tickets</th>
                        <th scope="col">Services</th>
                        <th scope="col">Submited by</th>
                        <th scope="col">Statuts</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                        <th scope="row">{{$ticket->id}}</th>
                        <th scope="row">{{$ticket->service_id}}</th>
                        <th scope="row">{{$ticket->user_id}}</th>
                        <th scope="row">{{$ticket->statut_id}}</th>
                        <th scope="row">{{$ticket->created_at}}</th>
                        <th scope="row">
                        <form action="/tickets/{{$ticket->id}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="border-0 ml-2 badge badge-danger">Delete</button>
                        </form>
                        </th>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>   
                @endif
                @endauth
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
