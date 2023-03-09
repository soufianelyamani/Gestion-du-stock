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