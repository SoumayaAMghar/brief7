@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
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
    <section class="mt-5">


        <div class="">
            <form action=" {{ route('addReply') }} " method = "POST">

                @csrf
                <textarea class="form-control" id="text" name="response" placeholder="Type your answer" rows="5"></textarea>
                <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
                <button class="btn btn-info text-white mt-2"  type="submit">Add Answer</button>
                
            </form>
        </div>
        @foreach ($responses as $response)
        <div class="p-3 border rounded border-1 m-4 d-flex justify-content-between">
            <p class="m-0">{{$response->response}}</p>
            @auth
                @if(Auth::user()->role == 'admin')
                <form action="/responses/{{$response->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
                @endif
                @endauth
        </div>
        @endforeach
    </section>
</div>
@endsection