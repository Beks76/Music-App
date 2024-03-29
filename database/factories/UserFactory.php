<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'username' =>  $this->faker->unique()->userName,
            'password' => $this->faker->word(6),// password
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'remember_token' => Str::random(10),
        ];
    }
}
