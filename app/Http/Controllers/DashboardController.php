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
        $tasks = Task::where('user_id', '=', (auth()->user()->id))->get();
        foreach ($tasks as $task) {
            $count = Child::where('parent_id', '=', auth()->user()->id)->with('user')
                ->leftJoin('tasks_children', 'children.user_children_id', '=', 'tasks_children.user_children_id')
                ->where('status', 1)
                ->count();
        }
        foreach ($tasks as $task) {
            $open = Child::where('parent_id', '=', auth()->user()->id)->with('user')
                ->leftJoin('tasks_children', 'children.user_children_id', '=', 'tasks_children.user_children_id')
                ->where('status', 0)
                ->count();
        }
        return view('dashboard')->with('count', $count)->with('open', $open)->with('task', $tasks) ;
    }


    public function getTask(){
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->select('users.name', 'tasks.name as task_name')
            ->get();

        return response()->json($tasks);
    }
}
