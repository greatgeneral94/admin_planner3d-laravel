<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TodoTask;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index(Request $request){
        $task =TodoTask::query();
        $route = "all";
        if ($request->favorite != null) {
            $route = "favorite";
            $task->where('favorite',$request->favorite);
        }
        if ($request->complete != null) {
            $route = "complete";
            $task->where('complete',$request->complete);
        }
      $task =  $task->with('assign_to_user')->with('assign_by_user')->get();
        return view('admin.todo.index',get_defined_vars());
    }
    public function insert(Request $request){
        $errors = [];
        $data = [];
        
        if (!$request->title) {
            $errors['title'] = 'Field Required.';
        }
        
        if (!$request->assign_to) {
            $errors['assign_to'] = 'Field Required.';
        }
        
        if (!$request->due_date) {
            $errors['due_date'] = 'Field Required.';
        }
        if (!$request->description) {
            $errors['description'] = 'Field Required.';
        }
        
        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $task = new TodoTask();
            $task->title  = $request->title;
            $task->assign_to  = $request->assign_to;
            $task->assign_by  = auth()->user()->id;
            $task->due_date  = $request->due_date;
            $task->description  = $request->description;
            $task->comment  = $request->comment;
            $task->save();
            $data['success'] = true;
            $data['message'] = 'The Task Assign Successfully!';
        }
      
        return $data;
    }

    public function update(Request $request){
        $errors = [];
        $data = [];
        
        if (!$request->title) {
            $errors['title'] = 'Field Required.';
        }
        
        if (!$request->assign_to) {
            $errors['assign_to'] = 'Field Required.';
        }
        
        if (!$request->due_date) {
            $errors['due_date'] = 'Field Required.';
        }
        if (!$request->description) {
            $errors['description'] = 'Field Required.';
        }
        
        if (!empty($errors)) {
            $data['success'] = false;
            $data['errors'] = $errors;
        } else {
            $task =  TodoTask::where('id',$request->id)->first();
            $task->title  = $request->title;
            $task->assign_to  = $request->assign_to;
            $task->assign_by  = auth()->user()->id;
            $task->due_date  = $request->due_date;
            $task->description  = $request->description;
            $task->comment  = $request->comment;
            $task->save();
            $data['success'] = true;
            $data['message'] = 'The Task Assign Updated Successfully!';
        }
      
        return $data;
    }

    public function favorite($id){
       
        $task =  TodoTask::where('id',$id)->first();
        if ($task->favorite == "0") {
            $task->favorite  = "1";
        }else{
            $task->favorite  = "0";
        }
        $task->save();
        return $task;
    }
    public function completed($id){
        $task =  TodoTask::where('id',$id)->first();
        if ($task->complete == "0") {
            $task->complete  = "1";
        }else{
            $task->complete  = "0";
        }
        $task->save();
        return $task;
    }
    public function trash($id){
        TodoTask::where('id',$id)->delete();
        return "Deleted";
    }
}
