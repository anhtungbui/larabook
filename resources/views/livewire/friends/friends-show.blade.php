<div class="col-md-5 border d-flex align-items-center border border-light rounded py-3 shadow-sm mb-2 list-group-item-action">
    <div class="avatar avatar-xxl ml-2 mr-3">
        <img class="avatar-img img-fluid" src="/storage/{{ $friend->profile->avatar_image }}">
    </div>
    <div>
        <a 
            href="{{ route('profile', [$friend->username]) }}" 
            class="text-dark font-weight-700"
        >
        {{ $friend->name }}
        </a>
    </div>
</div>