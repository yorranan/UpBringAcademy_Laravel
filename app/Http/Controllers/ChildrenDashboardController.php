<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Task;
use App\Models\TaskChildren;
use App\Models\User;
use Illuminate\Http\Request;

class ChildrenDashboardController extends Controller
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
        $count = 0;
        $open = 0;
        $points = 0;

        $points = Child::where('user_children_id', auth()->user()->id)->first();

        $lists = TaskChildren::where('user_children_id', '=', auth()->user()->id)
            ->leftJoin('tasks', 'tasks_children.tasks_id', '=', 'tasks.id' )
            ->get();


        $tasks = TaskChildren::where('user_children_id', '=', auth()->user()->id)
            ->leftJoin('tasks', 'tasks_children.tasks_id', '=', 'tasks.id' )
            ->get()
            ->reject(function ($task) {
                return $task->status == 1;
            });

        foreach ($lists as $list) {
            $count = TaskChildren::where('user_children_id', '=', auth()->user()->id)
                ->leftJoin('tasks', 'tasks_children.tasks_id', '=', 'tasks.id' )
                ->where('status', 1)
                ->count();
        }
        foreach ($tasks as $task) {
            $open = TaskChildren::where('user_children_id', '=', auth()->user()->id)
                ->leftJoin('tasks', 'tasks_children.tasks_id', '=', 'tasks.id' )
                ->where('status', 0)
                ->count();
        }

        return view('childDashboard')->with('count', $count)->with('open', $open)->with('points', $points)->with('tasks', $tasks);
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
        $info = 0;
        $info = Task::find($id);
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
        //
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
