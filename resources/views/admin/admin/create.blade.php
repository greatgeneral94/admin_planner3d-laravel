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
                    <h5 class="content-header-title float-left pr-1 mb-0">Admin Form</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin List</a>
                            </li>
                            <li class="breadcrumb-item active">Create Admin
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
                                <h4 class="card-title">Admin Create</h4>
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{ route('admin.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Name</label>
                                        <input type="text" class="form-control" id="basic-default-name"
                                            name="name" placeholder="John Doe" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-email">Email</label>
                                        <input type="email" id="basic-default-email" name="email"
                                            class="form-control" placeholder="john.doe@email.com" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-password">Password</label>
                                        <input type="password" id="basic-default-password" name="password"
                                            class="form-control"
                                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                        <input type="password" id="confirm-password" name="confirm-password"
                                        class="form-control"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="confirm-password">Role</label>
                                        <select class="form-control" name="roles">
                                            @foreach ($roles as $item)
                                                <option value="{{$item}}">{{$item}}</option>
                                            @endforeach
                                          </select>
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
