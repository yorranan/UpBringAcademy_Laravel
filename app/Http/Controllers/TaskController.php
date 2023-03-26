<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Task;
use App\Models\TaskChildren;
use Illuminate\Http\Request;
use resources\views\task\index;

class TaskController extends Controller
{
    public function create(){
        $task = Task::where('user_id', '=', (auth()->user()->id))->get();
        return view('task.task')->with('task', $task);
    }

    public function add(){
        $child = Child::where('parent_id', '=', auth()->user()->id)->with('user')->get();
        return view('task.addTask')->with('child', $child);
    }

    public function edit($id){
        $task = Task::find($id);
        $child = Child::where('parent_id', '=', auth()->user()->id)->with('user')
                        ->leftJoin('tasks_children', 'children.children_id', '=', 'tasks_children.users_id')
                        ->get();
        return view('task.editTask')->with('task', $task)->with('child', $child);
    }

    public function update(Request $request, $id){
        
        Task::where('id', $id)->update([
            'name' => $request->name,
            'beginDateTime' => $request->beginDateTime,
            'endDateTime' => $request->endDateTime,
            'description' => $request->description,
            'points_realization' => $request->points_realization, 
        ]);
        
        TaskChildren::where('tasks_id', '=', $id)->delete();
        
        foreach($request->children as $children){
            $task_children = TaskChildren::create([
                'users_id' => $children,
                'tasks_id' => $id,
                'status' => false
            ]);
        }
        return redirect()->route('create-task');
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

        foreach($request->children as $children){
            $task_children = TaskChildren::create([
                'users_id' => $children,
                'tasks_id' => $task->id,
                'status' => false
            ]);
        }

        return redirect()->route('create-task');
    }
}
