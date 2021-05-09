@extends('layouts.master')
@section('title')
DashBoard
@endsection


@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Dashboard</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <div class="row">
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="row">
                                    <div class="card-body col-xl-8 col-md-8 " ><h3>Questions</h3></div>
                                    <div class="card-body col-xl-4 col-md-4"><h3>{{ $question}}</h3></div>
                                </div>

                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ URL::to('all-questions') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="row">
                                    <div class="card-body col-xl-8 col-md-8 " ><h3>Categories</h3></div>
                                    <div class="card-body col-xl-4 col-md-4"><h3>{{ $category}}</h3></div>
                                </div>

                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="{{ URL::to('all-categories') }}">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                            <div class="card bg-success text-white mb-4">

                                <div class="row">
                                    <div class="card-body col-xl-8 col-md-8 " ><h3>Admins</h3></div>
                                    <div class="card-body col-xl-4 col-md-4"><h3>{{ $admin}}</h3></div>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
@endsection
