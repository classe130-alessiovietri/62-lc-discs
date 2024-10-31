<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers
use Illuminate\Support\Facades\Schema;

// Models
use App\Models\{
    Album,
    Artist,
    Genre
};

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function() {
            Album::truncate();
        });

        for ($i = 0; $i < 10; $i++) {
            $name = fake()->words(rand(1, 5), true);
            $slug = str()->slug($name);
            $randomArtist = Artist::inRandomOrder()->first();

            $album = Album::create([
                'name' => $name,
                'slug' => $slug,
                'artist_id' => $randomArtist->id
            ]);

            $genreIds = [];
            for ($j = 0; $j < rand(0, Genre::count()); $j++) {
                $randomGenre = Genre::inRandomOrder()->first();

                if (!in_array($randomGenre->id, $genreIds)) {
                    $genreIds[] = $randomGenre->id;
                }
            }

            $album->genres()->sync($genreIds);
        }
    }
}
