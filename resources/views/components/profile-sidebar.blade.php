<!-- Left column -->
<section class="col-xl-4 d-none d-lg-block">
    <!-- Profile Details card-->
    <div class="card shadow-sm mb-4">
        <div class="card-header intro-card-header text-dark">Intro</div>
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
    <!-- Friends card (sidebar)-->
    <div class="card shadow-sm">
        <div class="card-header intro-card-header text-dark">
            <div class="d-flex justify-content-between align-items-center">
                <div>Friends</div>
                <a class="btn btn-light" href="#">See All Friends</a>
            </div>
            <div class="text-muted h6">99 friends</div>
        </div>
        {{-- <div class="card-body d-flex flex-wrap no-gutters pt-2"> save for grid-pictures --}}
        <div class="card-body d-flex flex-wrap justify-content-space pt-2">
            {{-- sample --}}
            <div class="avatar avatar-xxl">
                <a href="#">
                    <img src="/storage/uploads/NsJ2iTbVK9wB4eDbNo1E8pUsSboimLGRJZ6ee5Cd.jpeg" class="avatar-img img-fluid" alt="">
                </a>
            </div>
            <div class="avatar avatar-xxl">
                <a href="#">
                    <img src="/storage/uploads/NsJ2iTbVK9wB4eDbNo1E8pUsSboimLGRJZ6ee5Cd.jpeg" class="avatar-img img-fluid" alt="">
                </a>
            </div>
            <div class="avatar avatar-xxl">
                <a href="#">
                    <img src="/storage/uploads/NsJ2iTbVK9wB4eDbNo1E8pUsSboimLGRJZ6ee5Cd.jpeg" class="avatar-img img-fluid" alt="">
                </a>
            </div>
           <!-- 15 Friends -->
        </div>
    </div>
    <!-- Footer -->
    <x-footer type="light"/>
</section>