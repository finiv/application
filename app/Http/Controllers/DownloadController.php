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
        
        $filePath = 'storage/files/' . end($fileName);

        return response()->download($filePath);
    }
}
