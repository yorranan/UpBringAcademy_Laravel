<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadTaskController extends Controller
{
    public function create(Request $request){
        return view()->with('task', $request);
    }
}
