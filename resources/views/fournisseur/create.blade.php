@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('fournisseur.store') }}" method="POST">
            @csrf
            <div>
                <label>{{ __('Nom') }}</label>
                <div>
                    <input type="text" name="nom" value="{{ old('nom') }}"
                        class="form-control mb-1 @error('nom') is-invalid @enderror">
                </div>
                @error('nom')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
          
            <div>
                <label>{{ __('Telephone') }}</label>
                <div>
                    <input type="text" name="telephone" value="{{ old('telephone') }}"
                        class="form-control mb-1 @error('telephone') is-invalid @enderror">
                </div>
                @error('telephone')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Email') }}</label>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control mb-1 @error('email') is-invalid @enderror">
                </div>
                @error('email')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Ville') }}</label>
                <div>
                    <input type="text" name="ville" value="{{ old('ville') }}"
                        class="form-control mb-1 @error('ville') is-invalid @enderror">
                </div>
                @error('ville')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Adresse') }}</label>
                <div>
                    <input type="text" name="adresse" value="{{ old('adresse') }}"
                        class="form-control mb-1 @error('email') is-invalid @enderror">
                </div>
                @error('adresse')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
@endsection
