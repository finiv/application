<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use Illuminate\Support\Facades\Storage;
use App\Http\Repositories\TaskRepository;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $item = new TaskRepository;
        $item->create($request);

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
        $item = New TaskRepository;
        $item->update($request, $task);
     
        return redirect('/projects/' . $task->project->id)->with('success', 'Task was updated successfuly');
    }

    public function changeStatus($id)
    {
        $task = Task::find($id);

        $item = new TaskRepository;
        $item->status($id);

        return redirect('/projects/' . $task->project->id)->with('success', 'Status was changed successfuly');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/projects/' . $task->project->id)->with('success', 'Tas was deleted successfuly');
    }
}
