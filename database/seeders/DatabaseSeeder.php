<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'admin', 
            'email' => 'admin@gmail.com', 
            'password' => Hash::make('password'), 
            'usertype' => '1', 
        ]);

        User::create([
            'name' => 'user', 
            'email' => 'user@gmail.com', 
            'password' => Hash::make('password'), 
            'usertype' => '0',
            'balance' => '10000', 
        ]);
            Category::factory(4)->create();
            Product::factory(12)->create();

    }
}
