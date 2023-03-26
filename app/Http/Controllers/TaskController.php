<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use resources\views\task\index;

class TaskController extends Controller
{
    public function create(){
        $task = Task::where('user_id', '=', (auth()->user()->id))->get();
        return view('task.task')->with('task', $task);
    }

    public function add(){
        return view('task.addTask');
    }

    public function edit(Request $request){
        dd($request);
        $task = Task::find($request->id);
        return view('task.editTask');
    }
    
    public function store(Request $request){

        $task = Task::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'beginDateTime' => $request->beginDateTime,
            'endDateTime' => $request->endDateTime,
            'description' => $request->description,
            'points_realization' => $request->points_realization,
        ]);

        return redirect()->route('create-task');
    }
}
