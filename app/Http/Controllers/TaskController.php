<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use App\Http\Repositories\TaskRepository;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    private $realFilePath = 'app/public/files';

    public function store(Request $request)
    {
        $project_id = $request->get('project_id');
        $title = $request->get('title');
        $description = $request->get('description');
        $status = \App\Enum\StatusEnum::NEW_TASK;
        $urlPath = null;

        if(isset($request->file)){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $urlPath = 'storage/files' . DIRECTORY_SEPARATOR . $fileName;
        }
        

        $task = new Task([
            'project_id' => $project_id,
            'title' => $title,
            'description' => $description,
            'status' => $status,
            'file' => $urlPath
        ]);
        $task->save();
        
        if($file != null){
            $file->move(storage_path($this->realFilePath), $fileName);
        }
        

        return redirect('/projects')->with('success', 'Your task was successfully created');
    }

    public function create($id)
    {
        $project = Project::find($id);
        
        return view('tasks.create', ['id' => $project->id]);
    }

    public function show($task)
    {
        $task = Task::find($task);

        return view('tasks.show', ['task' => $task]);
    }

    public function edit($task)
    {
        $task = Task::find($task);
        return view('tasks.edit', ['task' => $task]);
    }
    
    public function update(Request $request, Task $task)
    {
        $item = Task::find($task);
        try {
            if($request->hasFile('file')) {
                $path = Storage::disk('public')->put($this->realFilePath, $request->file('file'));
                $task->update([
                    'file' => $path
                ]);
            }
        } catch (\Exception $e) {
            return [
                'warning' => 'Task edited, but file does not uploaded on server. Please try again.'
            ];
        }
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;

        $task->save();

        return redirect('/projects/' . $task->project->id)->with('success', 'Task was updated successfuly');
    }

    public function changeStatus(Request $request, $id)
    {
        $task = Task::find($id);
        
        switch ($task->status){
            case 1:
                $task->status = 2;
                break;
            case 2:
                $task->status = 3;
                break;
        }
        $task->update();

        return redirect('/projects/' . $task->project->id)->with('success', 'Status was changed successfuly');
    }
}
