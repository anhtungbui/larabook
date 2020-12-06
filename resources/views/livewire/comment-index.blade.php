<div>
    @isset($lastComment)
        <!-- View previous comments -->    
        <button
            class="btn btn-light btn-block mb-3"
            wire:click="viewAll" 
        >
            View previous comments
        </button>
    @endisset

    @isset($comments)
        @foreach ($comments as $comment)

        <livewire:comment-single :comment="$comment" :key="$comment->id" />
                
        @endforeach
    @endisset
</div>

