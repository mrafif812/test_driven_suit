<?php

namespace Tests\Unit;

use App\Models\Book;
use PHPUnit\Framework\TestCase;

class BookReservationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBookCanBeCheckedOut()
    {
        factory(Book::class)->create();
    }
}
