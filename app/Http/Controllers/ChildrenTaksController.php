<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\GratificationChildren;
use App\Models\Task;
use App\Models\TaskChildren;
use App\Models\User;
use Illuminate\Http\Request;

class ChildrenTaksController extends Controller
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
        $tasks = TaskChildren::where('user_children_id', '=', auth()->user()->id)
            ->leftJoin('tasks', 'tasks_children.tasks_id', '=', 'tasks.id' )
            ->get()
            ->reject(function ($task) {
            return $task->status == 1;
            });
        return view('task.childTask')->with('tasks', $tasks);
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

        $user = User::where('id', auth()->user()->id)->first();
        $task = Task::find($id);
        $pointChild = Child::where('user_children_id', auth()->user()->id)->first();
        $updatepoints = $pointChild->points  + $task->points_realization;

        $finhesdTask = TaskChildren::where('tasks_id', '=', $id)->update([
        'tasks_id' => $id,
        'user_children_id' => $user->id,
        'status' => true
        ]);

        $task_children = Child::where('user_children_id', '=', auth()->user()->id)->update([
            'points' => $updatepoints
        ]);

        return redirect()->route('task-child');

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
