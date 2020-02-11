<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_name'];

    public function task()
    {
        return $this->hasMany(Task::class);
    }

    public function scopeOrderProjects()
    {
        return Project::orderBy('id','DESC')->paginate(5);
    }

    public function scopeGetAllTasks($id)
    {
        return Task::orderBy('id','DESC')->where('project_id', $id)->paginate(5)->get();
    }
}
