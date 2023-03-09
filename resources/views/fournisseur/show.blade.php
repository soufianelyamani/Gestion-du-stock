@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-body">
                    <div>
                        <h3>Fiche Des donnees de fournisseur numero {{ $fournisseur->id }}</h1>
                        <p><b>Nom</b> : {{ $fournisseur->nom }}</p>
                        <p><b>Telephone</b> : {{ $fournisseur->telephone }}</p>
                        <p><b>Email</b> : {{ $fournisseur->email }}</p>
                        <p><b>Ville</b> : {{ $fournisseur->ville }}</p>
                        <p><b>Adresse</b> : {{ $fournisseur->adresse }}</p>
                    </div>
                    {{-- <div class="d-flex justify-content-around">
                          <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                          <small class="text-muted text-center">{{ $client->created_at->diffForHumans() }}</small>
                    </div> --}}
                
                </div>
              </div>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-3">
            <div>
                <a class="btn btn-primary" href="{{ route('fournisseur.index') }}">Voir Tous Les fournisseurs</a>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('fournisseur.create') }}">creer neveau fournisseur</a>
            </div>
        </div>
    </div>
@endsection

