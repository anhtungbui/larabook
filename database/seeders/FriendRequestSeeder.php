<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Friend;

class FriendRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Friend::factory()->times(5)->create();
    }
}
