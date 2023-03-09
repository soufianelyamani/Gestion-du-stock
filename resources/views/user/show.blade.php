@extends('layouts.app')
@section('content')

<style>
    .head{
        margin-top: 10px;
        margin-bottom: 30px;
    }
</style>

<div class="container">
    <div>
        <h1 class="head">User Data {{ $user->id }}</h1>
    </div>
    <div>
        <p><b>Name : </b> {{ $user->Fname }} </p>
        <p><b>Email : </b> {{ $user->email }} </p>
        <p><b>Password : </b> {{ $user->password }} </p>
    </div>
</div>

@endsection