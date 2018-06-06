@extends('template')
@section('content')
    <h1>Liste de livres</h1>
    <div class="table-content">
        <table cellspacing="0" cellpadding="10px" class="base-table">
            <th>Titre</th>
            <th>Auteur</th>
            <th>Genre</th>
            <th>Résumé</th>
            <th>Modifier</th>
            <th>
                <form action="/book/delete" method="POST">
                    @csrf
                    <input type="submit" name="delete" value="Supprimer" id="delete-button">
                </form>
            </th>
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
                        <input type="checkbox" name="delete" data-value="{{ $value['id'] }}" value=""/>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <script type="text/javascript">
        document.querySelector('#delete-button').addEventListener('click', function() {
            let inputs = document.querySelectorAll('[type="checkbox"]');
            let checkedInput = [];
            for (let i = 0; i < inputs.length; i++) {
                if(inputs[i].checked) {
                    checkedInput.push(inputs[i].dataset.value);
                }
            }

            let token = document.querySelector('[name="_token"]').value;
            httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = function() {

            }
            httpRequest.open('GET', '/books/delete?_token=' + token + '&ids=' + checkedInput, true);
            httpRequest.send();
        });
    </script>
@endsection