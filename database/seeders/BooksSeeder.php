<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books = [
            [
                'library_id' => 1,
                'title' => 'ABNKKBSNPLAko?!',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 1,
                'title' => 'Po-on',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 1,
                'title' => 'Dogeaters',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 1,
                'title' => 'Ang Paboritong Libro ni Hudas',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 1,
                'title' => 'Macarthur',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 2,
                'title' => 'Noli Me Tángere',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 2,
                'title' => 'Smaller and Smaller Circles',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 2,
                'title' => 'State of War',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 2,
                'title' => 'Ilustrado: A Novel',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 2,
                'title' => 'When the Elephants Dance',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 3,
                'title' => 'The Last Time I Saw Mother',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 3,
                'title' => 'America Is Not the Heart: A Novel',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 3,
                'title' => 'Patron Saints of Nothing',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 3,
                'title' => 'Dekada \'70',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 3,
                'title' => 'My Imaginary Ex',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 4,
                'title' => 'Boracay Vows',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 4,
                'title' => 'The Farm',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 4,
                'title' => 'Canal de la Reina',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 4,
                'title' => 'Magdalena',
                'condition' => 'available',
                'created_at' => now()
            ],
            [
                'library_id' => 4,
                'title' => 'Titser',
                'condition' => 'available',
                'created_at' => now()
            ],
        ];
        Book::insert($books);
    }
}
