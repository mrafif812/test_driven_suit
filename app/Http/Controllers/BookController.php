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
        Book::create($this->validateData($request));
    }

    public function update(Book $book, Request $request)
    {
        $book->update($this->validateData($request));
    }
}
