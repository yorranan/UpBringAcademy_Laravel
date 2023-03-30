<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Gratification;
use App\Models\GratificationChildren;
use App\Models\Task;
use App\Models\TaskChildren;
use App\Models\User;
use Illuminate\Http\Request;

class ChildrenGratificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Child::where('user_children_id', '=', auth()->user()->id)->first();
        $user_id = $user->parent_id;
        $gratification = Gratification::where('user_id', '=', $user_id)->get();
        return view('gratification.childGratification')->with('gratification', $gratification)->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function rasom(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
