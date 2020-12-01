<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;

class RootUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Anh Tung Bui',
                'username' => 'anhtungbui',
                'email' => 'a@example.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Taylor Otwell',
                'username' => 'laravel',
                'email' => 'b@example.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Max Mustermann',
                'username' => 'max',
                'email' => 'c@example.com',
                'password' => bcrypt('12345678'),
            ],
        ]);

        Profile::insert([
            [
                'user_id' => 1,
                'avatar_image' => 'avatars/avatar-placeholder.png', 
                'location' => 'Germany'
            ],
            [
                'user_id' => 2,
                'avatar_image' => 'avatars/avatar-placeholder.png', 
                'location' => 'USA'
            ],
            [
                'user_id' => 3,
                'avatar_image' => 'avatars/avatar-placeholder.png', 
                'location' => 'The Earth'
            ],
        ]);
    }
}
