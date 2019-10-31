<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTasksController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {

        if(auth()->user()->isNot($project->owner)){
            abort(403);
        }

        $request->validate([
            'body' => 'required'
        ]);

        $attributes = [
            'body' => $request->body,
            'project_id' => $project->id
        ];

        $project->addTask($attributes);

        return redirect('/projects/' . $project->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, Task $task)
    {
        if(auth()->user()->isNot($task->project->owner)){
            abort(403);
        }

        $attributes = [
            'body' => request()->body,
            'project_id' => $project->id
        ];

        $project->updateTask($attributes);

        return redirect('/projects/' . $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect('/projects/' . $project->id);
    }
}
