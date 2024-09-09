<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sales;
use App\Models\User;
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

       User::factory(20)->create();
        Sales::factory(100)->create();
        Product::factory(100)->create();
    }
}
