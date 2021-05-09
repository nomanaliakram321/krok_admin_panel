@extends('layouts.master')
@section('title')
DashBoard
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Update Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ URL::to('update-category') }}/{{ $category->id }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1"> Category name</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" name="categoryName">
                    </div>

                    <button type="submit" class="btn btn-success"> Update </button>
                </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
@endsection
