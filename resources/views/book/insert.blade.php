@extends('template')
@section('content')
    <h1>Ajouter un livre</h1>
    <div class="book-form-content">
        <form method="POST" action="/book/new" class="book-form">
            @csrf
            @foreach ($bookForm as $key => $value)
                <div class="book-form-input">
                    <label for="{{ $key }}">{{ $key }} :</label>
                    <input type="{{ $value }}" name="{{ $key }}" id="{{ $key }}" value=""/>
                </div>
            @endforeach
            <div class="book-form-submit">
                <input type="submit" name="" value="Ajouter"/>
            </div>
        </form>
    </div>
@endsection