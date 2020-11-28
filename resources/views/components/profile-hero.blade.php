<section>
    <div class="profile-hero">
        {{-- <button>Edit Cover Photo</button> --}}
    </div>
    <div class="profile-hero-content d-flex flex-column justify-content-center align-items-center py-3">
        <h1 class="">{{ $user->name }}</h1>
        @if (!isset($user->profile->bio))
            <a href="{{ route('profile', $user->username) }}/edit" class="btn-link">Add Bio</a>
        @else
            <div class="pb-2">{{ $user->profile->bio }}</div>
            <a href="{{ route('profile', $user->username) }}/edit" class="btn-link">Edit Bio</a>
        @endif
    </div>
</section>