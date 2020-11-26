@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    {{-- Profile hero section --}}
    <x-profile-hero :user="$user" />
    
    <!-- Profile page navigation-->
    <x-profile-navbar :user="$user" />
    
    <div class="row">
        <!-- Left column -->
        <x-profile-sidebar :user="$user" />

        <!-- Right column -->
        <x-profile-timeline :user="$user" :posts="$posts" :likedPosts="$likedPosts" />
    </div>

</div>    
@endsection