@extends('master')
@section('css')
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Version</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                        
                            <li class="breadcrumb-item active">Version List
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Simple Validation start -->
            <section class="simple-validation">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Update Version</h4>
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{ route('b1.version.update') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Your Version</label>
                                        <input type="text" disabled class="form-control" id="basic-default-name"
                                            name="name"  value='{{\App\Models\BplannerVersion::where('user_id',auth()->user()->id)->first()->planner->version}}' />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Update Version</label>
                                        <fieldset class="form-group">
                                            <select class="custom-select" name="version">
                                                @foreach (\App\Models\Planner::where('version',"!=",\App\Models\BplannerVersion::where('user_id',auth()->user()->id)->first()->planner->version)->get() as $item)
                                                <option value="{{$item->version}}">{{$item->version}}</option>
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Input Validation end -->

        </div>
    </div>
</div>
@endsection
@section('js')
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
<!-- END: Page Vendor JS-->


<!-- BEGIN: Page JS-->
<script src="{{ asset('app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>
<!-- END: Page JS-->

@endsection
