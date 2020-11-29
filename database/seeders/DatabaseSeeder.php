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
       \App\Models\User::factory(10)->create();
        \App\Models\Genre::factory(5)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\Tag::factory(5)->create();


        $tags = \App\Models\Tag::all();
        \App\Models\Album::all()->each(function ($album) use ($tags) {
            $album->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


        $role1 = \App\Models\Role::create(['name' => 'user']);
        $role2 = \App\Models\Role::create(['name' => 'admin']);

        $roles = \App\Models\Role::all();
        \App\Models\User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, 2))->pluck('id')->toArray()
            );
        });


    }
}
