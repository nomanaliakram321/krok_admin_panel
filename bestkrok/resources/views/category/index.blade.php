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
                        <h4 class="card-title"> Admins Data</h4>                </div>
                        <div class="col ">
                                         </div>
                    <div class="col">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter" >Add New Admin  <i class="fa fa-plus"></i></a>
                    </div>
                    <!-- Modal -->

                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="/post-category-form" method="POST">
                              @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input name="categoryName" required type="text" class="form-control" id="name" placeholder="Category Name">
                                  </div>




                                  <div class="modal-footer">
                             <button type="submit" class="btn btn-success">Submit</button>
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>

                              </div>

                          </form>


                        </div>
                      </div>
                    </div>


      <br>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table">
                            <thead class=" text-primary">
                                <th style="color: greenyellow">
                                   <b> ID</b>
                                </th>
                                <th style="color: greenyellow"><b>
                                    Name</b>
                                </th>


                                <th style="color: greenyellow">
                                  <b> Actions</b>
                                </th>

                            </thead>
                            <tbody>
                                @foreach ($categories as $row )
                                <tr>
                                    <td>
                                        {{ $row->id }}
                                    </td>
                                    <td>
                                        {{ $row->name }}
                                    </td>
                                    <td>
                                        <a class="btn btn-success"   href="{{ URL::to('edit-category') }}/{{ $row->id }}" role="button"><i class="fa fa-edit"></i></a>
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
