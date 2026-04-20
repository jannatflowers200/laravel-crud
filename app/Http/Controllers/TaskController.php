<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Validator;
class TaskController extends Controller
{


public function frontend(){
  return view('welcome');
}
   public function index(){
  //  $task= Task::latest()->get();
   $tasks= Task::latest()->get();
    // return view('TaskManager.index',['tasks'=>$task]);
    return view('TaskManager.index',compact('tasks'));
   }


public function create(){
  return view('TaskManager.create');
}

public function store(Request $request){
  
  $request->validate([
    'title'=>'required|string|max:20',
    'description'=>'nullable|string',
    'status'=>'required|in:pending,completed',
  ]);
  Task::create($request->all());
  return redirect()->route('tasks.index')->with('success','Task created successfully');
}

public function destroy(Task $task){
$task->delete();
return redirect()->route('tasks.index')->with('success','Delete Successfully');
}
   
public function edit(Task $task){
  return view('TaskManager.edit',['task'=>$task]);
}

public function update(Request $request , Task $task){
$request->validate([
    'title'=>'required|string|max:20',
    'description'=>'nullable|string',
    'status'=>'required|in:pending,completed',
  ]);
  $task->update($request->all());
  return redirect()->route('tasks.index')->with('update','Task Update Successfully');
}
 
}
