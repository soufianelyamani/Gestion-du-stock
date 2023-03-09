@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ route('users.store') }}" method="POST">
    @csrf

        <div>
            <label>{{__('Name')}}</label>
            <div>
                <input type="text" name="name" class="form-control mb-1 @error('name') is-invalid @enderror">
            </div>
            @error('name')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div>
            <label>{{ __('Email') }}</label>
            <div>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
            </div>
            @error('email')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div>
            <label>{{ __('Password') }}</label>
            <div>
                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
            </div>
            @error('password')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div>
            <label>{{ __('Type') }}</label>
            <div>
                <select name="type" id="type">
                    <option value="Gerant">Gerant</option>
                    <option value="Vendeur">Vendeur</option>
                    <option value="Magazinier">Magazinier</option>
                </select>
            </div>
            @error('type')
            <div class="alert alert-danger text-danger">{{ $message }}</div>
            @enderror
        </div>


        <br>
        <div>
        <button type="submit" class="btn btn-outline-secondary">Add</button>
        </div>

    </form>
</div>
@endsection