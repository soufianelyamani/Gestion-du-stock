@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-body">
                    <div>
                        <p><b>Nemero commande</b>{{ $commandeAchat->id }}</p>
                        <p><b>date commande</b> : {{ $commandeAchat->dateCom }}</p>
                        <p><b>nom fournisseur</b> : {{ $commandeAchat->fournisseur->nom }}</p>
                    </div>
                    {{-- <div class="d-flex justify-content-around">
                          <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                          <small class="text-muted text-center">{{ $client->created_at->diffForHumans() }}</small>
                    </div> --}}
                </div>
              </div>
            </div>
        </div>
        </div>
    </div>
@endsection

