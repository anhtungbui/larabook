<div>
    <div class="mb-4">
        <div class="h4 font-weight-700">
            All Notifications<span class="badge badge-red ml-2">{{ $notifications->count() }}</span>
        </div>
    </div>
    @foreach ($notifications as $notification)
            <livewire:notification-single :notification="$notification" :key="$notification->id" />
    @endforeach
</div>
