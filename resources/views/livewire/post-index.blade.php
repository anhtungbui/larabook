<section class="col-xl-8">
    @can('view-whatsOnYourMind', $user)
        <!-- What's on your mind Card -->
        <div class="card shadow-sm mb-4" data-aos="fade-up">
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
                    <a 
                        href="{{ route('posts.create', [auth()->user()->username]) }}"
                        class="btn btn-primary rounded-pill shadow-sm"
                    >
                        <div>
                            <i class="fas fa-edit ml-1 mr-2"></i>Create New Post
                        </div>
                    </a>
                </div>
            </div>
        </div> 
    @endcan
    
    <!-- All Posts -->
    @foreach ($posts as $post)
    
        <livewire:post-single :post="$post" :key="$post->id" />
                
    @endforeach
        
        {{-- {{ $posts->links() }} --}}

    @if ($posts->hasPages())
        @if ($posts->hasMorePages())
            <a 
                href="{{ $posts->nextPageURL() }}"
                class="btn btn-light btn-block"
            >
            Load more
            </a>
        @endif
    @endif
</section>