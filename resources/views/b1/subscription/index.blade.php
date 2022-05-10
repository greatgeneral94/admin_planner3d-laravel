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
                    <h5 class="content-header-title float-left pr-1 mb-0">Subsctions</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active">Subsctions List
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
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Days</th>
                                                <th>Subcription Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->days}}</td>
                                                    <td>{{date("d-m-Y", strtotime($item->created_at))}}</td>
                                                    <td>{{date("d-m-Y", strtotime($item->end_date))}}</td>
                                                    <td>
                                                        @if (date("d-m-Y", strtotime($item->end_date)) < date("d-m-Y", strtotime(now())))
                                                        <span class="badge bg-label-primary">Expire</span>
                                                        @else
                                                        <span class="badge bg-label-primary">Active</span>
                                                        @endif
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
            </section>
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
