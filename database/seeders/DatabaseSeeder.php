<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\LibrarySeeder;
use Database\Seeders\BooksSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LibrarySeeder::class,
            BooksSeeder::class
         ]);
    }
}
