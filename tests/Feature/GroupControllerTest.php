<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GroupControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function getData()
    {
        return [
            'id' => 1,
            'name' => 'Laravel developers',
            'bio' => 'For laravel developers',
        ];
    }

    protected function getUser()
    {
        return User::factory()->create(['name' => 'Anh Tung Bui']);
    }

    public function test_a_group_and_its_admin_can_be_created()
    {
        $data = $this->getData();
        $user = $this->getUser();
        $this->withoutExceptionHandling();

        $response = $this->actingAs($user)->post('/groups', $data);

        $this->assertCount(1, Group::all());
        $this->assertCount(1, GroupUser::all());
        $this->assertEquals('admin', GroupUser::first()->membership);
        $response->assertRedirect(route('groups.show', [1]));
    }

    public function test_a_group_avatar_can_be_uploaded()
    {
        $file = UploadedFile::fake()->image('avatar.jpg');

        $this->post('/groups', [
            'name' => 'Laravel developers',
            'image_upload' => $file,
        ]);
        
        $this->assertEquals('avatars/' . $file->hashName(), Group::first()->avatar_image);
    }

    public function test_a_private_group_can_be_created()
    {
        $data = array_merge($this->getData(), ['is_private' => 'on']);
        $user = $this->getUser();
        $this->withoutExceptionHandling();

        $response = $this->actingAs($user)->post('/groups', $data);

        $this->assertEquals(0, Group::first()->is_public);
    }
}
