@extends('template')
@section('content')
    <h1>Liste de livres</h1>
    <div class="table-content">
        <table cellspacing="0" cellpadding="10px" class="base-table">
            <th>Titre</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Résumé</th>
            <th></th>
            <th></th>
            @foreach ($books as $value)
                <tr>
                    <td>{{ $value['title'] }}</td>
                    <td>{{ $value['author'] }}</td>
                    <td>{{ $value['genre'] }}</td>
                    <td>{{ $value['excerpt'] }}</td>
                    <td>
                        <form action="/book/update" method="GET">
                            @csrf
                            <input type="hidden" name="id" value="{{ $value['id'] }}">
                            <input type="submit" name="" value="Modifier">
                        </form>
                    </td>
                    <td>
                        <form action="/book/delete" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $value['id'] }}">
                            <input type="submit" name="" value="X">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection