<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Render library page with their books
     * @param Library $library
     * @return View
     */
    public function books(Library $library) : View 
    {
        $listOfBooks = $library->find(Auth::user()->library_id)->books()->get()->toArray();
        return view('pages.home', compact('listOfBooks'));
    }

    /**
     * Get all books
     * @param Book $book
     * @return
     */
    public function index(Book $books) : JsonResponse 
    {
        return response()->json($books->all());
    }
}
