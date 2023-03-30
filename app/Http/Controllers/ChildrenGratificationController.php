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
        return view('gratification.childGratification')->with('gratification', $gratification);
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
    public function update(Request $request, $id)
    {
        $user = Child::where('user_children_id', '=', auth()->user()->id)->first();
        $user_id = $user->parent_id;
        $gratification = Gratification::where('user_id', '=', $user_id)->first();
        $pointChild = Child::where('user_children_id', auth()->user()->id)->first();
        $error = 'Voce não possui saldo Suficiente';
        $debit = 0;

        if ($pointChild->points < $gratification->points_realization) {
            $debit = $pointChild->points - $gratification->points_realization;
            $getBonification = Child::where('user_children_id', '=', auth()->user()->id)->update([
                'points' => $pointChild
            ]);
            return view('gratification.childGratification')->with('gratification', $gratification);
        } else {
            return view('gratification.childGratification')->with('gratification', $gratification)->with('error',$error);
        }
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
