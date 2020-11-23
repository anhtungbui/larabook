@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    {{-- Profile Hero section --}}
    <section>
        <div class="profile-hero">
            {{-- <button>Edit Cover Photo</button> --}}
        </div>
        <div class="profile-hero-content d-flex flex-column justify-content-center align-items-center py-3">
            <h1 class="">{{ $user->name }}</h1>
            <a href="" class="btn-link">Add Bio</a>
        </div>
    </section>
    <!-- Profile page navigation-->
    <nav class="nav nav-borders mt-2 pl-3">
        <a class="nav-link active ml-0" href="{{ route('profile', [$user->username]) }}">Posts</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/about">About</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/friends">Friends</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/photos">Photos</a>
    </nav>
    <hr class="mt-0 mb-4" />
    <div class="row">
        <!-- Left column -->
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card">
                <div class="card-header intro-card-header">Intro</div>
                <div class="card-body">
                    <!-- Profile picture image-->
                    <div class="text-center">
                        <img class="img-account-profile rounded-circle mb-2 text-center" src="storage/{{ $user->profile->avatar_src }}" alt="" />
                    </div>
                    <!-- Profile picture help block-->
                    <!-- Profile details -->
                    @if ($user->profile->location)
                        <div class="pt-3">
                            <i class="fas fa-home"></i>
                            Lives in <strong>{{ $user->profile->location }}</strong>
                        </div>
                    @endif

                    @if ($user->profile->hometown)
                        <div class="pt-3">
                            <i class="fas fa-map-marker-alt"></i>
                            From <strong>{{ $user->profile->hometown }}</strong>
                        </div>
                    @endif

                    @if ($user->profile->website)
                        <div class="pt-3">
                            <i class="fas fa-code"></i>
                            <strong>{{ $user->profile->website }}</strong>
                        </div>
                    @endif

                    @auth
                        <div class="pt-3">
                            <a href="" class="btn btn-light btn-block">Edit Profile</a>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
        <!-- Right column -->
        <div class="col-xl-8">
            <!-- Hidden Alerts -->
            @if (session("status"))
                <div class="alert alert-success shadow-sm" role="alert">
                    {{ session("status") }}
                </div>
            @endif
            <!-- All Posts -->
            @foreach ($user->posts as $post)
            <div class="card mb-4">
                <div class="card-header post-card-header d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl mr-3">
                            <img src="storage/{{ $user->profile->avatar_src }}" alt="avatar" class="avatar-img img-fluid"/>
                        </div>
                        <div>
                            <div class="">{{ $user->name }}</div>
                            <small class="text-muted">23 November 2020</small>
                        </div>

                    </div>

                    @auth
                        <div class="dropdown">
                            <button 
                                class="btn btn-icon btn-light" 
                                id="dropdownMenuButton" 
                                type="button" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false"
                            >
                                <i class="fa fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <form 
                                    action="{{ route('profile', [$user->username]) }}/posts/{{ $post->id}}/edit"
                                    method="GET"
                                    class="dropdown-item"
                                >
                                    <input type="submit" class="btn btn-link text-decoration-none" value="Edit Post">
                                </form>
                                <form 
                                    action="{{ route('posts.show', [$user->username, $post]) }}"
                                    method="POST"
                                    class="dropdown-item"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <input type="text" class="d-none" name="post_id" value="{{ $post->id }}">
                                    <input type="submit" class="btn btn-link text-decoration-none" value="Delete Post">
                                </form>
                            </div>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <!-- Button trigger modal -->
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Launch Demo Modal</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Default Bootstrap Modal</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">...</div>
                                            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
                <div class="card-body">
                    <div class="pb-3">{{ $post->content }}</div>

                    @auth
                        <div class="post-reaction pb-2 d-flex justify-content-around align-items-center">
                            {{-- <div class="post-reaction-counter border "> --}}
                                {{-- @if (likecount > 0) TODO --}}
                                <div>19 <i class="fa fa-thumbs-up"></i></div>
                                <div>19 <i class="fa fa-comments"></i></div>
                            
                                <a href="#" class="btn btn-link mr-2">Like</a>
                                <a href="#" class="btn btn-link mr-2">Comment</a>
                                <a href="#" class="btn btn-link mr-2">Share</a>
                            {{-- </div> --}}
                        </div>
                        <form action="" method="POST">
                            @csrf

                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Write a comment...">
                            </div>
                        </form>    
                    @endauth
                </div>
            </div>                
            @endforeach
        </div>
    </div>
</div>    
@endsection