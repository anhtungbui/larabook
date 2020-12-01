@foreach ($friendRequests as $friendRequest)
<div class="card shadow-sm mb-2">
    <div class="card-body d-flex justify-content-between">
        <div class="d-flex align-items-center pr-2">
            <div class="avatar avatar-xl mr-3">
                <i class="fas fa-user-plus fa-2x"></i>
            </div>
            <div>
                <div class="text-dark">{{ Str::before($friendRequest->content, 'sent you') }}</div>
                <small class="text-gray-500">{{ $friendRequest->created_at->diffForHumans() }}</small>
                {{-- <div class="text-dark">{{ $notification->content }}</div> --}}
                {{-- <div class="text-dark">Abc sent you a friend request</div>
                <small class="text-gray-500">10 seconds ago</small> --}}
            </div>
                
           
        </div>
        <!-- Friend request CTAs -->
        <div>
           
            @if ($isDeclined)
                <button class="btn btn-light mr-1" disabled>
                    <div>
                        <i class="fas fa-check mr-2"></i>
                        Friend Request Removed
                    </div>
                </button> 
            @else

                @if (!$isAccepted)
                    <button 
                        class="btn btn-primary mr-1" 
                        wire:click="accept({{ $friendRequest->from_user_id }})"
                    >
                    Accept
                    </button>
                    <button 
                        class="btn btn-light" 
                        wire:click="decline({{ $friendRequest->from_user_id }})"
                    >
                    Decline
                    </button>
                @else
                    <button class="btn btn-primary mr-1" disabled>
                        <div>
                            <i class="fas fa-check mr-2"></i>
                            Friend Request Accepted
                        </div>
                    </button>   
                @endif

            @endif
        </div>
    </div>
</div>
@endforeach