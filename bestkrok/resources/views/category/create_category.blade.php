@extends('layout')
@section( 'dashboard-content')
<h1 class="mt-4">Category</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Create Category Form</li>
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

<form action="{{ URL::to('post-category-form') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Category Name</label>
      <input name="categoryName" type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Category Name">

    </div>


    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@stop
