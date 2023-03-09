@extends('layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<div>
    <div class="d-flex justify-content-around mb-3">
        <div>
            <a class="btn btn-success" href="{{ route('clients.create') }}">Cree nouveau Client</a>
        </div>
    </div>
    <table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>Action</th>
            </tr>
        </thead>
     
        <tbody>
            <div>
                <input type="text" class="form-controller" id="search" name="search">
            </div>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->nom }} </td>
                    <td>{{ $client->prenom }} </td>
                    <td>{{ $client->email }} </td>
                    <td>{{ $client->adresse }} </td>
                    <td>
                        <div class="d-flex  justify-content-around">
                            <a class="btn btn-success" href="{{ route('clients.show', $client->id) }}">Afficher</a>
                            <a class="btn btn-primary" href="{{ route('clients.edit', $client->id) }}">Modifier</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
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
    <div class="d-flex">{{ $clients->links() }}</div>
</div>
<script type="text/javascript">
    $('#search').on('keyup',function(){
    $value=$(this).val();
    $.ajax({
    type : 'get',
    url : '{{URL::to('search')}}',
    data:{'search':$value},
    success:function(data){
    $('tbody').html(data);
    }
    });
    })
    </script>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    

@endsection

