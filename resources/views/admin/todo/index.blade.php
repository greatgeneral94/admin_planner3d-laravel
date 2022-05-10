@extends('master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-todo.css') }}">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/daterange/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/editors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/dragula.min.css') }}">
    <style>
        .help-block {
    color: #FF5B5C !important;
}
    </style>
@endsection
@section('type')
todo-application
@endsection
@section('content')
<div class="app-content content">
    <div class="content-area-wrapper">
        <div class="sidebar-left">
            <div class="sidebar">
                <div class="todo-sidebar d-flex">
                    <span class="sidebar-close-icon">
                        <i class="bx bx-x"></i>
                    </span>
                    <!-- todo app menu -->
                    <div class="todo-app-menu">
                        <div class="form-group text-center add-task">
                            <!-- new task button -->
                            <button type="button" class="btn btn-primary add-task-btn btn-block my-1">
                                <i class="bx bx-plus"></i>
                                <span>New Task</span>
                            </button>
                        </div>
                        <!-- sidebar list start -->
                        <div class="sidebar-menu-list">
                            <div class="list-group">
                                <a href="{{ route('admin.todo.index') }}" class="list-group-item border-0  @if ($route=="all") active @endif">
                                    <span class="fonticon-wrap mr-50">
                                        {{-- <i class="livicon-evo" data-options="name: list.svg; size: 24px; style: lines; strokeColor:#5A8DEE; eventOn:grandparent;"></i> --}}
                                    </span>
                                    <span> All</span>
                                </a>
                            </div>
                            <label class="filter-label mt-2 mb-1 pt-25">Filters</label>
                            <div class="list-group">
                                <a href="javascript:void(0);" onclick="event.preventDefault();  document.getElementById('favourite-form').submit();" class="list-group-item border-0  @if ($route=="favorite") active @endif">
                                    <span class="fonticon-wrap mr-50">
                                    </span>
                                    <span>Favourites</span>
                                </a>
                                <form id="favourite-form" action="" method="get" class="d-none">
                                    <input type="text" hidden name="favorite" id="" value="1">
                                </form>
                                <a href="javascript:void(0);" class="list-group-item border-0 @if ($route=="complete") active @endif" onclick="event.preventDefault();  document.getElementById('compelete-form').submit();">
                                    <span class="fonticon-wrap mr-50">
                                        <i class="fa-solid fa-check"></i>
                                    </span>
                                    <span>Done</span>
                                </a>
                                <form id="compelete-form" action="" method="get" class="d-none">
                                    <input type="text" hidden name="complete" id="" value="1">
                                </form>
                            </div>
                            {{-- <label class="filter-label mt-2 mb-1 pt-25">Labels</label>
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
                                    <span>Frontend</span>
                                    <span class="bullet bullet-sm bullet-primary"></span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
                                    <span>Backend</span>
                                    <span class="bullet bullet-sm bullet-success"></span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
                                    <span>Issue</span>
                                    <span class="bullet bullet-sm bullet-danger"></span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
                                    <span>Design</span>
                                    <span class="bullet bullet-sm bullet-warning"></span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
                                    <span>Wireframe</span>
                                    <span class="bullet bullet-sm bullet-info"></span>
                                </a>
                            </div> --}}
                        </div>
                        <!-- sidebar list end -->
                    </div>
                </div>
                <!-- todo new task sidebar -->
                <div class="todo-new-task-sidebar">
                    <div class="card shadow-none p-0 m-0">
                        <div class="card-header border-bottom py-75">
                            <div class="task-header d-flex justify-content-between align-items-center w-100">
                                <h5 class="new-task-title mb-0">New Task</h5>
                                {{-- <button class="mark-complete-btn btn btn-light-primary btn-sm">
                                    <i class="bx bx-check align-middle"></i>
                                    <span class="mark-complete align-middle">Mark Complete</span>
                                </button> --}}
                                {{-- <span class="dropdown mr-50">
                                    <i class='bx bx-paperclip cursor-pointer mr-50'></i>
                                    <a href="javascript:void(0);" class="dropdown-toggle" id="todo-sidebar-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                        <i class='bx bx-dots-vertical-rounded'></i>
                                    </a>
                                    <span class="dropdown-menu dropdown-menu-right" aria-labelledby="todo-sidebar-dropdown">
                                        <a href="javascript:void(0);" class="dropdown-item">Add to another project </a>
                                        <a href="javascript:void(0);" class="dropdown-item">Create follow up task</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Print</a>
                                    </span>
                                </span> --}}
                            </div>
                            <button type="button" class="close close-icon">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <!-- form start -->
                        <form id="compose-form" class="mt-1">
                            <div class="card-body py-0 border-bottom">
                                <div class="title-group">
                                    <label for="title">Title</label>
                                    <!-- text area for task title -->
                                    <textarea name="title" class="form-control task-title" cols="1" rows="2" placeholder="Write a Task Name" required>
                                    </textarea>
                                </div>
                                <div class="assigned d-flex justify-content-between">
                                    <div class="assign_to-group d-flex align-items-center mr-1">
                                        <!-- users avatar -->
                                        <div class="avatar">
                                            <img src="#" class="avatar-user-image d-none" alt="#" width="38" height="38">
                                            <div class="avatar-content">
                                                <i class='bx bx-user font-medium-4'></i>
                                            </div>
                                        </div>
                                        <input type="text" class="todo_id" name="id" id="id" hidden>
                                        <!-- select2  for user name  -->
                                        <div class="select-box mr-1">
                                            <label for="assign_to">Admins</label>
                                            <select class="select2-users-name form-control" id="select2-users-name" name="assign_to">
                                                <optgroup label="Admin">
                                                 @foreach (\App\Models\User::where('role',"1")->get() as $admins)
                                                 <option value="{{$admins->id}}">{{$admins->name}}</option>
                                                 @endforeach
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="due_date-group d-flex align-items-center position-relative">
                                        <!-- date picker -->
                                        <div class="date-icon mr-50">
                                            <button type="button" class="btn btn-icon btn-outline-secondary round">
                                                <i class='bx bx-calendar-alt'></i>
                                            </button>
                                        </div>
                                        <div class="date-picker">
                                            <label for="due_date">Due Date</label>
                                            <input type="text" class="pickadate form-control px-0" placeholder="Due Date" name="due_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body border-bottom task-description">
                                <!--  Quill editor for task description -->
                                <label for="compose-editor">Description</label>
                                <div class="snow-container border rounded p-50">
                                    <div class="compose-editor mx-75"></div>
                                    <div class="d-flex justify-content-end">
                                        <div class="compose-quill-toolbar pb-0">
                                            <span class="ql-formats mr-0">
                                                <button class="ql-bold"></button>
                                                <button class="ql-link"></button>
                                                <button class="ql-image"></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tag d-flex justify-content-between align-items-center pt-1">
                                    <div class="flex-grow-1 d-flex align-items-center">
                                        <i class="bx bx-tag align-middle mr-25"></i>
                                        <select class="select2-assign-label form-control" id="select2-assign-label" >
                                            <optgroup label="Tags">
                                                <option value="Frontend">Frontend</option>
                                                <option value="Backend">Backend</option>
                                                <option value="Issue">Issue</option>
                                                <option value="Design">Design</option>
                                                <option value="Wireframe">Wireframe</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="ml-25">
                                        <i class="bx bx-plus-circle cursor-pointer add-tags"></i>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="card-body pb-1">
                                {{-- <div class="d-flex align-items-center mb-1">
                                    <div class="avatar mr-75">
                                        <img src="../../../app-assets/images/portrait/small/avatar-s-3.jpg" alt="charlie" width="38" height="38">
                                    </div>
                                    <div class="avatar-content">
                                        {{auth()->user()->name}} created this task
                                    </div>
                                </div> --}}
                                <!-- quill editor for comment -->
                                <label for="comment-editor">Comment</label>
                                <div class="snow-container border rounded p-50 ">
                                    <div class="comment-editor mx-75"></div>
                                    <div class="d-flex justify-content-end">
                                        <div class="comment-quill-toolbar pb-0">
                                            <span class="ql-formats mr-0">
                                                <button class="ql-bold"></button>
                                                <button class="ql-link"></button>
                                                <button class="ql-image"></button>
                                            </span>
                                        </div>
                                        {{-- <button type="button" class="btn btn-sm btn-primary comment-btn">
                                            <span>Comment</span>
                                        </button> --}}
                                    </div>
                                </div>
                                <div class="mt-1 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary add-todo" onclick="Addtask()">Add Task</button>
                                    <button type="button" class="btn btn-primary update-todo" onclick="updatetask()">Save Changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- form start end-->
                    </div>
                </div>

            </div>
        </div>
        <div class="content-right">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="app-content-overlay"></div>
                    <div class="todo-app-area">
                        <div class="todo-app-list-wrapper">
                            <div class="todo-app-list">
                                <div class="todo-fixed-search d-flex justify-content-between align-items-center">
                                    <div class="sidebar-toggle d-block d-lg-none">
                                        <i class="bx bx-menu"></i>
                                    </div>
                                    <fieldset class="form-group position-relative has-icon-left m-0 flex-grow-1">
                                        <input type="text" class="form-control todo-search" id="todo-search" placeholder="Search Task">
                                        <div class="form-control-position">
                                            <i class="bx bx-search"></i>
                                        </div>
                                    </fieldset>
                                    <div class="todo-sort dropdown mr-1">
                                        <button class="btn dropdown-toggle sorting" type="button" id="sortDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-filter"></i>
                                            <span>Sort</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdown">
                                            <a class="dropdown-item ascending" href="javascript:void(0);">Ascending</a>
                                            <a class="dropdown-item descending" href="javascript:void(0);">Descending</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="todo-task-list list-group">
                                    <!-- task list start -->
                                    <ul class="todo-task-list-wrapper list-unstyled" id="todo-task-list-drag">
                                       @foreach ($task as $task)
                                       <li class="todo-item @if ($task->complete == "1") completed @endif" data-name="{{$task->assign_to}}">
                                        <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
                                            <div class="todo-title-area d-flex">
                                                <i class='bx bx-grid-vertical handle'></i>
                                                <div class="checkbox">
                                                    <input type="checkbox" class="checkbox-input" @if ($task->complete == "1") checked @endif onclick="completed({{$task->id}})" id="checkbox{{$loop->iteration}}">
                                                    <label for="checkbox{{$loop->iteration}}"></label>
                                                </div>
                                                <p class="todo-title mx-50 m-0 truncate">{{$task->title}}</p>
                                                <p class="todo-description d-none">{{$task->description}}</p>
                                                <p class="todo-comment d-none">{{$task->comment}}</p>
                                                <p class="todo-date d-none">{{$task->due_date}}</p>
                                                <p class="todo-id d-none">{{$task->id}}</p>
                                            </div>
                                            <div class="todo-item-action d-flex align-items-center">
                                                {{-- <div class="todo-badge-wrapper d-flex">
                                                    <span class="badge badge-light-primary badge-pill">Frontend</span>
                                                </div> --}}
                                                <div class="avatar ml-1">
                                                    <img src="{{ asset($task->assign_to_user->image_path) }}" onerror="this.onerror=null;this.src='{{URL::asset('app-assets/images/profile/user-uploads/error.jpg')}}';" alt="avatar" height="30" width="30">
                                                </div>
                                                
                                                <a onclick="favorite({{$task->id}})" class='todo-item-favorite ml-75 @if ($task->favorite == "1") warning @endif'><i class="bx bx-star @if ($task->favorite == "1") bxs-star @endif"></i></a>
                                                <a onclick="trash({{$task->id}})" class='todo-item-delete ml-75'><i class="bx bx-trash"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                       @endforeach
                                    </ul>
                                    <!-- task list end -->
                                    <div class="no-results">
                                        <h5>No Items Found</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{asset('app-assets/js/scripts/pages/app-todo.js')}}"></script>

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/moment.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/daterange/daterangepicker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/editors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/dragula.min.js') }}"></script>
    <!-- END: Page Vendor JS-->
    <script>
        function Addtask(){
            var title       = document.getElementsByName('title')[0].value;
            var assign_to   = document.getElementsByName('assign_to')[0].value;
            var due_date    = document.getElementsByName('due_date')[0].value;
            var description = $(".compose-editor .ql-editor")[0].innerHTML;
            var comment     = $(".comment-editor .ql-editor")[0].innerHTML;
           // Send the data using post
            var posting = $.post( "{{ route('admin.todo.insert') }}",
            {
                "_token": "{{ csrf_token() }}",
                title: title,   
                assign_to: assign_to,   
                due_date: due_date,   
                description: description,   
                comment: comment,   
            } 
            );
    
            // Put the results in a div
            posting.done(function( data ) {
            
                if (!data.success) {
                    if (data.errors.title) {
                    $(".title-group").addClass("has-error");
                    $(".title-group").append(
                        '<div class="help-block">' + data.errors.title + "</div>"
                    );
                    }

                    if (data.errors.assign_to) {
                    $(".assign_to-group").addClass("has-error");
                    $(".assign_to-group").append(
                        '<div class="help-block">' + data.errors.assign_to + "</div>"
                    );
                    }

                    if (data.errors.due_date) {
                    $(".due_date-group").addClass("has-error");
                    $(".due_date-group").append(
                        '<div class="help-block">' + data.errors.due_date + "</div>"
                    );
                    }
                } else {
                    $(".todo-new-task-sidebar").removeClass('show');
                    appContentOverlay.removeClass('show');
                selectAssignLable.attr("disabled", "true");
                    $(".help-block").hide();
                    toastr.info(data.message);
                }
            });
        }
        function updatetask(){
            var title       = document.getElementsByName('title')[0].value;
            var id          = document.getElementsByName('id')[0].value;
            var assign_to   = document.getElementsByName('assign_to')[0].value;
            var due_date    = document.getElementsByName('due_date')[0].value;
            var description = $(".compose-editor .ql-editor")[0].innerHTML;
            var comment     = $(".comment-editor .ql-editor")[0].innerHTML;
           // Send the data using post
            var posting = $.post( "{{ route('admin.todo.update') }}",
            {
                "_token": "{{ csrf_token() }}",
                id: id,   
                title: title,   
                assign_to: assign_to,   
                due_date: due_date,   
                description: description,   
                comment: comment,   
            } 
            );
    
            // Put the results in a div
            posting.done(function( data ) {
            
                if (!data.success) {
                    if (data.errors.title) {
                    $(".title-group").addClass("has-error");
                    $(".title-group").append(
                        '<div class="help-block">' + data.errors.title + "</div>"
                    );
                    }

                    if (data.errors.assign_to) {
                    $(".assign_to-group").addClass("has-error");
                    $(".assign_to-group").append(
                        '<div class="help-block">' + data.errors.assign_to + "</div>"
                    );
                    }

                    if (data.errors.due_date) {
                    $(".due_date-group").addClass("has-error");
                    $(".due_date-group").append(
                        '<div class="help-block">' + data.errors.due_date + "</div>"
                    );
                    }
                } else {
                    $(".todo-new-task-sidebar").removeClass('show');
                    appContentOverlay.removeClass('show');
                selectAssignLable.attr("disabled", "true");
                    $(".help-block").hide();
                    toastr.info(data.message);
                    $('#todo-task-list-drag').load(location.href + ' #todo-task-list-drag');
                }
            });
        }
 
        function favorite(id){
            var posting =   $.get("favorite/"+id, {},);
            posting.done(function( data ) {
                toastr.info("Task Status Updated");
        });
        }
        function trash(id){
            var posting =   $.get("trash/"+id, {},);
            posting.done(function( data ) {
                toastr.info("Task Deleted");
        });
        }
        function completed(id){
            var posting =   $.get("completed/"+id, {},);
            posting.done(function( data ) {
                toastr.info("Task Status Updated");
        });
        }

    </script>
@endsection