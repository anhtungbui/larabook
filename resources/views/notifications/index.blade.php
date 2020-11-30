@extends('layouts.base')

@section('content')
<!-- Main page content-->
<div class="container pb-5">
    <div class="row pt-5 offset-1">
        <div class="col-3">
            <!-- Left column -->
            <div class="h2 font-weight-700">
                Notifications<span class="badge badge-red ml-2">{{ $notifications->count() }}</span>
            </div>
            {{-- <small>{{ $users->count() }} @choice('person|people', $users->count()) found</small> --}}
        </div>

        <!-- Right column -->
        <div class="col-7">
            @if (session('status'))
                <div class="alert alert-success shadow-sm" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('status') }}
                </div>
            @endif

            @foreach ($notifications as $notification)
                <div class="card shadow-sm mb-2 lift lift-sm">
                    <div class="card-body d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl mr-3">
                                @if ($notification->type === 'follow')
                                    <i class="fas fa-user-friends fa-2x"></i>
                                @elseif ($notification->type === 'comment')
                                    <i class="fas fa-comments fa-2x"></i>
                                @elseif ($notification->type === 'like')
                                    <i class="fas fa-thumbs-up fa-2x"></i>
                                @endif
                            </div>
                            <div>
                                <a href="{{ $notification->source_url }}">
                                    <div class="text-dark">{{ $notification->content }}</div>
                                    <small class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</small>
                                </a>
                            </div>
                        </div>
                        <div>
                            <form 
                                action="{{ route('profile', [auth()->user()->username]) }}/notifications"
                                method="POST"
                            >
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="btn btn-light btn-icon"
                                    name="notification_id" 
                                    value="{{ $notification->id }}"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div> 
               
            @endforeach
                
        </div>
    </div>

</div>    
@endsection