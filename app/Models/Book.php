<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use App\Models\BookHistory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    // Adding these field for bulk update
    protected $fillable = ['library_id', 'title', 'condition'];

    // Used as a flag if the borrowed book is belongs to current user or not
    protected $appends = ['currentBorrower'];

    /**
     * Relationship to History Table
     * @return HasMany
     */
    public function history() : HasMany
    {
        return $this->hasMany(BookHistory::class);
    }

    /**
     * Used as a flag if the borrowed book is belongs to current user or not
     * @return bool
     */
    public function getCurrentBorrowerAttribute() : bool
    {
        return !is_null(
            $this->history
            ->when(Auth::user(),
                fn($book) => $book->where('user_id', Auth::user()->id))
            ->whereNull('returned_at')
            ->first()
        );
    }
}
