<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Auth;

class TaskController extends Controller
{
    public function add_task(Request $request){
        $request->validate([
            'task_name'       => 'required',
            'due_date'      => 'required|date'
        ]);
        
        $task = new Task([
            'task_name' => $request->get('task_name'),
            'due_date'=> $request->get('due_date'),
            'user_id'=> Auth::user()->id
          ]);
        $task->save();

        return redirect()->back()->with('success', 'Task has been added');
    }
    public function delete_task($id){
        
        if($task = Task::find($id)) {
            $task->delete();
            return redirect()->back()->with('success', 'Task has been deleted');
        }
        return redirect()->back()->with('error', ['Task has not been found']);
    }
    public function view_task($id){
        if($task = Task::find($id)) {
            return view('view_task', compact('task'));
        }
        return redirect()->back()->with('error', ['Task has not been found']);        
    }
    public function update_task(Request $request, $id){
        if($task = Task::find($id)) {
            $task->update($request->all());
            return redirect('home')->with('success', 'Task has been updated');
        }
        return redirect()->back()->with('error', ['Task has not been found']);
    }
}
