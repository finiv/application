@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Project</h1>
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
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Task titile</td>
                        <td>Task description</td>
                        <td>Task status</td>
                        <td>File</td>
                        <td>Action</td>
                        <td>QWE</td>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($project->task as $task)
                        <tr>
                            <th><a href="{{route('tasks.show', ['task' => $task])}}">
                              {{ $task->title }}</a></th>
                            <th>{{ $task->description }}</th>
                            <th class="status">{{\App\Enum\StatusEnum::getDescription($task->status)}}</th>
                            <td>{{ $task->file }}</td>
                            @if($task->status == 1 || $task->status == 2)
                            <td style="display:flex;">
                            <a class="sub" href="{{route('status', ['id' => $task->id, 'request' => $task->id])}}" id="sub">Change status</a>
                            @endif
                            @csrf
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    <a style="margin: 19px;" href="{{ route('tasks.create', ['id' => $project->id]) }}" class="btn btn-primary">New task</a>
                </div>
            </div>
        </div>
@endsection