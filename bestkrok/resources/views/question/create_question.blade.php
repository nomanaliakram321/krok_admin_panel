@extends('layout')
@section( 'dashboard-content')
<h1 class="mt-4">Questions</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Create Question Form</li>
</ol>
@if(Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="gone">
    <strong> {{ Session::get('success') }} </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::get('failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
    <strong> {{ Session::get('failed') }} </strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<form action="{{ URL::to('post-question-form') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Question </label>
      <textarea name="question" rows="3" class="form-control" aria-colcount="3" aria-describedby="emailHelp" placeholder="Question"></textarea>
    </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Answer </label>
      <input name="answer"   type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Answer">

    </div>
    <div class="form-group ">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control" name="category">
          <option selected>Select Category</option>
          @foreach ($categories as $category )
          <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach

        </select>
      </div>


    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@stop
