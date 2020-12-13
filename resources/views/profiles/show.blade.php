@extends('layouts.base')

@section('title')
    @if (auth()->user()->unreadNotifications->count() > 0)
        ({{ auth()->user()->unreadNotifications->count() }}) {{ $user->name }} |
    @else
        {{ $user->name }} |
    @endif
@endsection

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    {{-- Profile hero section --}}
    <x-profile-hero :user="$user" />
    
    <!-- Profile page navigation -->
    <x-profile-navbar :user="$user" />
    
    <div class="row">
        <!-- Left column -->
        <x-profile-sidebar :user="$user" />
        
        <!-- Right column -->
        <livewire:post-index :user="$user" />

    </div>

</div>    
@endsection