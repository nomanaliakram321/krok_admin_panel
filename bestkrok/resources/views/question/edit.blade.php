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
                <form action="{{ URL::to('update-question') }}/{{ $question->id }}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Question </label>
                      <textarea  name="question" rows="3" class="form-control" aria-colcount="3" aria-describedby="emailHelp" placeholder="Question">{{ $question->question }}</textarea>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Answer </label>
                      <input name="answer" value=" {{ $question->answer  }}"  type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Answer">

                    </div>
                    <div class="form-group ">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control" name="category">
                          <option selected>Select Category</option>
                          @foreach ($categories as $category )
                          <option value="{{ $category->id }}" @if ($category->id==$question->category_id) selected

                          @endif>{{ $category->name }}</option>
                          @endforeach

                        </select>
                      </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>

            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
@endsection
