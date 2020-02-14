@extends('adminlte::page')

@section('title', 'Task')

@section('content_header')
    <h1>Projects</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
       
            <div class="col-sm-12">
                <h1>{{ $task->title }} info:</h1>
                <h2>Description : {{ $task->description }}</h2>
                <h2> Status : {{ \App\Enum\StatusEnum::getDescription($task->status) }}</h2>
                @if(isset($task->file))
                <a href="{{ route('download', ['task' => $task->id]) }}" class="btn btn-primary">Download file</a>
                @endif
                <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn btn-primary">Edit task</a>
                <a href="{{ url('projects/' . $task->project->id) }}" class="btn btn-primary">Back</a>
            </div>
        </div>
@endsection