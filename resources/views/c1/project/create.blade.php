@extends('master')
@section('css')
<link rel="stylesheet" type="text/css"
    href="{{ asset('app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="breadcrumbs-top">
                    <h5 class="content-header-title float-left pr-1 mb-0">Project Form</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('c.project.index') }}">Project List</a>
                            </li>
                            <li class="breadcrumb-item active">Create Project
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
                                <h4 class="card-title">Project Create</h4>
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{ route('c.project.store') }}" enctype="multipart/form-data">
                                    @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Picture</label>
                                        <input type="file" class="form-control" 
                                            name="image" accept="image/*" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Project Title</label>
                                        <input type="text" class="form-control" 
                                            name="project_title" placeholder="Enter Project Title" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">File</label>
                                        <input type="file" class="form-control" 
                                        name="file"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Price</label>
                                        <input type="text" class="form-control" 
                                            name="price" placeholder="Enter price" onkeypress="return event.charCode >= 48 && event.charCode <= 57" onpaste="return false" />
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" name="submit"
                                                value="Submit">Submit</button>
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
