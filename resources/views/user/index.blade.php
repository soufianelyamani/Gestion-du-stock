@extends('layouts.app')
@section('content')

<style>
    .add{
        text-decoration: none;
    }
    .d1{
        margin-bottom: 100px;
        margin-top: 60px
    }
    
</style>

<div class="container">
    
 @if(session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif 


        <div class="container d1">
            <div class="row">
                <div class="col-sm-8">
                <h1 style="display:flex; justify-content">Users List </h1>
                </div>
                <div class="col-sm-4">
                <a class="d-flex justify-content-center add" href="{{route('users.create')}}">
                    <button>Add new user</button>
                </a>
                </div>
            </div>
        </div>

       


    <table class="table table-sm">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->type }}</td>
                <td>
                    <div class="d-flex justify-content">
                    <a href="{{ route('users.edit', $user->id) }}">
                        <button>Edit</button>
                    </a>
                    <a href="{{ route('users.show', $user->id) }}">
                        <button>Show</button>
                    </a>
                    <div>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onSubmit="return confirm('Do you want really delete this user ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>

    

</div>
@endsection