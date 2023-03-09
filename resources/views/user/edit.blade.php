@extends('layouts.app')
@section('content')

<div class="container">
    <form action="{{ route('users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label>{{ __('Name') }}</label>
            <div>
                <input type="text" name="name" value="{{ $user->name }}">
            </div>
            @error('name')
            <div>{{ message }}</div>
            @enderror
        </div>


        <div>
            <label>{{ __('Email') }}</label>
            <div>
                <input type="email" name="email" value="{{ $user->email }}">
            </div>
            @error('email')
            <div>{{ message }}</div>
            @enderror
        </div>


        <div>
            <label>{{ __('Password') }}</label>
            <div>
                <input type="text" name="password" value="{{ $user->password }}">
            </div>
            @error('password')
            <div>{{ message }}</div>
            @enderror
        </div>


        <div>
            <select name="type" id="type">
                <option value="Gerant">Gerant</option>
                <option value="Vendeur">Vendeur</option>
                <option value="Magazinier">Magazinier</option>
            </select>
        </div>


        <br>
        <div>
        <button type="submit" class="btn btn-outline-secondary">Edit</button>
        </div>

    </form>
</div>

@endsection