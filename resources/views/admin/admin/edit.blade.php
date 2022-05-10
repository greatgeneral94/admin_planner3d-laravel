@extends('master')
@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-users.css') }}">
@endsection
@section('type')
chat-application
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
                            <li class="breadcrumb-item active">Update Admin
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                <div class="card">
                    <div class="card-body">
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
                        <div class="media mb-2 align-items-center">
                            <a class="mr-2" href="javascript:void(0);">
                                <img src="{{ asset('app-assets/images/portrait/small/avatar-s-26.jpg') }}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Avatar</h4>
                               
                            </div>
                        </div>
                        <!-- users edit media object ends -->
                        <!-- users edit account form start -->
                        <form class="form-validate" action="{{ route('admin.update', ['id'=>$user->id]) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control"  placeholder="Email" value="{{$user->email}}" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="Name" value="{{$user->name}}" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Assign Role </label>
                                        <select class="form-control" name="roles">
                                          @foreach ($roles as $item)
                                              <option value="{{$item}}"  @if($item  == $userRole) selected @endif>{{$item}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label>Status </label>
                                        <select class="form-control" name="status">
                                            <option value="0" @if($user->status == "0" ) selected @endif>In Active</option>
                                            <option value="1" @if($user->status == "1" ) selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label>Show In Client Chat </label>
                                        <select class="form-control" name="show_in_chat">
                                            <option value="0" @if($user->show_in_chat == "0" ) selected @endif>No</option>
                                            <option value="1" @if($user->show_in_chat == "1" ) selected @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                     <div class="form-group">
                                        <label>Show In Internal Chat</label>
                                        <select class="form-control" name="chat_show_internal">
                                            <option value="0" @if($user->chat_show_internal == "0" ) selected @endif>No</option>
                                            <option value="1" @if($user->chat_show_internal == "1" ) selected @endif>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                        changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!-- users edit ends -->

        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('app-assets/js/scripts/pages/app-users.js')}}"></script>
@endsection