<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Book;
use App\Services\BookService;
use App\Services\HistoryService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BorrowRequest;
use App\Http\Requests\ReturnRequest;
use Illuminate\Http\RedirectResponse;

class BookController extends Controller
{
    /**
     * Service binding for this controller
     *
     * @param BookService $bookService
     * @param HistoryService $historyService
     */
    public function __construct(private BookService $bookService, private HistoryService $historyService)
    {}
    
    /**
     * Process the borrowing of the book
     * @param Book $book
     * @param BorrowRequest $request [book]
     * @return RedirectResponse
     */
    public function borrowBook(Book $book, BorrowRequest $request) : RedirectResponse 
    {
        try {
            DB::beginTransaction();

            $isBorrowed = $this->bookService->borrow($book);
            $isLogged = $this->historyService->logBorrow($request->user(), $book);

            // Check if the data was inserted to the database correcty
            if($isBorrowed && $isLogged) {
                DB::commit();
                return redirect()->route('home')->with('message', 'Book successfully borrowed! Please take care of it');
            }

            DB::rollBack();
            return redirect()->route('home')->withErrors('book', 'Books cannot be borrowed!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->withErrors(['book' => $e->getMessage()]);
        }
    }

    /**
     * Process the returning of the book
     * @param Book $book
     * @param ReturnRequest $request [book]
     * @return RedirectResponse
     */
    public function returnBook(Book $book, ReturnRequest $request) : RedirectResponse 
    {
        try {
            DB::beginTransaction();

            $isReturned = $this->bookService->return($book);
            $isLogged = $this->historyService->logReturn($request->user(), $book);

            // Check if the data was inserted to the database correcty
            if($isReturned && $isLogged) {
                DB::commit();
                return redirect()->route('home')->with('message', 'Book successfully return! Thank you for taking care of the book!');
            }

            DB::rollBack();
            return redirect()->route('home')->withErrors('book', 'Books cannot be returned!');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('home')->withErrors(['book' => $e->getMessage()]);
        }
    }

}
