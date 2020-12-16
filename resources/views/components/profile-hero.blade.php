<section>
    <div class="profile-hero">
        @if (isset($user->profile->cover_image))
            <img src="/storage/{{ $user->profile->cover_image }}" class="profile-hero__image" alt="">
        @endif
    </div>
    <div class="profile-hero-content d-flex flex-column justify-content-center align-items-center py-3">
        <h1 class="">{{ $user->name }}</h1>
        @if (!isset($user->profile->bio))
            @can('update', $user->profile)
                <a href="{{ route('profile', $user->username) }}/edit" class="btn-link">Add Bio</a>
            @endcan
        @else
            <div class="pb-2">{{ $user->profile->bio }}</div>
            @can('update', $user->profile)
                <a href="{{ route('profile', $user->username) }}/edit" class="btn-link">Edit Bio</a>
            @endcan
        @endif
    </div>
</section>