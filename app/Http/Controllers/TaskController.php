<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use resources\views\task\index;

class TaskController extends Controller
{
    public function createView(){
        return view('task.create');
    }

    public function show(){
        $task = Task::get();
        dd($task);
    }

    public function createTask(Request $request){

        $name = $request->name;
        $beginDateTime = $request->beginDateTime;
        $endDateTime = $request->endDateTime;
        $description = $request->description;
        $points_realization = $request->points_realization;


        $task = Task::create([
            'name' => $name,
            'beginDateTime' => $beginDateTime,
            'endDateTime' => $endDateTime,
            'description' => $description,
            'points_realization' => $points_realization,
        ]);
    }
}
