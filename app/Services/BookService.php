<?php
namespace App\Services;
use App\Models\Book;
use App\Models\Library;
use App\Http\Resources\BookResource;

final class BookService 
{

    /**
     * Get the list of books within the library
     * @param Library $library
     * @return BookResource
     */
    public function list(Library $library) : BookResource 
    {
        return new BookResource($library->books->all());
    }

    /**
     * Mark the book as Borrowed
     * @param Book $book
     * @return bool
     */
    public function borrow(Book $book) : bool 
    {
        return $book->update(['condition' => 'borrowed']);
    }

    /**
     * Mark the book as Available
     * @param Book $book
     * @return bool
     */
    public function return(Book $book) : bool 
    {
        return $book->update(['condition' => 'available']);
    }
}