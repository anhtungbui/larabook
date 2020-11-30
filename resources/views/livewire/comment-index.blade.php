<div>
    @isset($comments)
        @foreach ($comments as $comment)
            <livewire:comment-single :comment="$comment" :key="$comment->id" />
                
        @endforeach
        
    @endisset
    
    @if ($lastComment)
        <!-- View previous comment -->    
        <form wire:submit.prevent="showAll">
            <input 
                type="submit" 
                class="btn btn-light btn-block mb-3" 
                value="View previous comments"
            >
        </form>
        
        <livewire:comment-single :comment="$lastComment" :key="$lastComment->id" />
    @endif
</div>

