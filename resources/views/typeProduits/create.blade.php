@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('typeProduits.store') }}" method="POST">
            @csrf

            <div>
                <label>{{ __('liblle') }}</label>
                <div>
                    <input type="text" name="liblle" value="{{ old('liblle') }}"
                        class="form-control mb-1 @error('liblle') is-invalid @enderror">
                </div>
                @error('liblle')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
@endsection
   