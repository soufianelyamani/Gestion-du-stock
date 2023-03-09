@extends('layouts.app')
@section('content')

{{-- <div class="container">
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
</div> --}}
{{-- _______________________________________________________________________________ --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chnage Password') }}</div>

                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="oldPasswordInput" class="form-label">Old Password</label>
                            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                placeholder="Old Password">
                            @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="newPasswordInput" class="form-label">New Password</label>
                            <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                placeholder="New Password">
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                            <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                placeholder="Confirm New Password">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-success">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection