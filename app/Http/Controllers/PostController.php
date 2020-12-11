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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        return view('posts.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                ->with('status', 'Post created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Post $post)
    {
        // $comments = Comment::findMany([22, 23])->count();
        // ddd($comments);
        return view('posts.show', compact('user', 'post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Post $post)
    {
        Gate::authorize('update-post', $post);
        // if (!Gate::allows('update-post', $post)) {
        //     abort(403);
        // }

        $validatedData = $request->validate([ 
                'content' => ['required'], 
            ]);
    
        $post->update($validatedData);

        return redirect(route('profile', [auth()->user()->username] ))
                        ->with('status', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Post $post)
    {
        Gate::authorize('delete-post', $post);

        $post->delete();
        
        return redirect(route('profile', [auth()->user()->username] ))
            ->with('status', 'Post deleted');
        
            if (auth()->check()) {
        } 
    }
}
