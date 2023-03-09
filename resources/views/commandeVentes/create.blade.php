@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('commandeVentes.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <select name="client_id" id=""  class="form-control mb-1 @error('client_id') is-invalid @enderror">
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">
                                {{ $client->nom }} {{ $client->prenom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('client_id')
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
