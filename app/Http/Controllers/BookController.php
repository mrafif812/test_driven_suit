<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function validateData(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $book = Book::create($this->validateData($request));

        return redirect('/books/'. $book->id);
    }

    public function update(Book $book, Request $request)
    {
        $book->update($this->validateData($request));

        return redirect('/books/'. $book->id);
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect('/books');
    }
}
