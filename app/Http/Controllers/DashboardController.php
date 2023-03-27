<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function create(){

        $childs = Child::where('parent_id', '=', auth()->user()->id)->with('user')->get();
        foreach ($childs as $child){
            $child->Task = Task::where('finished', true)->sum('finished');
        }
        return view('dashboard', compact('childs'));

    }

    public function getTask(){
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->select('users.name', 'tasks.name as task_name')
            ->get();

        return response()->json($tasks);
    }
}
