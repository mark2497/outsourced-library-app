<?php
namespace App\View\Components;

use Illuminate\View\Component;

class BookList extends Component {
    public array $books;

    /**
     * Create a Book list instance
     *
     * @param array $books
     * @return void
     */
    public function __construct($books)
    {
        $this->books = $books;
    }

    /**
     * bind the data to view
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.books-table');
    }
}