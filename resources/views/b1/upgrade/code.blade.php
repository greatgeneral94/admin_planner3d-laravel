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
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-pricing.css') }}">
<style>
    .input-wrapper.my-3.input-group.input-group-merge.zindex-1 {
    padding: 0px 400px;
}
</style>
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">


            <div class="card overflow-hidden">
                <!-- Help Center Header -->
                <div class="help-center-header d-flex flex-column justify-content-center align-items-center mt-5">
                    <h3 class="text-center zindex-1">Please Check Your Email for subscription Code</h3>
                    <form action="{{ route('subscription.code.submit') }}" method="post">
                        @csrf
                    <div class="input-wrapper my-3 input-group input-group-merge zindex-1">
                        <input type="text" class="form-control form-control-lg" name="code"
                        placeholder="Enter Code" aria-label="Search"
                        aria-describedby="basic-addon1">
                        <button class="btn btn-primary rounded-0" type="submit">Submit</button>
                    </div>
                </form>
                </div>
                <!-- /Help Center Header -->

            </div>


        </div>
    </div>
</div>
</div>
@endsection
@section('js')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/js/pages-pricing.js') }}">
@endsection
