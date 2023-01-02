<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Book;
use Tests\TestCase;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    public function testCreateBook(){
        $this->withoutExceptionHandling();

        $response = $this->post('/books',[
            'title' => 'A demo book',
            'author' => 'Test writer',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    public function testTitleIsRequired(){

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Test Writer'
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function testAuthorIsRequired(){
        $response = $this->post('/books', [
            'title' => 'Test Book',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }

    public function testBookCanBeUpdated(){
        $this->withoutExceptionHandling();

        $this->post('/books', [
            'title' => 'demo',
            'author' => 'demo author',
        ]);

        $book = Book::first();
        $response = $this->patch('/books/'. $book->id,[
            'title' => 'new demo',
            'author' => 'new demo author'
        ]);

        $this->assertEquals('new demo', Book::first()->title);
        $this->assertEquals('new demo author', Book::first()->author);


    }
}
