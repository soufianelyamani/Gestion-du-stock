@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-body">
                    <div>
                        <h1>Fiche Des donnees de typeProduit numero {{ $typeProduit->id }}</h1>
                        <p><b>liblle</b> : {{ $typeProduit->liblle }}</p>
                    </div>
                    {{-- <div class="d-flex justify-content-around">
                          <a href="{{ route('typeProduits.edit', $typeProduit->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                          <small class="text-muted text-center">{{ $typeProduit->created_at->diffForHumans() }}</small>
                    </div> --}}
                {{-- <table class="table table-success table-striped text-center">
                    <thead>
                        <tr>
                            <th>Numero Commande</th>
                            <th >Date de commande</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($typeProduit->commandeVentes as $cmd)
                            <tr>
                                <td><a href="{{ route('commandeVentes.show', $cmd->id) }}">{{ $cmd->id }}</a></td>
                                <td>{{ $cmd->dateCom }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table> --}}
                </div>
              </div>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-3">
            <div>
                <a class="btn btn-primary" href="{{ route('typeProduits.index') }}">Voir Tous Les typeProduits</a>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('typeProduits.create') }}">cree nevau typeProduit</a>
            </div>
        </div>
    </div>
@endsection

