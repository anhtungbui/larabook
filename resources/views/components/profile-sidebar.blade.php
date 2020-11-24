<!-- Left column -->
<section class="col-xl-4">
    <!-- Profile Details card-->
    <div class="card shadow-sm">
        <div class="card-header intro-card-header">Intro</div>
        <div class="card-body">
            <!-- Profile picture image-->
            <div class="text-center">
                <img class="img-account-profile rounded-circle mb-2 text-center" src="storage/{{ $user->profile->avatar_src }}" alt="" />
            </div>
            <!-- Profile picture help block-->
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
                    <a href="" class="btn btn-light btn-block">Edit Profile</a>
                </div>
            @endauth

        </div>
    </div>
</section>