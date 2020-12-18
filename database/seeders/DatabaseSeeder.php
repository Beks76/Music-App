<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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

        $admin = \App\Models\User::create(['email' => 'admin@admin.com', 'username'=>'admin', 'password'=>bcrypt('asdasd'), 'remember_token' => Str::random(10)]);
        $admin->roles()->attach($role2->id);

        $artist_id = \App\Models\Role::find(3)->users()->get()->pluck('id');

        foreach ($artist_id as $id) {
            Artist::create([
                'bio'=> 'lorem ipsum lorem ipsum 2017 lorem lorem ipsum upsins 2912',
                'user_id' => $id,
            ]);
        }

        // \App\Models\Artist::factory(count(\App\Models\Role::find(3)->users()->get()->pluck('id')))->create();

        \App\Models\Genre::factory(5)->create();
        \App\Models\Album::factory(10)->create();
        \App\Models\Tag::factory(5)->create();


        $tags = \App\Models\Tag::all();
        \App\Models\Album::all()->each(function ($album) use ($tags) {
            $album->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });


        \App\Models\Plans::create(['title' => 'Premium Plan', 'identifier'=>'premium', 'stripe_id'=>'price_1HwQv0HWyvEzHXX0kBzAmd1h', 'price'=>'$5.00', 'image'=>'https://i.pinimg.com/564x/01/b4/08/01b4089e5d43e2fc6da95010cc40f63c.jpg']);
        \App\Models\Plans::create(['title' => 'Basic Plan', 'identifier'=>'basic', 'stripe_id'=>'price_1HwQt7HWyvEzHXX0aR3euIDW', 'price'=>'$1.00', 'image'=>'https://i.pinimg.com/564x/20/8d/b7/208db7d44eb4c97e3a5dbe88a35dda40.jpg']);
        \App\Models\Plans::create(['title' => 'Free Trial', 'identifier'=>'free',  'price'=>'$0.00', 'image'=>'https://i.pinimg.com/564x/00/d8/0c/00d80c4c6ae9cb41cebc74c7effd0bfb.jpg']);
    }
}
