@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    <div class="row pt-5">
        <!-- Left column -->
        <div class="col-lg-4 col-md-6">
            <div class="h4 font-weight-700">
                News Feed
            </div>
        </div>

        <!-- Right column -->
        <div class="col-lg-8 col-md-6">
            @if (session('status'))
                <div class="alert alert-success shadow-sm" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
                </div>
            @endif
            
            <livewire:newsfeed-index />
        </div>
    </div>

</div>    
@endsection