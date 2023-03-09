@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('commandeAchat.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <select name="fournisseur_id" id=""  class="form-control mb-1 @error('fournisseur_id') is-invalid @enderror">
                        @foreach ($fournisseur as $four)
                            <option value="{{ $four->id }}">
                                {{ $four->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('fournisseur_id')
                    <div class="alert alert-danger text-danger">{{ $message }}</div>
                @enderror
                <div class="col-lg-6 col-md-12">
                    <input type="datetime-local" name="dateCom" id="" class="form-control mb-1 @error('dateCom') is-invalid @enderror">
                    <div>
                        @error('dateCom')
                            <div class="alert alert-danger text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-success mt-1" type="submit">Create</button>
        </form>
    </div>
@endsection
