<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['BookName' => 'The Great Gatsby', 'CategoryID' => 1, 'Qty' => 10, 'Description' => 'Classic American novel'],
            ['BookName' => 'Dune', 'CategoryID' => 1, 'Qty' => 5, 'Description' => 'Science fiction epic'],
            ['BookName' => 'A Brief History of Time', 'CategoryID' => 2, 'Qty' => 8, 'Description' => 'Stephen Hawking classic'],
            ['BookName' => 'Sapiens', 'CategoryID' => 3, 'Qty' => 12, 'Description' => 'History of humankind'],
            ['BookName' => 'Clean Code', 'CategoryID' => 4, 'Qty' => 7, 'Description' => 'Programming best practices'],
        ];

        foreach ($books as $book) {
            \App\Models\Book::create($book);
        }
    }
}
