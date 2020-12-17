@extends('layouts.base')

@section('content')
<div id="layoutAuthentication" class="bg-gradient-primary-to-secondary pt-5">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <!-- Basic form for creating new group-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center">
                                <h3 class="font-weight-light my-4">Create New Group</h3>
                                <div class="font-weight-light pb-2">It's gonna be quick, easy and fun</div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-warning shadow-sm" role="alert">
                                        {{-- <ul> --}}
                                            @foreach ($errors->all() as $error)
                                                <div><i class="fas fa-exclamation-triangle mr-2"></i>{{ $error }}</div>
                                            @endforeach
                                        {{-- </ul> --}}
                                    </div>
                                @endif
                                <!-- Create new post form-->
                                <form
                                    enctype="multipart/form-data" 
                                    method="POST" 
                                    action="{{ route('groups.store') }}"
                                >
                                    @csrf
                                    <!-- Form Group (content) -->
                                    <div class="form-group">
                                        <label for="name">Group name</label>
                                        <input 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="name" 
                                            id="name"
                                            placeholder="Enter a name"
                                            value="{{ old('name') }}"
                                        >
                                    </div>
                                    <!-- Form Group (content) -->
                                    <div class="form-group">
                                        <label for="bio">Group bio (optional)</label>
                                        <input 
                                            class="form-control @error('bio') is-invalid @enderror" 
                                            name="bio" 
                                            id="bio"
                                            placeholder="Describe the group"
                                            value="{{ old('bio') }}"
                                        >
                                    </div>
                                    <!-- Form Group (content) -->
                                    <div class="form-group form-check">
                                        <input 
                                            type="checkbox" 
                                            class="form-check-input" 
                                            name="is_private"
                                        >
                                        <label 
                                            class="form-check-label" 
                                            for="is_private"
                                        >
                                            <strong>Private</strong> group
                                        </label>
                                    </div>
                                    <!-- Form group (image) -->
                                    <div class="form-group">
                                        <label for="image_src">
                                            <i class="fas fa-camera ml-1 mr-2"></i>
                                            Add an image as group avatar (optional)
                                        </label>
                                        <input type="file" class="form-control-file" name="image_upload" id="image_upload">
                                    </div>
                                    <!-- Form Group (submit)-->
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-success btn-block">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('profile', [auth()->user()->username]) }}">Back to Your Profile</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <x-footer type="dark"/>
    </div>
</div>
@endsection