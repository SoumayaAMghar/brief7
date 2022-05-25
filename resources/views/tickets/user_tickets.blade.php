@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')



<div class="d-flex flex-row m-5 justify-content-between">
	@if (Auth::user()->is_admin)
		<p>
			See all <a href="{{ url('admin/tickets') }}">tickets</a>
		</p>
		<p>
			Add <a href="{{ url('/admin/add_category') }}">categories</a>
		<p>
			See all <a href="{{ url('/admin/users') }}">Users</a>
		</p>
		</p>
	@else

	<div>
	<a  class="btn btn-success" href="{{ route('newticket') }}"> Add Ticket </a>
	</div>



	@endif
</div>



<div class="panel-body">
	@if ($tickets->isEmpty())
		<p>You have not created any tickets.</p>
	@else

<div class="container m-3">
<div class="row">
	@foreach ($tickets as $ticket)

	<div class="card col-lg-3 col-md-6 col-sm-12 p-0 mb-2 m-3 ">
		<div class="card-header">
			<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
				#{{ $ticket->ticket_id }} - {{ $ticket->title }}
			</a>
		</div>

		<div class="card-body">
		@if ($ticket->status === 'Open')
			<span class="label label-success">{{ $ticket->is_resolved }}</span>
		@else
			<span class="label label-danger">{{ $ticket->is_resolved }}</span>
		@endif
		</div>
		

		<div class="card-footer text-muted d-flex justify-content-between align-items-center">
			{{ $ticket->updated_at }}
		</div>
	</div>
	@endforeach
</div>
</div>


		{{ $tickets->render() }} <!-- Pagination -->
	@endif
</div>

@endsection