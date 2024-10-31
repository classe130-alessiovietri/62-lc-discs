<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Models
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function() {
            Genre::truncate();
        });

        for ($i = 0; $i < 10; $i++) {
            Genre::create([
                'name' => fake()->words(rand(1, 3), true)
            ]);
        }
    }
}
