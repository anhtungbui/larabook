@extends('layouts.base')

@section('content')
<div id="layoutAuthentication" class="bg-gradient-primary-to-secondary pt-5">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header post-card-header d-flex justify-content-between">
                                <!-- Card header w/ avatar -->
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl mr-3">
                                        <img src="/storage/{{ $user->profile->avatar_src }}" alt="avatar" class="avatar-img img-fluid"/>
                                    </div>
                                    <div>
                                        <div>
                                            <a href="{{ route('profile', [$user->username]) }}" class="text-dark">{{ $user->name }}</a>
                                        </div>
                                        <small>
                                            <a href="{{ route('posts.show', [$user->username, $post->id]) }}" class="text-decoration-none text-muted">
                                                {{ date('d-m-Y', strtotime($post->updated_at)) }} at {{ date('H:i', strtotime($post->updated_at)) }}
                                            </a>
                                        </small>
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
                                                action="{{ route('profile', [$user->username]) }}/posts/{{ $post->id }}/edit"
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
                                <div class="pb-3" style="white-space: pre-line;">{{ $post->content }}</div>
                                <!-- Photo attached -->
                                @if ($post->image_src)
                                    <div class="text-center mb-2">
                                        <img src="/storage/{{ $post->image_src }}" class="post-image" alt="user upload">
                                    </div>
                                @endif
                                <!-- Post reaction -->
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
                                            <textarea type="text" class="form-control" rows="1" placeholder="Write a comment..."></textarea>
                                        </div>
                                    </form>    
                                @endauth
                            </div>
                        </div>  
                        <!-- Basic form for creating new post-->
                        
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <x-footer type="dark"/>
    </div>
</div>
@endsection