@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Add new Project</h1>
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
                <form method="post" action="{{ route('projects.update', ['project' => $project]) }}">
                @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="project_name">Name:</label>
                        <input type="text" class="form-control" name="project_name" value="{{ $project->project_name }}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Project</button>
                </form>
            </div>
        </div>
    </div>
@endsection