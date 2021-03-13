<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('project')->orderBy('project_id','asc')->paginate(50);

        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource with Project Id.
     *
     * @return \Illuminate\Http\Response
     */
    public function _create($project_id)
    {
        $project = Project::findOrFail($project_id);
        return view('task._create',compact('project'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::pluck('name','id');
        return view('task.create',compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request, Task $task)
    {
        $task->project_id = $request->project_id;
        $task->task_name = $request->task_name;
        $task->task_details = $request->task_details;
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load('project');
        return view('task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $projects = Project::pluck('name','id');
        return view('task.edit',compact('task','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->project_id = $request->project_id;
        $task->task_name = $request->task_name;
        $task->task_details = $request->task_details;
        $task->save();
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        if($task->delete()){
            return redirect()->route('task.index');
        }
    }

    public function sort(Request $request){
        if($request->ajax()){
            if($request->has('sortId') && $request->has('project_id')){
                foreach($request->sortId as $priority => $id){
                    $task = Task::where('project_id',$request->project_id)->find($id);
                    $task->priority_id = $priority+1;
                    $task->save();
                }
                return ['success'=>true,'message'=>'Updated'];
            }

        }
    }
}
