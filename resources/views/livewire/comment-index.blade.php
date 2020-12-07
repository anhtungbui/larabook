<div>
    @if(!$viewAllBtnClicked)
    <button
            class="btn btn-light btn-block mb-3"
            wire:click="viewAll" 
        >
            View previous comments
    </button>
    @endif

    @if($viewAllBtnClicked)
        @foreach ($post->comments as $comment)

        <livewire:comment-single :comment="$comment" :key="$comment->id" />

        @endforeach
    @endif
</div>

