<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Storage;

class PostController extends Controller
{
    /**
     * Helpers 
     */
    private function getPost($postId)
    {
        return Post::find($postId);
    }

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
    public function create($username)
    {
        $user = User::where('username', $username)->get();
        // ddd($user);

        return view('posts.create', ['user' => $user]);
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
                ->with('status', 'Awesome! A new Post has been successfully created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($username, $postId)
    {
        $post = $this->getPost($postId);
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($username, $postId)
    {
        $post = Post::find($postId); 
        if (auth()->check()) {
            $post->delete();
            
            return back()->with('status', 'The post was successfully deleted');
        } 
    }
}
