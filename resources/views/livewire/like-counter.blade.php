<div>
    @if ($isPostLiked)
    <div class="text-primary">
        {{ $likeCount }} <i class="fa fa-thumbs-up"></i>
    </div>
    @else
    <div>
        {{ $likeCount }} <i class="fa fa-thumbs-up"></i>
    </div>
    @endif
</div>

