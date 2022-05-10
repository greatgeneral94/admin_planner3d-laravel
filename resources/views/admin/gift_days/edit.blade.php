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
                    <h5 class="content-header-title float-left pr-1 mb-0">Gift Days Form</h5>
                    <div class="breadcrumb-wrapper d-none d-sm-block">
                        <ol class="breadcrumb p-0 mb-0 pl-1">
                            <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.gift_days.index') }}">Gift Days List</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Gift Days
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
                                <h4 class="card-title">Gift Days Edit</h4>
                            </div>
                            <div class="card-body">
                                <form id="jquery-val-form" method="post" action="{{ route('admin.gift_days.update', ['id'=>$data->id]) }}" >
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
                                        <label class="form-label" for="basic-default-name">Name</label>
                                        <input type="text" class="form-control" 
                                            name="name" placeholder="Enter Name"  value="{{$data->name}}"/>
                                    </div>
                          
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Code</label>
                                        <div class="input-group">
                                            <input type="text" name="code" id="auto_generate" class="form-control" placeholder="Enter Code" aria-describedby="auto_generate" value="{{$data->code}}">
                                            <div class="input-group-append">
                                                <button onclick="Generate()" type="button" class="input-group-text btn btn-primary" id="auto_generate">Auto Generate</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Email</label>
                                        <input type="email" class="form-control" 
                                            name="email" placeholder="Enter Email" value="{{$data->email}}" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Price</label>
                                        <input type="text" class="form-control" 
                                            name="price" placeholder="Enter Price" value="{{$data->price}}" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"/>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">No of days</label>
                                        <input type="text" class="form-control" 
                                            name="days" placeholder="Enter No of days"  value="{{$data->days}}" />
                                    </div>

                                   
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Commission</label>
                                        <div class="input-group">
                                        <select class="form-control w-25" name="commession_type" id="button-addon1">
                                            <option value="%" {{ $data->commession_type == '%' ? 'selected' : '' }}>Percentage</option>
                                            <option value="fixed" {{ $data->commession_type == 'fixed' ? 'selected' : '' }}>Fixed Price</option>
                                        </select>
                                            <input type="text" class="form-control w-75" name="commession"  placeholder="Enter Commession" aria-label="Example text with button addon" aria-describedby="button-addon1" value="{{$data->commession}}" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="basic-default-name">Description</label>
                                           <textarea id="my-textarea" class="form-control" name="description" placeholder="Enter Description" rows="3">{{$data->description}}</textarea>
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
<script>
    function Generate(){
        var auto_generate=document.getElementById("auto_generate");
        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 var auto_generateLength = 12;
 var auto_generate = "";
 for (var i = 0; i <= auto_generateLength; i++) {
   var randomNumber = Math.floor(Math.random() * chars.length);
   auto_generate += chars.substring(randomNumber, randomNumber +1);
  }
  document.getElementById("auto_generate").value = auto_generate;

}
</script>
@endsection
