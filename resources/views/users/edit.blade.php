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
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
                    </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="/users" class="btn btn-primary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection