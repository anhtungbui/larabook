<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PhotoController extends Controller
{
    public function index(User $user)
    {
        $photos = $user->posts->filter(function ($photo) {
            return !is_null($photo['image_src']);
        });

        return view('profiles.photos.index', [
            'user' => $user,
            'photos' => $photos,
        ]);
    }
}
