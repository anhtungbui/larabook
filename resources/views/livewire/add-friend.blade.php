<div>
    {{ $isFriend }}
    @if ($isFriend === 'accepted')
        <button type="submit" class="btn btn-danger" wire:click="removeFriend">
            <div>
                <i class="fas fa-user-slash mr-2"></i>Unfriend
            </div>
        </button>
    @elseif ($isFriend === 'pending')
        <button type="submit" class="btn btn-primary" wire:click="addFriend" disabled>
            <div>
                <i class="fas fa-user-check mr-2"></i>Friend Request Sent
            </div>
        </button>   
    @else
        <button type="submit" class="btn btn-primary" wire:click="addFriend">
            <div>
                <i class="fas fa-user-plus mr-2"></i>Add friend
            </div>
        </button>
    @endif
</div>
