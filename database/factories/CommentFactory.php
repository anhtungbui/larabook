<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomDate = $this->faker->dateTimeBetween('-7 days', 'now');

        return [
            'content' => $this->faker->sentence(),
            'created_at' => $randomDate,
            'updated_at' => $randomDate,
        ];
    }
}
