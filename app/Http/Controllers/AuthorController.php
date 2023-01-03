<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    //
    // public function validateData(Request $request)
    // {
    //     return $request->validate([
    //         'name' => 'required',
    //         'dob' => 'required'
    //     ]);
    // }

    public function store(Request $request){
        Author::create($request->only([
            'name','dob'
        ]));
    }
}
