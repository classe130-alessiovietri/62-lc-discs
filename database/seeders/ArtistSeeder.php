<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::truncate();

        for ($i = 0; $i < 10; $i++) {
            Artist::create([
                'name' => fake()->name()
            ]);
        }
    }
}
