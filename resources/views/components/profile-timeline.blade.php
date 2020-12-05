<section class="col-xl-8">
    <!-- Hidden Alerts -->
    @if (session("status"))
    <div class="alert alert-success shadow-sm" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session("status") }}
    </div>
    @endif
    
    @auth
        @if (auth()->id() === $user->id)
        <!-- What's on your mind Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl mr-3">
                        <img src="/storage/{{ $user->profile->avatar_image }}" alt="avatar" class="avatar-img img-fluid"/>
                    </div>
                    <div>
                    <div>What's on your mind?</div>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <button 
                        class="btn btn-primary rounded-pill shadow-sm"
                        onClick="location.href = '{{ route('profile', [auth()->user()->username]) }}/posts/create'"
                    >
                        <i class="fas fa-edit ml-1 mr-2"></i>Create New Post
                    </button>
                </div>
            </div>
        </div> 
        @endif
    @endauth
    
    <!-- All Posts -->
    @foreach ($posts as $post)
        <div class="card shadow-sm mb-4">
            <div class="card-header post-card-header d-flex justify-content-between">
                <!-- Card header w/ avatar -->
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl mr-3">
                        <img src="/storage/{{ $user->profile->avatar_image }}" alt="avatar" class="avatar-img img-fluid"/>
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
                    @if (auth()->id() === $user->id)
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
                                <input type="submit" class="btn btn-link" value="Edit Post">
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
                    @endif
                @endauth
            </div>
            <div class="card-body">
                <div class="pb-3 pre-line">{{ $post->content }}</div>
                <!-- Photo attached -->
                @if ($post->image_src)
                <div class="text-center mb-2">
                    <img src="/storage/{{ $post->image_src }}" class="img-fluid" alt="user upload">
                </div>
                @endif   
                <!-- Post reaction -->
                @auth
                    <div class="post-reaction pb-2 d-flex justify-content-around align-items-center">
                        <div>{{ $post->likes->count() }} <i class="fa fa-thumbs-up"></i></div>
                        <div>{{ $post->comments->count() }}<i class="fa fa-comments ml-1"></i></div>
                        
                        <!-- Like button -->
                        {{-- <like-button 
                            username="{{ $user->username }}"
                            post="{{ $post->id }}"
                            liked="{{ $likedPosts }}"
                            count="{{ $post->likes->count() }}"
                        ></like-button> --}}


                        <form 
                            action=""
                            method="POST"
                        >
                            @csrf
                            <input type="submit" class="btn btn-light rounded-pill" value="Like">
                        </form>
                        <!-- Comment button -->
                        <form 
                            action=""
                            method="POST"
                        >
                            @csrf
                            <input type="submit" class="btn btn-light rounded-pill" value="Comment">
                        </form>
                        <!-- Share button -->
                        <form 
                            action=""
                            method="POST"
                        >
                            @csrf
                            <input type="submit" class="btn btn-light rounded-pill" value="Share">
                        </form>
                    </div>
                @endauth
                <!-- Comments -->
                <livewire:comment-index :postId="$post->id" />

                <livewire:comment-create :postId="$post->id" />
            </div>
        </div>                
    @endforeach
</section>