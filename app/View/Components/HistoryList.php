<?php
namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Book;

class HistoryList extends Component {
    public array $histories;
    public Book $book;

    /**
     * Create a Book list instance
     *
     * @param array $books
     * @return void
     */
    public function __construct($histories, Book $book)
    {
        $this->histories = $histories;
        $this->book = $book;
    }

    /**
     * bind the data to view
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.history-table');
    }
}