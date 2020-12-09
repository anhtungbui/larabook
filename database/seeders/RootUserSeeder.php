<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
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
                'name' => 'Benjamin Hopper',
                'username' => 'ben',
                'email' => 'b@example.com',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Joy Harrington',
                'username' => 'joy',
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

        Post::factory()->times(5)->create(['user_id' => 1]);
        Post::factory()->times(2)->create(['user_id' => 2]);

        Comment::factory()->times(2)->create([
                                    'user_id' => 2,
                                    'post_id' => 1,
                                ]);

        Comment::factory()->times(2)->create([
                                    'user_id' => 3,
                                    'post_id' => 1,
                                ]);


    }
}
