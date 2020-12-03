@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    {{-- Profile hero section --}}
    <x-profile-hero :user="$user" />
    
    <!-- Profile page navigation-->
    <x-profile-navbar :user="$user" />
    
    <div class="row">
        <livewire:friends.friends-index :user="$user" />
    </div>

</div>    
@endsection