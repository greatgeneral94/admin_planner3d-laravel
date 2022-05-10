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
        </div>
        <div class="content-body">
            <!-- users edit start -->
            <section class="users-edit">
                
                <div class="card">
                    <div class="card-body">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                        </div>
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
                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table mt-1">
                                            <thead>
                                                <tr>
                                                    <th>Module Permission</th>
                                                    <th>Read</th>
                                                    <th>Write</th>
                                                    <th>Create</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}</td>
                                                    @foreach($permission as $value)
                                                    <td  >
                                                    {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'checkbox-input'),array('id' => 'users-checkbox'.$loop->iteration.'')) }}
                                                    <label for="">{{ $value->name }}</label>
                                                  </td>
                                                @endforeach
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                                        changes</button>
                                    <button type="reset" class="btn btn-light">Cancel</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
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