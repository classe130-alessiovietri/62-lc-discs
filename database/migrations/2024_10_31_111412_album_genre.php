<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('album_genre', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id');
            $table->foreign('album_id')
                    ->references('id')
                    ->on('albums')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('genre_id');
            $table->foreign('genre_id')
                    ->references('id')
                    ->on('genres')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

            $table->timestamps();

            $table->primary([
                'album_id',
                'genre_id'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('album_genre');
    }
};
