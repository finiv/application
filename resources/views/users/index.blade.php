@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
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
            <a style="margin: 19px;" href="{{ route('users.create') }}" class="btn btn-primary">New user</a>
        </div>
        <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($result as $key => $item)
                        <tr>
                            <th>{{ $item['id'] }}</th>
                            <th>{{ $item['name'] }}</th>
                            <th>{{ $item['email'] }}</th>
                            <td style="display:flex;">
                            <a class="btn btn-danger" href="">Deleteuser</a>
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