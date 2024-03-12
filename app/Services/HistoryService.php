<?php
namespace App\Services;
use App\Models\History;
use App\Models\User;
use App\Models\Book;

final class HistoryService 
{

    /**
     * Add new row in Book history upon borrorwing
     * @param User $user
     * @param Book $book
     * @return History
     */
    public function logBorrow(User $user, Book $book) : History 
    {
        return History::create([
            'library_id' => $user->library_id,
            'book_id' => $book->id,
            'user_id' => $user->id,
            'borrowed_at' => now()
        ]);
    }
    
    /**
     * Update the existing history with pending return date
     * @param User $user
     * @param Book $book
     * @return bool
     */
    public function logReturn(User $user, Book $book) : bool 
    {
        return History::where('book_id', $book->id)
        ->where('user_id', $user->id)
        ->whereNull('returned_at')
        ->update(["returned_at" => now()]);
    }
}