@extends('layouts.app')
@section('content')
<div>
    <div class="d-flex justify-content-around mb-3">
        <div>
            <a class="btn btn-success" href="{{ route('commandeVentes.create') }}">Cree nouvelle commande</a>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Le nom de client</th>
                <th>Date commande</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commandeVentes as $commandeVente)
                <tr>
                    <td><a style="text-decoration: none" href="{{ route('clients.show', $commandeVente->client->id) }}">{{ $commandeVente->client->nom }} {{ $commandeVente->client->prenom }}</a></td>
                    <td>{{ $commandeVente->dateCom }} </td>
                    <td>
                        <div class="d-flex  justify-content-around">
                            <a class="btn btn-success" href="{{ route('commandeVentes.show', $commandeVente->id) }}">Afficher</a>
                            <a class="btn btn-primary" href="{{ route('commandeVentes.edit', $commandeVente->id) }}">Modifier</a>
                            <form action="{{ route('commandeVentes.destroy', $commandeVente->id) }}" method="POST"
                                onSubmit="return confirm('Vous vouller vraiment supprimer ce ette Commande ?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">{{  $commandeVentes->links()  }}</div>
</div>
@endsection

