<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'poster' => $this->faker->sentence(5),
            'imdb_id' => $this->faker->sentence(5),
            'tmdb_id' => $this->faker->sentence(5),
            'allocine_id' => $this->faker->sentence(5),
            'overview' => $this->faker->sentence(3),
            'belongs_to_collection' => $this->faker->sentence(5),
            'original_language' => $this->faker->word(2),
            'original_title' => $this->faker->sentence(4),
            'release_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'similar' => $this->faker->sentence(3),
            'runtime' => $this->faker->sentence(4),
            'by' => $this->faker->name(),
            'videos' => $this->faker->sentence(2),
            'genres' => $this->faker->sentence(4)
            

        ];
    }
}
