<section class="col-xl-8">
    <div class="card shadow-sm">
        <div class="card-header intro-card-header text-dark">
            Photos ({{ $photos->count() }})
        </div>
        <div class="card-body d-flex flex-wrap no-gutters justify-content-space pt-3">

            @foreach ($photos as $photo)
                <div class="col-4">
                    <a href="{{ route('posts.show', [$user->username, $photo->id]) }}">
                        <img src="/storage/{{ $photo->image_src }}" class="img-fluid" alt="user uploaded photo">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>