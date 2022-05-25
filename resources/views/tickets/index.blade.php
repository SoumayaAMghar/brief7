@extends('layouts.app')

@section('title', 'All Tickets')

@section('content')

<div>
	<h5 class="text-center"> Tickets</h5>
</div>

<div style="height:500px" class="panel-body flex align-items-center ">

	@if ($tickets->isEmpty())
		<p>There are currently no tickets.</p>
	@else
	<div class="container">
		<table class="table ">
			@include('includes.flash')
			<thead>
				<tr>
					<th>Category</th>
					<th>Title</th>
					<th>Status</th>
					<th>Last Updated</th>
					<th style="text-align:center" colspan="2">Actions</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($tickets as $ticket)
				<tr>
					<td>
					@foreach ($categories as $category)
						@if ($category->id === $ticket->category_id)
							{{ $category->name }}
						@endif
					@endforeach
					</td>
					<td>
						<a href="{{ url('tickets/'. $ticket->ticket_id) }}">
							#{{ $ticket->ticket_id }} - {{ $ticket->title }}
						</a>
					</td>
					<td>
					@if ($ticket->is_resolved === 'Open')
						<span class="label label-success">{{ $ticket->is_resolved }}</span>
					@else
						<span class="label label-danger">{{ $ticket->is_resolved }}</span>
					@endif
					</td>
					<td>{{ $ticket->updated_at }}</td>
					<td>
						<a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Comment</a>
					</td>
					<td>
						<div class="d-flex ">
						<form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-danger mr-2">Close</button>
						</form>
						
						<form action="{{ url('admin/open_ticket/' . $ticket->ticket_id) }}" method="POST">
							{!! csrf_field() !!}
							<button type="submit" class="btn btn-success">Open</button>
						</form>

						</div>
						
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
		</div>

		{{ $tickets->render() }}
	@endif
</div>

@endsection