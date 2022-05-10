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
                    <h5 class="content-header-title float-left pr-1 mb-0">3D Planner Form</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.planner.index') }}">3D Planner List</a>
                            </li>
                            <li class="breadcrumb-item active">Create 3D Planner
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
                                <h4 class="card-title">3D Planner Create</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label" for="basic-default-name">3D Planner File</label>
                                    <div id="upload-container">
                                        <input type="file" class="form-control" id="browseFile" value="Brows File">
                                    </div>
                                    <div class="progress mt-1" style="height: 25px">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%; height: 100%">75%</div>
                                    </div>
                                </div>
                                <form id="jquery-val-form" method="post" action="{{ route('admin.planner.store') }}" enctype="multipart/form-data">
                                    @csrf
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
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Title</label>
                                        <input type="text" class="form-control" 
                                            name="title" placeholder="Enter Title" value="{{old('title')}}" />
                                    </div>
                          
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Version</label>
                                        <input type="text" class="form-control" value="{{old('version')}}"
                                            name="version" placeholder="Enter Version"/>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
<script src="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js"></script>

<script type="text/javascript">
    let browseFile = $('#browseFile');
    let resumable = new Resumable({
        target: '{{ route('files.upload.large') }}',
        query:{_token:'{{ csrf_token() }}'} ,// CSRF token
        fileType: ['zip'],
        headers: {
            'Accept' : 'application/json'
        },
        testChunks: false,
        throttleProgressCallbacks: 1,
    });

    resumable.assignBrowse(browseFile[0]);

    resumable.on('fileAdded', function (file) { // trigger when file picked
        showProgress();
        resumable.upload() // to actually start uploading.
    });

    resumable.on('fileProgress', function (file) { // trigger when file progress update
        updateProgress(Math.floor(file.progress() * 100));
    });

    resumable.on('fileSuccess', function (file, response) { // trigger when file upload complete
        response = JSON.parse(response)
        $('#videoPreview').attr('src', response.path);
        $('.card-footer').show();
    });

    resumable.on('fileError', function (file, response) { // trigger when there is any error
        alert('file uploading error.')
    });


    let progress = $('.progress');
    function showProgress() {
        progress.find('.progress-bar').css('width', '0%');
        progress.find('.progress-bar').html('0%');
        progress.find('.progress-bar').removeClass('bg-success');
        progress.show();
    }

    function updateProgress(value) {
        progress.find('.progress-bar').css('width', `${value}%`)
        progress.find('.progress-bar').html(`${value}%`)
    }

    function hideProgress() {
        progress.hide();
    }
</script>
@endsection
