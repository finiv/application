<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\{StoreProjectRequest, UpdateProjectRequest};
use Illuminate\Support\Facades\Mail;
use App\Mail\NewProjectNotification;
use App\Notification;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $data = Project::orderProjects();
        $email = Notification::first();
        $result = [];      
        foreach($data as $key => $value){
            $result[] = $value;
        }

        return view('projects.index',compact('result', 'data', 'email'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        $project = Project::find($project)->first();
        
        return view('projects.show', compact('project'));
    }

    public function store(StoreProjectRequest $request)
    {
        $projectName = $request->get('project_name');
        $project = Project::create(['project_name' => $projectName]);
        $project->save();

        

        return redirect()->route('projects.index')
                         ->with('success','Project was created successfully');
    }
    
    public function edit($project)
    {
        $project = Project::find($project);
        return view('projects.edit', ['project' => $project]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->project_name = $request->get('project_name');
        $project->save();
        
        return redirect()->route('projects.index')
                         ->with('success','Project was updated successfully');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
                        ->with('success','Project was deleted successfully');
    }
}
