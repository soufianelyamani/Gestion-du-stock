@extends('layouts.app')
@section('content')
<div>
    <form action="{{route('commandeAchat.update' , $commandeAchat->id ) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <select name="client_id" id="nomPrenomClient"  class="form-control mb-1 @error('fournisseur_id') is-invalid @enderror">
                    {{ $num = $commandeAchat->fournisseur->id }}
                    @foreach ($fournisseur as $four)
                        <option value="{{  $four->id }}"
                        @if ( $num == $four->id)
                            selected="selected"
                         @endif
                         >
                            {{ $four->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 col-md-12">
                <input type="datetime-local" name="dateCom" id="" value="{{ $commandeAchat->dateCom }}" class="form-control mb-1 @error('dateCom') is-invalid @enderror" >
            </div>
        </div>
        <button class="btn btn-primary"  type="submit" >Modifier</button>
    </form>
</div>
@endsection
