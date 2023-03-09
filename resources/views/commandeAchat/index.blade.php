@extends('layouts.app')
@section('content')
<div>
    <div class="d-flex justify-content-around mb-3">
        <div>
            <a class="btn btn-success" href="{{ route('commandeAchat.create') }}">Cree nouvelle commande</a>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Le nom de fournisseur</th>
                <th>Date commande</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($CommandeAchat as $commandeAchat)
                <tr>
                    <td><a style="text-decoration: none" href="{{ route('fournisseur.show', $commandeAchat->fournisseur->id) }}">{{ $commandeAchat->fournisseur->nom }}</a></td>
                    <td>{{ $commandeAchat->dateCom }} </td>
                    <td>
                        <div class="d-flex  justify-content-around">
                            <a class="btn btn-success" href="{{ route('commandeAchat.show', $commandeAchat->id) }}">Afficher</a>
                            <a class="btn btn-primary" href="{{ route('commandeAchat.edit', $commandeAchat->id) }}">Modifier</a>
                            <form action="{{ route('commandeAchat.destroy', $commandeAchat->id) }}" method="POST"
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
    <div class="d-flex">{{  $CommandeAchat->links()  }}</div>
</div>
@endsection

