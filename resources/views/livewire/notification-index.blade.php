<div>
    <div class="mb-4">
        <div class="h1 font-weight-700">
            All Notifications
            @if ($unreadNotificationsCount > 0)
                <span class="badge badge-red ml-2">{{ $unreadNotificationsCount }} New</span>
            @endif
        </div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            <div>
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('message') }}
            </div>
        </div>
    @endif
    
    @foreach ($notifications as $notification)
        <livewire:notification-single :notification="$notification" :key="$notification->id" />
    @endforeach
    <div class="text-center">
        <button class="btn btn-light" wire:click="loadMore">Load more</button>
    </div>
</div>
