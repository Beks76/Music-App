<?php

namespace Database\Factories;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlbumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Album::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->sentence(2),
            'user_id'=> Artist::pluck('user_id')->random(),
            'year'=> $this->faker->year,
            'genre_id' => Genre::pluck('id')->random(),
            'cover'=> 'https://placeimg.com/265/265/any?' . rand(1, 100)
        ];
    }
}
