@extends('adminlte::page')

@section('title', 'Users')

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
        <div>
            <a style="margin: 19px;" href="{{ route('tasks.create') }}" class="btn btn-primary">New task</a>
            
        </div>
        <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Task titile</td>
                        <td>Task description</td>
                        <td>Task status</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    
                    @foreach($project->task as $task)
                        <tr>
                            <th>{{ $task->title }}</th>
                            <th>{{ $task->description }}</th>
                            <td>{{ $task->status }}</td>
                            <td style="display:flex;">
                            <a class="btn btn-primary" href="">Change status</a>
                            @csrf
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
@endsection