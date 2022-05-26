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

            <div class="flex justify-between card-footer">
                <div class="text-muted">
                    {{$ticket->created_at}}
                </div>
                <div class="d-flex ">
                    
                    <form action="{{route('close_ticket')}}" method="POST">
                        @csrf
                        <input value="{{$ticket->id}}" name='idTicket' type="hidden" />
                        @auth
                        @if(Auth::user()->role == 'admin')
                        <button type="submit" name="answered" value="answered" class="btn btn-danger bg-red-600 text-red-600 mr-2" >Answered</button>
                        @else
                        <button type="submit" name="solved" value="solved" class="btn btn-danger bg-red-600 text-red-600 mr-2" >solved</button>
                        @endif
                        @endauth
                    </form>

                </div>
            </div>
        </div>

    </div>

    <div class="mt-5  w-75">


        <div class="mb-1 ">
            <form action=" {{ route('addReply') }} " method="POST">

                @csrf
                <textarea class="form-control mb-3" id="text" name="response" placeholder="Type your answer" rows="5"></textarea>
                <input type="hidden" value="{{$ticket->id}}" name="ticket_id">
                <div class="d-flex justify-content-center">
                    <button class="btn btn-info text-info " type="submit">Add Answer</button>
                </div>

            </form>
        </div>
    </div>


    <div class="mt-5  mb-4  w-75">
        @foreach ($responses as $response)
        <div class="border ml-3 flex flex-col mt-3 rounded-lg " style="background-color: #fff;">

            <div class="flex justify-between mt-1  ">
                <p class="text-secondary ml-3 ">{{$response->created_at->diffForHumans()}} </p>
                <p class="mr-3">{{$response->user->name}}</p>
            </div>

            <p class="m-3">{{$response->response}}</p>

        </div>
        @endforeach
    </div>
</div>


@endsection