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
        return view('book.insert', ['book' => $book]);
    }

    public function insertAction(Request $request)
    {   
        $form = $request->input();
        unset($form['_token']);
        for ($i = 0; $i < count($form); $i++) {
            $book = new Book;
            $book->title = $form[$i]['title'];
            $book->author = $form[$i]['author'];
            $book->genre = $form[$i]['genre'];
            $book->excerpt = $form[$i]['excerpt'];
            $book->save();
        }
        $request->session()->flash('status', 'Ajout effectué !');
        return redirect('/books');
    }

    public function deleteAction(Request $request)
    {
        Book::destroy($request->input('id'));
        $request->session()->flash('status', 'Suppression effectuée !');
        return redirect('/books');
    }

    public function deleteActionMultiple(Request $request)
    {
        foreach (explode(",", $request->input('ids')) as $key => $value) {
            Book::destroy($value);
        }
        $request->session()->flash('status', 'Suppressions effectuée !');
        return 'true';
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
