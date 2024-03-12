<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class BookAccessibleRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the book is under the library where the user is belong
        $isBelongsToLibrary = Auth::user()->library()->whereHas('books', function($book) use ($value) {
            $book->where('id', $value);
        })->exists();
        
        return $isBelongsToLibrary;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Book doesn't belong to your library!";
    }
}
