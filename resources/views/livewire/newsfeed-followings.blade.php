<section class="">
    <!-- Hidden Alerts -->
    @if (session("status"))
    <div class="alert alert-success shadow-sm" role="alert">
        <i class="fas fa-check-circle mr-2"></i>{{ session("status") }}
    </div>
    @endif
    
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