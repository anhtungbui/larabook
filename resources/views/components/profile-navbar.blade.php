<nav class="nav nav-borders mt-2 pl-3">
    <a class="nav-link active ml-0" href="{{ route('profile', [$user->username]) }}">Posts</a>
    <a class="nav-link" href="{{ route('profile', [$user->username]) }}/about">About</a>
    <a class="nav-link" href="{{ route('profile', [$user->username]) }}/friends">Friends</a>
    <a class="nav-link" href="{{ route('profile', [$user->username]) }}/photos">Photos</a>
</nav>
<hr class="mt-0 mb-4" />