@extends('layouts.app')
@section('content')
<div>
    <div class="d-flex justify-content-around mb-3">
        <div>
            <a class="btn btn-success" href="{{ route('produit.create') }}">Cree nouveau Produit</a>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Name</th>
                <th>type de produit</th>
                <th>prix</th>
                <th>La quantité en stock</th>
                <th>description</th>
                <th>image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produit as $p)
                <tr>
                    <td>{{ $p->liblle }} </td>
                    <td><a href="{{route('typeProduits.show', $p->typeProduit->id)}}">{{ $p->typeProduit->liblle }} </a></td>
                    <td>{{ $p->prix }} </td>
                    <td>{{ $p->description }} </td>
                    <td>{{ $p->qtStock }} </td>
                    <td><img src="../uploads/{{$p->image}}"style="max-height: 150px;"></td>
                    <td>
                        <div class="d-flex  justify-content-around">
                            <a class="btn btn-success" href="{{ route('produit.show', $p->id) }}">Afficher</a>
                            <a class="btn btn-primary" href="{{ route('produit.edit', $p->id) }}">Modifier</a>
                            <form action="{{ route('produit.destroy', $p->id) }}" method="POST"
                                onSubmit="return confirm('Vous vouller vraiment supprimer ce client ?')">
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
    <div class="d-flex">{{ $produit->links() }}</div>
</div>
@endsection
