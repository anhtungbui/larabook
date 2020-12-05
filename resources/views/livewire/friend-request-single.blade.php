<div class="card shadow-sm mb-2 lift lift-sm" style="height: 5.8rem">
    <div class="card-body d-flex justify-content-between">
        <div class="d-flex align-items-center pr-2">
            <div class="avatar avatar-lg mr-3">
                <i class="fas fa-user-plus fa-2x"></i>
            </div>
            <div>
                <div class="text-dark font-weight-600">
                    {{ $requester->name }}
                </div>
                <!-- Friend request CTAs -->
                <div>
                    <button 
                        class="btn btn-primary btn-sm mr-1" 
                        wire:click="$emit('requestAccepted', {{ $requester->id }})"
                    >Accept
                    </button>
                    <button 
                        class="btn btn-light btn-sm" 
                        wire:click="$emit('requestDeclined', {{ $requester->id }})"
                    >Decline
                    </button>

                    {{-- @if ($isDeclined)
                    <button class="btn btn-light btn-sm mr-1" disabled>
                        <div>
                            <i class="fas fa-check mr-2"></i>
                            Friend Request Removed
                        </div>
                    </button> 
                    @else
                        @if (!$isAccepted)
                        <button 
                            class="btn btn-primary btn-sm mr-1" 
                            wire:click="acceptRequest({{ $requester->id }})"
                        >
                        Accept
                        </button>
                        <button 
                            class="btn btn-light btn-sm" 
                            wire:click="declineRequest({{ $requester->id }})"
                        >
                        Decline
                        </button>
                        @else
                        <button class="btn btn-primary btn-sm mr-1" disabled>
                            <div>
                                <i class="fas fa-check mr-2"></i>
                                Friend Request Accepted
                            </div>
                        </button>   
                        @endif
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
</div>
