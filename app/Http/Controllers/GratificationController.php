<?php

namespace App\Http\Controllers;

use App\Models\Gratification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use resources\views\task\index;

class GratificationController extends Controller
{
    public function create(){
        $gratification = Gratification::where('user_id', '=', (auth()->user()->id))->get();
        return view('gratification.gratification')->with('gratification', $gratification);
    }

    public function store(Request $request){

        $gratification = Gratification::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'realizationPoints' => $request->realizationPoints,
            'description' => $request->description
        ]);

        return redirect()->route('createGratification');
    }
}
