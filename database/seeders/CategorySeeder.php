<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['CategoryName' => 'Fiction', 'Description' => 'Fictional stories and novels'],
            ['CategoryName' => 'Science', 'Description' => 'Scientific research and publications'],
            ['CategoryName' => 'History', 'Description' => 'Historical events and biographies'],
            ['CategoryName' => 'Technology', 'Description' => 'Tech guides and programming books'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
