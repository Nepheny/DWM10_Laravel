@extends('template')
@section('content')
    <h1>Modifier un livre</h1>
    <div class="book-form-content">
        <form method="POST" action="/book/update" class="book-form">
            @csrf
            <input type="hidden" name="id" value="{{ $book->id }}"/>
            <div class="book-form-input">
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title" value="{{ $book->title }}"/>
            </div>
            <div class="book-form-input">
                <label for="author">Auteur :</label>
                <input type="text" name="author" id="author" value="{{ $book->author }}"/>
            </div>
            <div class="book-form-input">
                <label for="genre">Genre :</label>
                <input type="text" name="genre" id="genre" value="{{ $book->genre }}"/>
            </div>
            <div class="book-form-input">
                <label for="excerpt">Résumé :</label>
                <input type="text" name="excerpt" id="excerpt" value="{{ $book->excerpt }}"/>
            </div>
            <div class="book-form-submit">
                <input type="submit" name="" value="Modifier"/>
            </div>
        </form>
    </div>
@endsection