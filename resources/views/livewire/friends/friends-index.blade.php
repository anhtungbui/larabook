<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header intro-card-header text-dark">Friends</div>
                <div class="card-body">
                    <div class="row justify-content-around">

                        @foreach ($friends as $friend)
                            <livewire:friends.friends-show :friend="$friend" :key="$friend->id" />
                        @endforeach

                        
                    </div>
                </div>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center pt-3">{{ $friends->links() }}</div>
            
        </div>
    </div>
</div>