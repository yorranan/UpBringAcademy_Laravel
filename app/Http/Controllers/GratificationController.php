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

    public function add(){
        return view('gratification.addGratification');
    }

    public function store(Request $request){

        Gratification::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'realizationPoints' => $request->realizationPoints,
            'description' => $request->description
        ]);

        return redirect()->route('create-gratification');
    }


    public function edit($id){
        $gratification = Gratification::find($id);
        return view('gratification.editGratification')->with('gratification', $gratification);
    }

    public function update(Request $request, $id){

        Gratification::where('id', $id)->update([
            'name' => $request->name,
            'realizationPoints' => $request->realizationPoints,
            'description' => $request->description
        ]);

        return redirect()->route('create-gratification');
    }

    public function delete($id){
        Gratification::where('id', $id)->delete();
        
        return redirect()->route('create-gratification');
    }
}
