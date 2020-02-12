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
                <h2> Status : {{ $task->status }}</h2>
                <h2>File path : {{ $task->file }}</h2>
                
                <a href="{{ route('download', ['task' => $task->id]) }}">Download file</a>
                <a href="{{ route('tasks.edit', ['task' => $task]) }}">Edit task</a>
            </div>
        </div>
@endsection