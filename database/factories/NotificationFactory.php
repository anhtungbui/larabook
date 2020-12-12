<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'from_user_id' => User::factory(),
            'user_id' => 1,
            'content' => $this->faker->name . ' commented on one of your posts',
            'type' => 'comment',
        ];
    }
}
