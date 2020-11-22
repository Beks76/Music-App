<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//       \App\Models\User::factory(10)->create();
        \App\Models\Genre::factory(5)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\Tag::factory(5)->create();

        $tags = \App\Models\Tag::all();
        \App\Models\Album::all()->each(function ($album) use ($tags) {
            $album->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
