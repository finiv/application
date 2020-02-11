<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

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

    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }
}
