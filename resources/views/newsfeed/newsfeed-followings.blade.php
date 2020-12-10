@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    <div class="row pt-5">
        <!-- Left column -->
        <div class="col-lg-4 col-md-6">
            <div class="h1 font-weight-700 py-2">
                News Feed
            </div>
            <div class="card shadow-sm mb-4">
                <a href="/" class="btn btn-light">
                    <div class="card-body" >
                        <div class="h3 text-muted">
                            <i class="fas fa-user-friends fa-2x mr-2 mb-2"></i><br />
                            <span>Your Friends</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="card shadow-sm mb-4">
                <a href="/newsfeed/followings" class="btn">
                    <div class="card-body" >
                        <div class="h3">
                            <i class="fas fa-heart fa-2x mr-2 mb-2"></i><br />
                            People You Follow
                        </div>
                    </div>
                </a>
            </div>
            <div class="card shadow-sm mb-4">
                <a href="/newsfeed/groups" class="btn btn-light">
                    <div class="card-body" >
                        <div class="h3 text-muted">
                            <i class="fas fa-users fa-2x mr-2 mb-2"></i><br />
                            Your Groups
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Right column -->
        <div class="col-lg-8 col-md-6">
            @if (session('status'))
                <div class="alert alert-success shadow-sm" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
                </div>
            @endif
            
            <livewire:newsfeed-followings />
        </div>
    </div>

</div>    
@endsection