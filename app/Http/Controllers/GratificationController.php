<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Gratification;
use App\Models\GratificationChildren;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use resources\views\task\index;

class GratificationController extends Controller
{
    public function create(){
        if(auth()->user()->admin){
            $gratification = Gratification::where('user_id', '=', (auth()->user()->id))->get();
            return view('gratification.gratification')->with('gratification', $gratification);
        }else{
            $gratification = Gratification::join('children', 'gratifications.user_id', '=', 'children.parent_id')
                ->where('children.user_children_id', '=', (auth()->user()->id))->get();
            $child = Child::where('user_children_id', (auth()->user()->id))->first();
            return view('gratification.gratification')->with('gratification', $gratification)->with('child', $child);
        }
       
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

    public function rasom($id){
        $gratification = Gratification::where('id', $id)->first();
        $children = Child::where('user_children_id', auth()->user()->id)->first();

        $children->points -= $gratification->realizationPoints;
        $children->save();

        GratificationChildren::create([
            'gratifications_id' => $id,
            'user_children_id' => auth()->user()->id,
            'status' => true
        ]);

        return redirect()->route('create-gratification');
    }
}
