<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book as Book;

class BookController extends Controller
{
    public function display()
    {
        $books = Book::all()->sortBy('author');
        return view('book.show', ['books' => $books]);
    }

    public function insertForm()
    {
        $book = new Book;
        $bookColumn = $book->getTableColumns();
        $renderBook = [];

        array_shift($bookColumn);
        array_pop($bookColumn);
        array_pop($bookColumn);
        foreach ($bookColumn as $key => $value) {
            $renderBook[$value] = "text";
        }
        return view('book.insert', ['bookForm' => $renderBook]);
    }

    public function insertAction(Request $request)
    {
        $form = $request->input();
        $book = new Book;
        $book->title = $form['title'];
        $book->author = $form['author'];
        $book->genre = $form['genre'];
        $book->excerpt = $form['excerpt'];
        $book->save();
        $request->session()->flash('status', 'Ajout effectué !');
        return redirect('/books');
    }

    public function deleteAction(Request $request)
    {
        Book::destroy($request->input('id'));
        $request->session()->flash('status', 'Suppression effectuée !');
        return redirect('/books');
    }

    public function updateForm(Request $request)
    {
        // $book = Book::where('id', $request->input('id'))->get();
        $book = Book::find($request->input('id'));
        return view('book.update', ['book' => $book,]);
    }

    public function updateAction(Request $request)
    {
        $form = $request->input();
        $book = Book::find($request->input('id'));
        $book->title = $form['title'];
        $book->author = $form['author'];
        $book->genre = $form['genre'];
        $book->excerpt = $form['excerpt'];
        $book->save();
        $request->session()->flash('status', 'Modification effectuée !');
        return redirect('/books');
    }
}
