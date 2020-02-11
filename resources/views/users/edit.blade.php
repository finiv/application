@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
    <h1>Add new User</h1>
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
                <form method="post" action="{{ route('users.update', ['user' => $user]) }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="note">Note:</label>
                        <textarea name="note" id="" cols="30" class="form-control" rows="10"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add User</button>
                </form>
            </div>
        </div>
    </div>
@endsection