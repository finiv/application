<?php 

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\{Task, User};

class TaskRepository
{
   public function create($request)
   {
        $realFilePath = 'app/public/files';

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
            $file->move(storage_path($realFilePath), $fileName);
        }
    }

    public function update($request, $task)
    {
        $urlPath = $task->file;

        try {
            if($request->hasFile('file')) {
                $fileName = $task->file;
                $task->update([
                    'file' => $urlPath
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
    }

    public function status($id)
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
    }
}