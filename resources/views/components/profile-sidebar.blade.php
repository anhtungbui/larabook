<!-- Left column -->
<section class="col-xl-4 d-none d-lg-block">
    <!-- Profile Details card-->
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
                    <strong>{{ $user->profile->website }}</strong>
                </div>
            @endif

            @auth
                <div class="pt-3">
                    <a href="{{ route('profile', auth()->user()->username) }}/edit" class="btn btn-light btn-block">Edit Profile</a>
                </div>
            @endauth

        </div>
    </div>
    <!-- Friends list (sidebar)-->
    <livewire:sidebar.friends-list :user="$user" />
    
    <!-- Footer -->
    <x-footer type="light"/>
</section>