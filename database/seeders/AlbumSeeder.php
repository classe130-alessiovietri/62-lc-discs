<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\{
    Album,
    Artist
};

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Album::truncate();

        for ($i = 0; $i < 10; $i++) {
            $name = fake()->words(rand(1, 5), true);
            $slug = str()->slug($name);
            $randomArtist = Artist::inRandomOrder()->first();

            Album::create([
                'name' => $name,
                'slug' => $slug,
                'artist_id' => $randomArtist->id
            ]);
        }
    }
}
