<div class="card shadow-sm mb-4">
    <div class="card-header intro-card-header text-dark pb-2">Intro</div>
    <div class="card-body">
        <!-- Profile avatar -->
        <div class="text-center profile-avatar">
            <img 
                class="profile-avatar__image img-fluid rounded-circle mb-2 text-center" 
                src="/storage/{{ $user->profile->avatar_image }}" 
                alt="user avatar" 
            />
        </div>
        <!-- Profile details -->
        @if ($user->profile->location)
            <div class="pt-3">
                <i class="fas fa-home"></i>
                Lives in <strong>{{ $user->profile->location }}</strong>
            </div>
        @endif

        @if ($user->profile->hometown)
            <div class="pt-3">
                <i class="fas fa-map-marker-alt"></i>
                From <strong>{{ $user->profile->hometown }}</strong>
            </div>
        @endif

        @if ($user->profile->website)
            <div class="pt-3">
                <i class="fas fa-code"></i>
                <a href="{{ $user->profile->website }}" class="text-gray-600">
                    <strong>{{ $user->profile->website }}</strong>
                </a>
            </div>
        @endif

        @can('update', $user->profile)
            <div class="pt-3">
                <a href="{{ route('profile', auth()->user()->username) }}/edit" class="btn btn-light btn-block">Edit Profile</a>
            </div>
        @endcan

    </div>
</div>