<div class="d-flex">
    <div class="col-1">
        <div class="avatar avatar-xl">
            <img class="avatar-img img-fluid" src="/storage/{{ $comment->user->profile->avatar_image }}">
        </div>
    </div>
    <div class="col-11">
        <div class="border bg-gray-100 rounded py-2 pl-3">
            <a 
                href="{{ route('profile', [$comment->user->username]) }}" 
                class="text-dark font-weight-700"
            >
                {{ $comment->user->name }}
            </a>
            <div class="pre-line">{{ $comment->content }}</div>

        </div>
        <small class="text-muted ml-3">
            {{ $comment->created_at->diffForHumans() }}
        </small>
    </div>
</div>