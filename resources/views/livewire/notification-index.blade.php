<div>
    <div class="mb-4">
        <div class="h1 font-weight-700">
            All notifications
            @if ($unreadNotificationsCount > 0)
                <span class="badge badge-red ml-2">{{ $unreadNotificationsCount }} New</span>
            @endif
        </div>
    </div>

    @foreach ($notifications as $notification)
        <livewire:notification-single :notification="$notification" :key="$notification->id" />
    @endforeach

    <div class="text-center">
        <button class="btn btn-light" wire:click="loadMore">Load more</button>
    </div>
</div>
