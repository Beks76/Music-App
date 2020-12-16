<?php

namespace Database\Factories;

use App\Models\Artist;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArtistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bio'=> $this->faker->sentence(10),
            'user_id' => Role::find(3)->users()->get()->pluck('id')->random(),
        ];
    }
}
