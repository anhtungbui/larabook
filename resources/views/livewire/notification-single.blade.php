<div class="card shadow-sm mb-2 lift lift-sm">
    <div class="card-body d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <div class="avatar avatar-xl mr-3">
                @if ($notification->type === 'follow' 
                        || $notification->type === 'friend request' 
                        || $notification->type === 'confirmation')
                    <i class="fas fa-user-friends fa-2x"></i>
                @elseif ($notification->type === 'comment')
                    <i class="fas fa-comments fa-2x"></i>
                @elseif ($notification->type === 'like')
                    <i class="fas fa-thumbs-up fa-2x"></i>
                @endif
            </div>
            <div>
                <a href="{{ $notification->source_url }}">
                    <div class="text-dark">{{ $notification->content }}</div>
                    <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                </a>
            </div>
        </div>
        <div>
            <button 
                class="btn btn-light" 
                wire:click="$emit('notificationDeleted', {{ $notification->id }})"
            >
                <i class="far fa-trash-alt"></i>
            </button>
        </div>
    </div>
</div>