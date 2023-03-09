@extends('layouts.app')
@section('content')
<div>
    <div class="d-flex justify-content-around mb-3">
        <div>
            <a class="btn btn-success" href="{{ route('fournisseur.create') }}">Cree nouveau Fournisseur</a>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Email</th>
                <th>Ville</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $four)
                <tr>
                    <td>{{ $four->nom }} </td>
                    <td>{{ $four->telephone }} </td>
                    <td>{{ $four->email }} </td>
                    <td>{{ $four->ville }} </td>
                    <td>{{ $four->adresse }} </td>
                    <td>
                        <div class="d-flex  justify-content-around">
                            <a class="btn btn-success" href="{{ route('fournisseur.show', $four->id) }}">Afficher</a>
                            <a class="btn btn-primary" href="{{ route('fournisseur.edit', $four->id) }}">Modifier</a>
                            <form action="{{ route('fournisseur.destroy', $four->id) }}" method="POST"
                                onSubmit="return confirm('Vous vouller vraiment supprimer ce fournisseur ?')">
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
    <div class="d-flex">{{ $fournisseurs->links() }}</div>
</div>
@endsection

