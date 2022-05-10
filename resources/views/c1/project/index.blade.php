@extends('master')
@section('css')
<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
<!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-users.css') }}">
@endsection
@section('content')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Project</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Project List
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            
            <!-- Zero configuration table -->
            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                         
                            <div class="card-body card-dashboard">
                                <div class="row">
                                    <div class="col-lg-3">
                                          <a href="{{ route('c.project.create') }}" class="btn btn-primary btn-block glow users-list-clear mb-0 float-right">Create Project</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Date</th>
                                                <th>image</th>
                                                <th>Project Title</th>
                                                <th>File</th>
                                                <th>Price</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                            <td><img src="{{ asset($item->image) }}" alt="..." width="35px" height="35px"></td>
                                            <td>{{$item->project_title}}</td>
                                            <td><a download href="{{ asset($item->file) }}" target="_blank"><i class="ficon bx bx-file"></i></a></td>
                                            <td>{{$item->price}}</td>
                                            <td><a  href="{{ route('c.project.delete', ['id'=>$item->id]) }}"><i class="ficon bx bx-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ Zero configuration table -->
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
<!-- END: Page Vendor JS-->
<script src="{{asset('app-assets/js/scripts/pages/app-users.js')}}"></script>

<script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>
@endsection
