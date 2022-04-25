@extends('layouts.app')

@section('content')


<div class="container bg-light mt-5 p-3">
  <form action="{{ route ('storeTicket')}} " method="post">
    @csrf
    <h2 class="text-center m-3" >Add Question</h2>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="summary">Summary</label>
          <input type="text" class="form-control" placeholder="Your Question Here" name="summary" id="summary">
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="description">Description</label>
          <textarea type="text" class="form-control" placeholder="" name="description" id="description"></textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="services">Services</label>
          <input type="text" class="form-control" id="services" name="services" placeholder="">
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="statuts">statuts</label>
          <input type="text" class="form-control" id="statuts" name="statuts" placeholder="">
        </div>
      </div>

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection