<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function create(){
        $user = auth()->user();
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->where('user_id', $user->id)
            ->select('users.name as user_name', 'tasks.name as task_name', 'tasks.description')
            ->get();
        return view('dashboard')->with('tasks', $tasks);
    }

    public function getTask(){
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->select('users.name', 'tasks.name as task_name')
            ->get();
        
        return response()->json($tasks);
    }
}
