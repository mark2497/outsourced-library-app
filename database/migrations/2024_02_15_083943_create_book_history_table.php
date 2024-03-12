<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Book;
use App\Models\Library;

class CreateBookHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_history', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Library::class)
                ->references('id')
                ->on('libraries')
                ->restrictOnDelete();
            $table->foreignIdFor(Book::class)
                ->references('id')
                ->on('books')
                ->restrictOnDelete();
            $table->foreignIdFor(User::class)
                ->references('id')
                ->on('users')
                ->restrictOnDelete();
            $table->dateTime("borrowed_at");
            $table->dateTime("returned_at")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_history');
    }
}
