<form class="form-inline mr-auto d-none d-md-block mr-3">
        
    <div class="input-group input-group-joined input-group-solid">
        {{-- <div class="input-group-text border-0 pr-0">
            <i data-feather="search"></i>
        </div> --}}
        <div class="text-muted pl-3 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </div>
        <input 
            class="form-control" 
            name="query" 
            type="search" 
            placeholder="Search Larabook" 
            aria-label="Search"
            wire:model.debouce.300ms="search" 
        />
    </div>

    <div class="searchbar__dropdown">
        @if (!empty($search))
            @if ($searchResults->count() === 0)
                <div class="d-flex align-items-center py-2 px-2 border-bottom list-group-item-action">
                    <div class="pl-2">No results found for "<strong>{{ $search }}</strong>"</div>
                </div>
            @endif
            @foreach ($searchResults as $result)
                <div class="d-flex align-items-center py-2 px-2 border-bottom list-group-item-action">
                    <div class="avatar avatar-xl">  
                        <img class="avatar-img img-fluid" src="/storage/{{ $result->profile->avatar_image }}">
                    </div>
                    <div class="pl-2">
                        <a href="{{ route('profile', [$result->username]) }}" class="text-gray-600">
                            <strong>{{ $result->name }}</strong>
                        </a>
                    </div>
                </div>
            @endforeach
        @endif   
    </div>
</form>