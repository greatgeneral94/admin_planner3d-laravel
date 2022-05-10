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
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- users list start -->
            <section class="users-list-wrapper">
                <div class="users-list-filter px-1">
                    <form>
                        <div class="row border rounded py-2 mb-2">
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-verified">Verified</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-verified">
                                        <option value="">Any</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-role">Role</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-role">
                                        <option value="">Any</option>
                                        <option value="Admin">Admin</option>
                                        <option value="B1">B1</option>
                                        <option value="C1">C1</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3">
                                <label for="users-list-status">Status</label>
                                <fieldset class="form-group">
                                    <select class="form-control" id="users-list-status">
                                        <option value="">Any</option>
                                        <option value="Active">Active</option>
                                        <option value="Close">In Active</option>
                                        {{-- <option value="Banned">Banned</option> --}}
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center">
                                <button type="reset" class="btn btn-primary btn-block glow users-list-clear mb-0">Clear</button>
                            </div>
                        </div>
                    </form>
                </div>
                @can('create')
                <div class="col-12 col-sm-6 col-lg-3 my-3 d-flex align-items-center">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary btn-block glow users-list-clear mb-0">Create Admin</a>
                </div>
                @endcan
                <div class="users-list-table">
                    <div class="card">
                        <div class="card-body">
                            <!-- datatable start -->
                            <div class="table-responsive">
                                <table id="users-list-datatable" class="table">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>username</th>
                                            <th>Name</th>
                                            <th>Last Active</th>
                                            <th>Verified</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                            @can('edit')
                                            <th>Edit</th>
                                            @endcan
                                            @can('delete')
                                            <th>Delete</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td><a href="{{ route('impersonate', ['id'=>$item->id]) }}">{{$item->email}}</a></td>
                                            <td>{{$item->name}}</td>
                                            <td>
                                                @if ($item->last_active_at!="")
                                                {{date("d-m-Y", strtotime($item->last_active_at))}}
                                                @else
                                                -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->email_verified_at!="")
                                                Yes
                                                @else
                                                No
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->role=="1")
                                                Admin
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->status=="0")
                                                <span class="badge badge-light-danger">In Active</span>
                                                @elseif($item->status=="1")
                                                <span class="badge badge-light-success">Active</span>
                                                @endif
                                            </td>
                                            @can('edit')
                                            <td><a href="{{ route('admin.edit', ['id'=>$item->id]) }}"><i class="bx bx-edit-alt"></i></a></td>
                                            @endcan
                                            @can('delete')
                                            <td><a href="{{ route('admin.delete', ['id'=>$item->id]) }}"><i class="bx bx-trash-alt"></i></a></td>
                                            @endcan
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
<script>
    function changeUserStatus(_this, id) {
        alert(id);
        var status = $(_this).prop('checked') == true ? 1 : 0;
        let _token = $('meta[name="csrf-token"]').attr('content');
    
      
    }
    
    </script>
@endsection