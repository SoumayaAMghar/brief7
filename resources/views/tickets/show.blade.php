@extends('layouts.app')

@section('title', $ticket->title)

@section('content')
	<div class="row">
		<div class="col-md-7 col-md-offset-1 mx-auto">
			<div class="panel panel-default">
				<h1 class="panel-heading text-center">
					{{ $ticket->ticket_id }} - {{ $ticket->title }}
				</h1>

				<div class="panel-body">
					<div class="ticket-info">
						<p class="h2 mt-6 ">{{ $ticket->message }}</p>
					</div>

					<hr>
					<!-- This will display comments -->
					<div class="comments">
						@foreach ($comments as $comment)
							<div class="panel panel-heading h5">
								{{ $comment->user->name }} 
								
							</div>

							<div class="panel panel-body d-flex flex-column border rounded bg-white p-1 mb-3">
								{{ $comment->comment }}
								<div class="d-flex flex-row-reverse">
								<span class="pull-right h5">{{ $comment->created_at->format('d-m-Y H:i') }}</span>
								</div>
								
							</div>
						</div>
						@endforeach
					</div>

					<!-- This will POST the information entered to the CommentsController service. -->
					<div class="comment-form">
						<form action="{{ url('comment') }}" method="POST" class="form">
							{!! csrf_field() !!}

							<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

							<div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
								<textarea rows="10" id="comment" class="form-control" name="comment"></textarea>

								@if ($errors->has('comment'))
									<span class="help-block">
										<strong>{{ $errors->first('comment') }}</strong>
									</span>
								@endif
							</div>
							<div class="form-group">
								@include('includes.flash')
							@if ($ticket->is_resolved === 'open' || (Auth::user()->is_admin === 1))
								<button type="submit" class="btn btn-primary">Submit</button>
							@else
								<button type="submit" class="btn btn-primary"disabled>Submit</button>
							@endif
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection