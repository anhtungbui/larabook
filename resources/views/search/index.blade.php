@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    <div class="row pt-5 offset-1">
        <div class="col-3">
            <!-- Left column -->
            <h2>Search results for </h2>
            <div class="h2 font-weight-700">{{ $query }}</div>
            <small>{{ $users->count() }} found</small>
        </div>

        <!-- Right column -->
        <div class="col-7">
            @if (!is_null($users))
            @foreach ($users as $user)
            <a href="/{{ $user->username }}">
                <div class="card shadow-sm mb-2 lift lift-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl mr-3">
                                <img 
                                    src="/storage/{{ $user->profile->avatar_src }}" 
                                    alt="avatar" 
                                    class="avatar-img img-fluid"
                                />
                            </div>
                            <div>
                                <div class="text-dark font-weight-700">{{ $user->name }}</div>
                            </div>
                        </div>
                    </div>
                </div> 
            </a>
                
            @endforeach
            {{-- End of card--}}
                
            @endif
        </div>
    </div>

</div>    
@endsection