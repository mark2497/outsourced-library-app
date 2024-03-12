<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\HistoryRequest;

class HistoryController extends Controller
{
    /**
     * Get the history list of specific book
     * @param Book $book
     * @param HistoryRequest $request
     * @return View
     */
    public function index(Book $book, HistoryRequest $request) : View 
    {
        $histories = $book->history()->with('borrower')->get()->toArray();
        return view('pages.details', compact('book', 'histories'));
    }
}
