@extends('layouts.app')
@section('content')
<div>
    <div class="d-flex justify-content-around mb-3">
        <div>
            <a class="btn btn-success" href="{{ route('typeProduits.create') }}">Cree nouveau Type de produit</a>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>liblle</th>
                <th>date d'ajout</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($typeProduits as $typeProduit)
                <tr>
                    <td>{{ $typeProduit->liblle }} </td>
                    <td>{{ $typeProduit->created_at }} </td>
                    <td>
                        <div class="d-flex  justify-content-around">
                            <a class="btn btn-success" href="{{ route('typeProduits.show', $typeProduit->id) }}">Afficher</a>
                            <a class="btn btn-primary" href="{{ route('typeProduits.edit', $typeProduit->id) }}">Modifier</a>
                            <form action="{{ route('typeProduits.destroy', $typeProduit->id) }}" method="POST"
                                onSubmit="return confirm('Vous vouller vraiment supprimer ce type produit ?')">
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
    <div class="d-flex">{{ $typeProduits->links() }}</div>
</div>
@endsection

