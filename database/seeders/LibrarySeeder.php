<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Library;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $libraries = [
            [
                'name' => 'CCP Library and Archives',
                'created_at' => now(),
            ],
            [
                'name' => 'Filipinas Heritage Library',
                'created_at' => now(),
            ],
            [
                'name' => 'Quezon City Public Library',
                'created_at' => now(),
            ],
            [
                'name' => 'National Library of the Philippines',
                'created_at' => now(),
            ],
        ];
        Library::insert($libraries);
    }
}
