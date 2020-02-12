<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function download(Task $task)
    {
        $fileName = explode('/', $task->file);
        
        $filePath = 'storage/files/' . $fileName[2];
        
        return response()->download($filePath)->redirect('/projects/' . $task->project->id);
    }
}
