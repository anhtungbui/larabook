<section class="">
    <!-- Hidden Alerts -->
    @if (session("status"))
    <div class="alert alert-success shadow-sm" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session("status") }}
    </div>
    @endif
    
    @auth
        {{-- @if (auth()->id() === $user->id) --}}
        <!-- What's on your mind Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="avatar avatar-xl mr-3">
                        <img src="/storage/{{ auth()->user()->profile->avatar_image }}" alt="avatar" class="avatar-img img-fluid"/>
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
        {{-- @endif --}}
    @endauth
    
    <!-- All Posts -->
    @if ($posts->count() === 0)
        <div class="card shadow-sm" style="background:transparent">
            <div class="card-body" >
                <div>
                    <i class="fas fa-check-circle mr-2"></i>
                    You're all caught up
                </div>
            </div>
        </div>
    @endif
    @foreach ($posts as $post)
    
    <div class="card shadow-sm mb-4">
        <div class="card-header post-card-header d-flex justify-content-between">
            <!-- Card header w/ avatar -->
            <div class="d-flex align-items-center">
                <div class="avatar avatar-xl mr-3">
                    <img src="/storage/{{ $post->user->profile->avatar_image }}" alt="avatar" class="avatar-img img-fluid"/>
                </div>
                <div>
                    <div>
                        <a href="{{ route('profile', [$post->user->username]) }}" class="text-dark">{{ $post->user->name }}</a>
                        {{-- <span class="badge badge-warning px-2 py-1 ml-1">Friend</span> --}}
                    </div>
                    <small>
                        <a href="{{ route('posts.show', [$post->user->username, $post->id]) }}" class="text-decoration-none text-muted">
                            {{ date('d-m-Y', strtotime($post->updated_at)) }} at {{ date('H:i', strtotime($post->updated_at)) }}
                        </a>
                    </small>
                </div>
            </div>
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
    
                    <livewire:like-counter :post="$post" />
                    
                    <livewire:comment-counter :post="$post" />
    
                    <livewire:like-button :post="$post" />
    
                </div>
            @endauth
    
            <!-- Comments -->
            <livewire:comment-index :post="$post" :key="$post->id" />
    
            <livewire:comment-create :post="$post" :key="$post->id" />
        </div>
    </div> 
                
    @endforeach
    {{-- <div class="text-center">
        <button class="btn btn-light btn-block" wire:click="$emit('loadMore')">
            Load more
        </button>
    </div> --}}
</section>