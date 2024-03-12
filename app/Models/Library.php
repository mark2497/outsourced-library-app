<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use App\Models\BookHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;

    /**
     * Relationship to Book
     * This returns the list of books that relates to this library
     * @return HasMany
     */
    public function books() : HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Relationship to History
     * This returns the list of book histories
     * @return HasMany
     */
    public function history() : HasMany
    {
        return $this->hasMany(BookHistory::class);
    }

    /**
     * Relationship to User
     * This returns the list of users belongs to this library
     * @return HasMany
     */
    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'library_id');
    }
}
