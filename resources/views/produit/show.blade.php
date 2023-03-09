@extends('layouts.app')
@section('content')
    <div>
        <div class="row">
            <div class="col">
              <div class="card shadow">
                <div class="card-body">
                    <div>
                        <p><b>liblle</b> : {{ $produit->liblle }}</p>
                        <p><b>prix</b> : {{ $produit->prix }}</p>
                        <p><b>type_produit_id</b> : {{ $produit->type_produit_id }}</p>
                        <p><b> La quantité en stock</b> : {{ $produit->qtStock }}</p>
                        <p><b>description</b> : {{ $produit->description }}</p>
                        <p><b>image</b> : <img src="../uploads/{{$produit->image }}" alt=" {{ $produit->image }}" style="width:250px;height:250px:"></p>
                    </div>
                    {{-- <div class="d-flex justify-content-around">
                          <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-sm btn-outline-secondary">Modifier</a>
                          <small class="text-muted text-center">{{ $produit->created_at->diffForHumans() }}</small>
                    </div> --}}
                </div>
              </div>
            </div>
        </div>
        <div class="d-flex justify-content-around mt-3">
            <div>
                <a class="btn btn-primary" href="{{ route('produit.index') }}">Voir Tous Les produit</a>
            </div>
            <div>
                <a class="btn btn-success" href="{{ route('produit.create') }}">cree nevau produit</a>
            </div>
        </div>
    </div>
@endsection

