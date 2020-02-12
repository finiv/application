@extends('adminlte::page')

@section('title', 'Projects')

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
            <a style="margin: 19px;" href="{{ route('projects.create') }}" class="btn btn-primary">New project</a>
        </div>
        <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Project name</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($result as $key => $item)
                        <tr>
                            <th>{{ $item['id'] }}</th>
                            <th><a href="{{ route('projects.show', ['project' => $item['id']]) }}">{{ $item['project_name'] }}</a></th>
                            <td style="display:flex;">
                            <a class="btn btn-danger" href="">Delete project</a>
                            @csrf
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $data->links() }}
        </div>
@endsection