<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Task;
use App\Models\TaskChildren;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function create(){
        $count = 0;
        $open = 0;

        if(auth()->user()->admin){
            $task = Task::where('user_id', '=', (auth()->user()->id))->get();
        } else {
            $task = TaskChildren::where('user_children_id', '=', (auth()->user()->id))->get();
            foreach ($task as $task){
                if ($task->status) {
                    $count++;
                }else{
                    $open++;
                }
            }
        }
        return view('dashboard')->with('count', $count)->with('open', $open)->with('task', $task) ;
    }


    public function getTask(){
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->select('users.name', 'tasks.name as task_name')
            ->get();

        return response()->json($tasks);
    }
}
