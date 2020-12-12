<div>
    <div class="mb-4">
        <div class="h1 font-weight-700">
            Friend requests<span class="badge badge-red ml-2">{{ $friendRequests->count() }}</span>
        </div>
    </div>

    @foreach ($friendRequests as $friendRequest)
        <livewire:friend-request-single :friendRequest="$friendRequest" :key="$friendRequest->id"/>
    @endforeach
</div>