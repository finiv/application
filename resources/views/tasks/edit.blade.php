@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Add new task</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('tasks.update', ['task' => $task]) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title" value="{{ $task->title }}"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Desctiption:</label>
                        <input type="text" class="form-control" name="description" value="{{ $task->description }}"/>
                    </div>
                    <div class="form-group">
                        <label for="status">File:</label>
                        <select name="status" id="">
                            <option value="1">{{ \App\Enum\StatusEnum::getDescription(1) }}</option>
                            <option value="2">{{ \App\Enum\StatusEnum::getDescription(2) }}</option>
                            <option value="3">{{ \App\Enum\StatusEnum::getDescription(3) }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update task</button>
                </form>
            </div>
        </div>
    </div>
@endsection