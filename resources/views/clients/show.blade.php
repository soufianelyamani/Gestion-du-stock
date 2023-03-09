@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-body">
                    <div>
                        <h1>Fiche Des donnees de client numero {{ $client->id }}</h1>
                        <p><b>Nom</b> : {{ $client->nom }}</p>
                        <p><b>Prenom</b> : {{ $client->prenom }}</p>
                        <p><b>Telephone</b> : {{ $client->telephone }}</p>
                        <p><b>Email</b> : {{ $client->email }}</p>
                        <p><b>Ville</b> : {{ $client->ville }}</p>
                        <p><b>Adresse</b> : {{ $client->adresse }}</p>
                    </div>
                    {{-- <div class="d-flex justify-content-around">
                          <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                          <small class="text-muted text-center">{{ $client->created_at->diffForHumans() }}</small>
                    </div> --}}
                <table class="table table-success table-striped text-center">
                    <thead>
                        <tr>
                            <th>Numero Commande</th>
                            <th >Date de commande</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($client->commandeVentes as $cmd)
                            <tr>
                                <td><a href="{{ route('commandeVentes.show', $cmd->id) }}">{{ $cmd->id }}</a></td>
                                <td>{{ $cmd->dateCom }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
              </div>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-3">
            <div>
                <a class="btn btn-primary" href="{{ route('clients.index') }}">Voir Tous Les Clients</a>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('clients.create') }}">cree nevau Client</a>
            </div>
        </div>
    </div>
@endsection

