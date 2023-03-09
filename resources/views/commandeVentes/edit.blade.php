@extends('layouts.app')
@section('content')
<div>
    <form action="{{route('commandeVentes.update' , $commandeVente->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <select name="client_id" id="nomPrenomClient"  class="form-control mb-1 @error('client_id') is-invalid @enderror">
                    {{ $num = $commandeVente->client->id }}
                    @foreach ($clients as $client)
                        <option value="{{  $client->id }}"
                        @if ( $num == $client->id)
                            selected="selected"
                         @endif
                         >
                            {{ $client->nom }} {{ $client->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-md-12">
                <input type="datetime-local" name="dateCom" id="" value="{{ $commandeVente->dateCom }}" class="form-control mb-1 @error('dateCom') is-invalid @enderror" >
            </div>
        </div>
        <button class="btn btn-primary"  type="submit" >Modifier</button>
    </form>
</div>
@endsection
