<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class EditTaskController extends Controller
{
    public function create(Request $request){
        $task = Task::find($request->id);
        return view('task.editTask')->with('task', $task);
    }

    public function store(Request $request){
        $task = Task::find($request->id);

        $task->name = $request->name;
        $task->beginDateTime = $request->beginDateTime;
        $task->endDateTime = $request->endDateTime;
        $task->description = $request->description;
        $task->points_realization = $request->points_realization;

        $task->save();
        
        return redirect()->route('readTaskCreate', ['id' => $request->id]);
    }

    public function delete(Request $request){
        $task = Task::find($request->id);
        $task->delete();
        return redirect()->route('dashboard');
    }
}
