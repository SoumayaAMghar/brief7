@extends('layouts.app')

@section('content')

<div class=" container d-flex justify-content-center align-items-center flex-column">



    <div class=" mt-5   w-75 ">
        <div class="card w-100">
            <div class="card-header">
                {{$ticket->summary}}
            </div>
            <div class="card-body">
                <p class="card-text">{{$ticket->description}}</p>
            </div>
            <div class="card-footer text-muted">
                {{$ticket->created_at}}

            </div>
        </div>

    </div>

    <div class="mt-5  w-75 ">


        <div class="mb-5 ">
            <form action=" {{ route('addReply') }} " method="POST">

                @csrf
                <textarea class="form-control mb-3" id="text" name="response" placeholder="Type your answer" rows="5"></textarea>
                <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-info text-info " type="submit">Add Answer</button>


                </div>

            </form>
        </div>
        @foreach ($responses as $response)


        @auth
        @if(Auth::user()->role == 'admin')
        <h1>Admin</h1>
        <div class="p-3 border rounded border-1 m-1 d-flex justify-content-between bg-info w-75">
            <p class=" m-0">{{$response->response}}</p>
        </div>
        @endif
        @endauth

        @endforeach
    </div>

</div>

@endsection