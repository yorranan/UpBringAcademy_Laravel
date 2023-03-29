<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Task;
use App\Models\TaskChildren;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;
use resources\views\task\index;

class TaskController extends Controller
{
    public function create(){
        if(auth()->user()->admin){
            $task = Task::where('user_id', '=', (auth()->user()->id))->get();
        }else{
            $task = TaskChildren::join('tasks', 'tasks.id', '=', 'tasks_children.tasks_id')
                    ->where('tasks_children.user_children_id', (auth()->user()->id))->get();
        }
        return view('task.task')->with('task', $task);
    }

    public function add(){
        $child = Child::where('parent_id', '=', auth()->user()->id)->with('user')->get();
        return view('task.addTask')->with('child', $child);
    }

    public function edit($id){
        $task = Task::find($id);
        $child = Child::where('parent_id', '=', auth()->user()->id)->with('user')
                        ->leftJoin('tasks_children', 'children.user_children_id', '=', 'tasks_children.user_children_id')
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
                'user_children_id' => $children,
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
                'user_children_id' => $children,
                'tasks_id' => $task->id,
                'status' => false
            ]);
        }

        return redirect()->route('create-task');
    }

    public function delete($id){
        TaskChildren::where('tasks_id', $id)->delete();
        Task::where('id', $id)->delete();
        return redirect()->route('create-task');
    }

    public function conclued(){
        
    }
}
