<div class="card shadow-sm">
    <div class="card-header intro-card-header text-dark">
        <div class="d-flex justify-content-between align-items-center">
            <div>Friends</div>
            <a class="btn btn-light" href="{{ route('profile', [$user->username]) }}/friends">See All Friends</a>
        </div>
        <div class="text-muted h6">{{ $friends->count() }} @choice('friend|friends', $friends->count())</div>
    </div>
    {{-- <div class="card-body d-flex flex-wrap no-gutters pt-2"> save for grid-pictures --}}
    <div class="card-body d-flex flex-wrap justify-content-space pt-2">
        @foreach ($friends as $friend)
            <div class="avatar avatar-xxl" aria-label="{{ $friend->name }}" data-microtip-position="top" role="tooltip">
                <a href="{{ route('profile', [$friend->username]) }}">
                    <img src="/storage/{{ $friend->profile->avatar_image }}" class="avatar-img img-fluid" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
