<div class="d-flex">
    <div class="col-1">
        <div class="avatar avatar-xl">
            <img class="avatar-img img-fluid" src="/storage/{{ $commenter->profile->avatar_image }}">
        </div>
    </div>
    <div class="col-11">
        <div class="border bg-gray-100 rounded py-2 pl-3">
            <a 
                href="{{ route('profile', [$commenter->username]) }}"
                href="#"
                class="text-dark font-weight-700"
            >
                {{ $commenter->name }}
            </a>
            <div class="pre-line">{{ $comment->content }}</div>

        </div>
        <small class="text-muted ml-3 d-inline-flex">
            <div>{{ $comment->created_at->diffForHumans() }}</div>
            @can('update-post', $post)
            {{-- <div><i class="far fa-heart ml-2"></i> Mark as Best reply</div> --}}
            <div>
                <form 
                    action="{{ route('comments.rate', [$commenter->username, $post->id, $comment->id]) }}" 
                    method="POST"
                >
                    @csrf
                    @method('PUT')
                    <input 
                        type="submit" class="btn-link bg-transparent p-0 ml-3 border-0 text-muted" 
                        value="Mark as Best reply"
                    >
                </form>
            </div>
            {{-- <div>{{ $comment->post->best_reply_id }}</div> --}}
            @endcan

            @if ($comment->id === $post->best_reply_id)
                <div class="text-danger ml-3">Best reply <i class="fas fa-heart"></i> </div>
            @endif

             {{-- <i class="fas fa-heart text-danger"></i> Best reply --}}
        </small>
    </div>
</div>
