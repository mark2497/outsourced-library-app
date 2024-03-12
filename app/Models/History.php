<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use App\Models\Library;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class History extends Model
{
    use HasFactory;

    protected $table = 'book_history';

    protected $fillable = ['library_id', 'book_id', 'user_id', 'borrowed_at', 'returned_at'];

    /**
     * Relationship to Book
     * This returns the details of the book
     * @return BelongsTo 
     */
    public function book() : BelongsTo 
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relationship to User
     * This returns the details of borrower(user)
     * @return BelongsTo 
     */
    public function borrower() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relationship to Library
     * This returns the details of library
     * @return BelongsTo 
     */
    public function library() : BelongsTo 
    {
        return $this->belongsTo(Library::class);
    }

}
