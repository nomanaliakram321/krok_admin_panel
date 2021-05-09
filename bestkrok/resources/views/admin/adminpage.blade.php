@extends('layouts.master')
@section('title')
Admins
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
                      <form action="/add-admin" method="POST">
                          @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" required type="text" class="form-control" id="name" placeholder="Name">
                              </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                              </div>
                              <div class="form-group">
                                <label for="name">UserType</label>
                                <input name="usertype" type="text" value="admin" class="form-control" id="name" placeholder="Name">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
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


  <br>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead class=" text-primary">
                            <th style="color: greenyellow">
                               <b> ID</b>
                            </th>
                            <th style="color: greenyellow">
                               <b> Name</b>
                            </th>
                            <th style="color: greenyellow">
                               <b> Email</b>
                            </th>
                            <th style="color: greenyellow">
                               <b> UserType</b>
                            </th>
                            <th style="color: greenyellow">
                              <b>  Actions</b>
                            </th>

                        </thead>
                        <tbody>
                            @foreach ($users as $row )
                            <tr>
                                <td>
                                    {{ $row->id }}
                                </td>
                                <td>
                                    {{ $row->name }}
                                </td>

                                <td>
                                    {{ $row->email }}
                                </td>
                                <td>
                                    {{ $row->usertype }}
                                </td>
                                <td>
                                    <a class="btn btn-success"   href="#" role="button"><i class="fa fa-edit"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#exampleModal"  role="button"><i class="fa fa-trash"></i></a>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form action="{{ route('delete',['id'=>$row->id]) }}"  id="delete_model_form" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                            <div class="modal-body">
                                              <input type="text" id="delete_admin_id"/>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                              <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>
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
    $document.ready(function()
    {
        $('#datatable').DataTable();
        $('#datatable').on('click','.deletbtn',function(){
            $tr=$(this).closest('tr');
            var data=$tr.children('td').map(function()
            {
                return $(this).text();
            }).get();
            console.log(data);
            $('delete_admin_id').val(data[0]);
            $('delete_model_form').attr('action','/admin-delete/'+ data[0]);
            $('#exampleModal').model('show');

        });
    });

</script>
@endsection
