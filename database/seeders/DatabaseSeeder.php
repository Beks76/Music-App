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

        $role1 = \App\Models\Role::create(['name' => 'user']);
        $role2 = \App\Models\Role::create(['name' => 'admin']);
        $role3 = \App\Models\Role::create(['name' => 'artist']);

        $roles = \App\Models\Role::all();
        \App\Models\User::all()->each(function ($user) use ($roles) {
            $user->roles()->attach(
                $roles->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        
        \App\Models\Artist::factory(count(\App\Models\Role::find(3)->users()->get()->pluck('id')))->create();

        \App\Models\Genre::factory(5)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\Tag::factory(5)->create();


        $tags = \App\Models\Tag::all();
        \App\Models\Album::all()->each(function ($album) use ($tags) {
            $album->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


        \App\Models\Plans::create(['title' => 'Premium Plan', 'identifier'=>'premium', 'stripe_id'=>'price_1HwQv0HWyvEzHXX0kBzAmd1h', 'price'=>'$5.00']);
        \App\Models\Plans::create(['title' => 'Basic Plan', 'identifier'=>'basic', 'stripe_id'=>'price_1HwQt7HWyvEzHXX0aR3euIDW', 'price'=>'$1.00']);
        \App\Models\Plans::create(['title' => 'Free Trial', 'identifier'=>'free',  'price'=>'$0.00']);
    }
}
