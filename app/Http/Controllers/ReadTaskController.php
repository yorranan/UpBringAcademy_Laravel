<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadTaskController extends Controller
{
    public function create(Request $request){
        $task = Task::find($request->id);
        return view('task.readTask')->with('task', $task);
    }
}
