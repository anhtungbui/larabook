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
        <livewire:post-single :post="$post" :key="$post->id" />
    @endforeach

    {{-- <div class="text-center">
        <button class="btn btn-light btn-block" wire:click="$emit('loadMore')">
            Load more
        </button>
    </div> --}}
    {{-- <div class="text-center">
        <button class="btn btn-light btn-block" wire:click="loadMore">
            Load more
        </button>
    </div> --}}
</section>