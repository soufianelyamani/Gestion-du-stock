@extends('layouts.app')
@section('content')
    <div>
        <form action="{{ route('typeProduits.update', ['typeProduit'=>$typeProduit->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label>{{ __('liblle') }}</label>
                <div>
                    <input type="text" name="liblle" value="{{ $typeProduit->liblle }}" 
                    class="form-control mb-1 @error('liblle') is-invalid @enderror">
                </div>
                @error('liblle')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button class="btn btn-primary" type="submit">Modifier</button>
        </form>
    </div>
@endsection
