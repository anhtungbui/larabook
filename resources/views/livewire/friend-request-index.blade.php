<div>
    <div class="mb-4">
        <div class="h4 font-weight-700">
            Friend requests<span class="badge badge-red ml-2">{{ $friendRequests->count() }}</span>
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

    @if (session()->has('error'))
        <div class="alert alert-danger">
            <div>
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('message') }}
            </div>
        </div>
    @endif

    @foreach ($friendRequests as $friendRequest)
        <livewire:friend-request-single :friendRequest="$friendRequest" :key="$friendRequest->id"/>
    @endforeach
</div>