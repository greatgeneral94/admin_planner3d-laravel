@extends('master')
@section('css')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <!-- END: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-users.css') }}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="col-12 col-sm-6 col-lg-3 my-3 d-flex align-items-center">
                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-block glow users-list-clear mb-0">Create Access Role</a>
                </div>
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-body">
                            <!-- datatable start -->
                            <div class="table-responsive">
                                <table id="users-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @can('edit')
                                                    <a  href="{{ route('roles.edit',$item->id) }}"><i class="bx bx-edit-alt"></i></a>
                                                @endcan
                                                @can('delete')
                                                    <a  href="{{ route('roles.delete',$item->id) }}"><i class="bx bx-trash-alt"></i></a>
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- datatable ends -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- users list ends -->

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
@endsection