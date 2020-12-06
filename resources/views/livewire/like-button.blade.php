<div>
    @if (!$isPostLiked)
    <button class="btn btn-primary" wire:click="like">
        <div>
            <i class="far fa-thumbs-up mr-2"></i>
            Like
        </div>
    </button>

    @else
    <button class="btn btn-light" wire:click="unlike">
        <div>
            Unlike
        </div>
    </button>
    @endif
</div>
