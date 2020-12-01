<?php

namespace App\Http\Controllers;

use Arr;
use App\Models\User;
use App\Models\Friend;
use App\Models\Notification;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $posts = $user->posts()->latest()->get();

        // $likedPosts = $user->likes()->get();
        $likedPosts = auth()->user()->likes()->get()->pluck('post_id');
        // ddd($likedPosts);

        $followingUsers = auth()->user()->follows;

        // $notification = Notification::where([
        //     ['user_id', '=', $user->id],
        //     ['type', '=', 'friend request'],
        //     ])->first();
        // ddd($notification);
        
        $hasFriendRequest = $user->friends->contains(auth()->user());
        // ddd($hasFriendRequest);

        return view('profiles.show', [
                    'user' => $user,
                    'posts' => $posts,
                    'likedPosts' =>$likedPosts,
                    'followingUsers' => $followingUsers
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'image_upload' => ['image'],
            'cover_image_upload' => ['image'],
            'bio' => ['max:100'],
            'website' => ['nullable', 'url'],
            'location' => ['max:50'],
            'hometown' => ['max:50'],
        ]);

        if (isset($validatedData['image_upload'])) {
            $image_path = $validatedData['image_upload']->store('avatars', 'public');
            $validatedData['avatar_image'] = $image_path; 
            unset($validatedData['image_upload']);
        }

        if (isset($validatedData['cover_image_upload'])) {
            $image_path = $validatedData['cover_image_upload']->store('avatars', 'public');
            $validatedData['cover_image'] = $image_path; 
            unset($validatedData['cover_image_upload']);
        }

        User::find(auth()->user()->id)->profile->update($validatedData);

        return redirect(route('profile', [auth()->user()->username]))
                                        ->with('status', 'Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function welcome()
    {
        $user = User::find(auth()->user()->id);

        return view('profiles.edit', compact('user'));
    }
}
