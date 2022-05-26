@extends('layouts.app')

@section('content')

        <!-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
     -->

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <div class="card-body">
                    @auth
                    @if(Auth::user()->role == 'admin')
                    <h5>Registred Users:</h5>

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <th scope="row">{{$user->name}}</th>
                        <th scope="row">{{$user->email}}</th>
                        <th scope="row">
                        <form action="/users/{{$user->id}}" method="post">
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

                    <!-- <h5><a href="#"> Your Questions -></a></h5>
                    <h5><a href="#"> Your Responses -></a></h5> -->
                </div>
                </div>
            </div>
        </div>
    </div>

@endsection
