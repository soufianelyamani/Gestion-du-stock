@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('fournisseur.update', $fournisseur->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>{{ __('Nom') }}</label>
                <div>
                    <input type="text" name="nom" value="{{ $fournisseur->nom }}"
                        class="form-control mb-1 @error('nom') is-invalid @enderror">
                </div>
                @error('nom')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
           
            <div>
                <label>{{ __('Telephone') }}</label>
                <div>
                    <input type="tel" name="telephone" value="{{ $fournisseur->telephone }}"
                        class="form-control mb-1 @error('telephone') is-invalid @enderror">
                </div>
                @error('telephone')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Email') }}</label>
                <div>
                    <input type="email" name="email" value="{{ $fournisseur->email }}"
                        class="form-control mb-1 @error('email') is-invalid @enderror">
                </div>
                @error('email')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Ville') }}</label>
                <div>
                    <input type="text" name="ville" value="{{ $fournisseur->ville }}"
                        class="form-control mb-1 @error('ville') is-invalid @enderror">
                </div>
                @error('ville')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label>{{ __('Adresse') }}</label>
                <div>
                    <input type="text" name="adresse" value="{{ $fournisseur->adresse }}"
                        class="form-control mb-1 @error('adresse') is-invalid @enderror">
                </div>
                @error('adresse')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Modifier</button>
        </form>
    </div>
@endsection
