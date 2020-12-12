<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;

class FriendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Generate pending friend requests
        return [
            'user_id' => User::factory(),
            'friend_id' => 1
        ];
    }
}
