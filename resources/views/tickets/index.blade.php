@extends('layouts.app')

@section('content')

<div class="d-flex flex-row m-5 justify-content-between">
	<span >
		<a class="navbar-brand " href="/"> Support Tickets System</a>
    </span>
    @if(Auth::user()->role == 'user')
    <span class="">
        <a class="btn btn-success" href="/creat-tickets" > Add Ticket </a>
          
        <!-- <a  class="btn btn-success" href="/tickets/add" > Add Ticket </a> -->
        
    </span>
    @endif

</div>
<div class="container m-3">
    <div class="row">
        
        @foreach ($tickets as $ticket)

        <div class="card col-lg-3 col-md-6 col-sm-12 p-0 mb-2 m-3 ">
            <a href="/tickets/{{$ticket->id}}">
                <div class="card-header">
                    {{$ticket->summary}}
                </div>
            </a>
            <div class="card-header">
                    {{$ticket->is_solved}}
                </div>
            <div class="card-body">
                <p class="card-text">{{$ticket->description}}</p>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                {{$ticket->created_at}}
                @auth
                @if(Auth::user()->role == 'admin')
                <!-- <form action="/tickets/{{$ticket->id}}" method="post"> -->
                <form action="{{route('getResponse')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
                @endif
                @endauth
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection