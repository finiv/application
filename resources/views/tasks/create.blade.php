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
                <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>
                    <div class="form-group">
                        <label for="description">Desctiption:</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <div class="form-group">
                        <label for="file">File:</label>
                        <input type="file" class="form-control" name="file"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add task</button>
                </form>
            </div>
        </div>
    </div>
@endsection