<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\TaskRepository;

class TaskController extends Controller
{
    public $task;

    public function store(Request $request)
    {
        $create = new TaskRepository;
        $create->create($request);

        return redirect('/projects')
               ->with('success', 'Your task was successfully created');
    }

    public function create($id)
    {
        $project = Project::find($id);
        
        return view('tasks.create', ['id' => $project->id]);
    }

    public function show($task)
    {
        $task = Task::find($task);
        $task->name = explode('/', $task->file)[2];
        return view('tasks.show', ['task' => $task]);
    }

    public function edit($task)
    {
        $task = Task::find($task);
        return view('tasks.edit', ['task' => $task]);
    }
    
    public function update(Request $request, Task $task)
    {
        $update = New TaskRepository;
        $update->update($request, $task);
     
        return redirect('/projects/' . $task->project->id)->with('success', 'Task was updated successfuly');
    }

    public function changeStatus($id)
    {
        $task = Task::find($id);

        $status = new TaskRepository;
        $status->status($id);

        return redirect('/projects/' . $task->project->id)->with('success', 'Status was changed successfuly');
    }
}
