<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        //
    }

    public function create(User $user)
    {
        if ($user->cannot('create', App\Models\Post::class)) {
            abort(403);
        } 
        
        return view('posts.create', compact('user'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => ['required'],
            'image_upload' => ['image'],
        ]);

        if ($request->has('image_upload')) {
            $imagePath = $request->file('image_upload')->store('uploads', 'public');
            $validatedData['image_src'] = $imagePath;
        } 

        auth()->user()->posts()->create($validatedData);

        return redirect(route('profile', [auth()->user()->username] ))
                ->with('message', 'Post created');
    }

    public function show(User $user, Post $post)
    {
        return view('posts.show', compact('user', 'post'));
    }

    public function edit(Request $request, User $user, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, User $user, Post $post)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        $validatedData = $request->validate([ 
                'content' => ['required'], 
            ]);
    
        $post->update($validatedData);

        return redirect(route('profile', [auth()->user()->username] ))
                        ->with('message', 'Post updated');
    }

    public function destroy(Request $request, User $user, Post $post)
    {
        if ($request->user()->cannot('delete', $post)) {
            abort(403);
        }

        $post->delete();
        
        return redirect(route('profile', [auth()->user()->username] ))
            ->with('message', 'Post deleted');
    }
}
