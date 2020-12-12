@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    <div class="row pt-5">
        <!-- Left column -->
        <div class="col-lg-4 col-md-6">
            <livewire:friend-request-index />
        </div>

        <!-- Right column -->
        <div class="col-lg-8 col-md-6">
            {{-- @if (session('status'))
                <div class="alert alert-success shadow-sm" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
                </div>
            @endif --}}

            @if (session()->has('message'))
                {{-- {{ session('message') }} --}}
                {{-- <livewire:message-bar message="{{ session('message') }}" /> --}}
            @endif

            {{-- <div class="alert alert-success shadow-sm message-bar" role="alert"> --}}
            {{-- <x-snackbar /> --}}
            {{-- <div class="alert alert-success shadow-sm message-bar" style="display:none" role="alert">
                <i class="fas fa-check-circle mr-2"></i>
                <span>Message content</span>
            </div> --}}
            
            <livewire:notification-index />
        </div>
    </div>
</div>    
@endsection

