@extends('template')
@section('content')
    <h1>Ajouter des livres</h1>
    <div class="book-form-content">
        <div>
            <div class="book-form-input">
                <label for="books">Nombre de livres à ajouter :</label>
                <input type="number" name="books" id="books" value=""/>
            </div>
            <div class="book-form-submit">
                <button id="button-books">Valider</button>
            </div>
        </div>
        <div>
            <form method="POST" action="/book/new" class="book-form">
                @csrf          
                <script>  
                    document.querySelector('#button-books').addEventListener('click', function() {
                        const N = (document.querySelector('#books').value);
                        if(Math.sign(N) === 1) {
                            const form = document.querySelector('.book-form');
                            for (let i = 0; i < N; i++) {
                                const bookDiv = document.createElement('div');
                                bookDiv.className = "book-form-container";
                                const titleDiv = document.createElement('div');
                                titleDiv.className = "book-form-input";
                                titleDiv.innerHTML = "<label for='title'>Titre :</label>";
                                titleDiv.innerHTML = "<input type='text' name='" + i + "[title]' id='title' value=''/>";
                                bookDiv.appendChild(titleDiv);

                                const authorDiv = document.createElement('div');
                                authorDiv.className = "book-form-input";
                                authorDiv.innerHTML = "<label for='author'>Auteur :</label>";
                                authorDiv.innerHTML = "<input type='text' name='" + i + "[author]' id='author' value=''/>";
                                bookDiv.appendChild(authorDiv);

                                const genreDiv = document.createElement('div');
                                genreDiv.className = "book-form-input";
                                genreDiv.innerHTML = "<label for='genre'>Genre :</label>";
                                genreDiv.innerHTML = "<input type='text' name='" + i + "[genre]' id='genre' value=''/>";
                                bookDiv.appendChild(genreDiv);

                                const excerptDiv = document.createElement('div');
                                excerptDiv.className = "book-form-input";
                                excerptDiv.innerHTML = "<label for='excerpt'>Résumé :</label>";
                                excerptDiv.innerHTML = "<input type='text' name='" + i + "[excerpt]' id='excerpt' value=''/>";
                                bookDiv.appendChild(excerptDiv);

                                form.appendChild(bookDiv);
                            }

                            const submitForm = document.createElement('div');
                            submitForm.className = "book-form-submit";
                            submitForm.innerHTML = "<input type='submit' name='' value='Ajouter'/>";
                            form.appendChild(submitForm);
                        }  
                    });
                </script>
            </form>
        </div>
    </div>
@endsection