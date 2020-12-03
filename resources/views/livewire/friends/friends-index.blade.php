<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-8">
            <div class="card shadow-sm">
                <div class="card-header intro-card-header text-dark">Friends ({{ $friends->count() }})</div>
                <div class="card-body">
                    <div class="row">

                        @foreach ($friends as $friend)
                            <livewire:friends.friends-show :friend="$friend" :key="$friend->id" />
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>