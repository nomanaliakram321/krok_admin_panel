@extends('layouts.master')
@section('title')
Categories
@endsection
@section('content')

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

    @if(Session::get('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('deleted') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('delete-failed'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert" id="gone">
            <strong> {{ Session::get('delete-failed') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">


                    <div class="col ">
                        <h4 class="card-title"> Questions Data</h4>                </div>
                        <div class="col ">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" >Add Single Question  <i class="fa fa-plus"></i></a>

                                            </div>
                    <div class="col">
                        <button  type="button" class="btn btn-success" data-toggle="modal" data-target="#bulkQuestion" >Add Bulk Questions  <i class="fa fa-plus"></i></a>
                    </div>
                    <!--  Single Question Modal -->

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Question</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="/post-question-form" method="POST">
                              @csrf
                            <div class="modal-body">
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



                                  <div class="modal-footer">
                             <button type="submit" class="btn btn-primary">Submit</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>

                              </div>

                          </form>


                        </div>
                      </div>
                    </div>

                    <!--  Bulk Question Modal -->
                    <div class="modal fade" id="bulkQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add Bulk Of Questions</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="modal-body">
                                {{--  <div >

                                    <input type="file" name="file" accept=".csv" required>
                                  </div>  --}}



                                  <div class="{{ $errors->has('csv_file') ? ' has-error' : '' }}">
                                    <label for="csv_file" class="col-md-4 control-label">CSV file to import</label>

                                    <div >
                                        <input id="csv_file" accept=".csv" type="file" class="form-control" name="file" required>

                                        @if ($errors->has('csv_file'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('csv_file') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="header" checked> File contains header row?
                                            </label>
                                        </div>
                                    </div>
                                </div>






                            </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success">Upload</button>
                            </div>
                        </form>
                          </div>
                        </div>
                      </div>


      <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table " id="dataTable" width="100%" cellspacing="0">
                            <thead class=" text-primary">

                                    <th style="color: greenyellow"><b> ID</b> </th>
                                    <th style="color: greenyellow"><b> Question </b></th>
                                    <th style="color: greenyellow"><b>  Answer </b></th>
                                    <th style="color: greenyellow"><b>  Categories </b></th>
                                    <th style="color: greenyellow"><b> Actions </b></th>
                                    <th> </th>

                            </thead>
                            <tbody>
                                @foreach ($questions as $row )
                                <tr>
                                    <td> {{ $row->id }} </td>
                                    <td> {{ $row->question }} </td>
                                    <td> {{ $row->answer }} </td>
                                    <td> {{ $row->category->name }} </td>
                                    <td>
                                        <a class="btn btn-success"   href="{{ URL::to('edit-question') }}/{{ $row->id }}" role="button"><i class="fa fa-edit"></i></a>

                                    </td>
                                    <td>
                                        <a  class="btn btn-danger " href="#"  role="button"><i class="fa fa-trash"></i></a>

                                    </td>

                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
@section('scripts')
<script>
    function checkDelete() {
        var check = confirm('Are you sure you want to Delete this?');
        if(check){
            return true;
        }
        return false;
    }
</script>
@endsection
