<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Database seeds.
     */
    public function run(): void
    {
        $user = new \App\Models\User();
        $user->name = 'Administrator';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('Admin123');
        $user->save();
    }
}
