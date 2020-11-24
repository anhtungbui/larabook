@extends('layouts.base')

@section('content')
<!-- Profile page content-->
<div class="container pb-5">
    {{-- Profile Hero section --}}
    <section>
        <div class="profile-hero">
            {{-- <button>Edit Cover Photo</button> --}}
        </div>
        <div class="profile-hero-content d-flex flex-column justify-content-center align-items-center py-3">
            <h1 class="">{{ $user->name }}</h1>
            <a href="" class="btn-link">Add Bio</a>
        </div>
    </section>
    <!-- Profile page navigation-->
    <nav class="nav nav-borders mt-2 pl-3">
        <a class="nav-link active ml-0" href="{{ route('profile', [$user->username]) }}">Posts</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/about">About</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/friends">Friends</a>
        <a class="nav-link" href="{{ route('profile', [$user->username]) }}/photos">Photos</a>
    </nav>
    <hr class="mt-0 mb-4" />
    <div class="row">
        <!-- Left column -->
        <x-profile-sidebar />
        
        <!-- Right column -->
        @yield('additional-content')
    </div>
</div>    
@endsection