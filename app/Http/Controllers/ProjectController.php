<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Http\Requests\{StoreProjectRequest, UpdateProjectRequest};

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $data = Project::orderProjects();
        $result = [];      
        foreach($data as $key => $value){
            $result[] = $value;
        }

        return view('projects.index',compact('result', 'data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function show(Project $project)
    {
        $project = Project::find($project)->first();
        
        // $tasks = Project::getAllTasks($project->id);

        return view('projects.show', compact('project'));
    }

    public function store(StoreProjectRequest $request)
    {
        $projectName = $request->get('project_name');
        $project = Project::create(['project_name' => $projectName]);
        $project->save();

        return redirect()->route('projects.index')
                         ->with('success','User created successfully');
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {

    }

    public function destroy(Project $project)
    {

    }
}
