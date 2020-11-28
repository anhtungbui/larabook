@extends('layouts.base')

@section('content')
<div id="layoutAuthentication" class="bg-gradient-primary-to-secondary pt-5">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <!-- Basic form for creating new post-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center">
                                <h3 class="font-weight-700 my-4">Edit Your Profile</h3>
                                <div class="font-weight-light pb-2">Tell the world a little bit about yourself</div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-warning shadow-sm" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <div><i class="fas fa-exclamation-triangle mr-2"></i>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif
                                <form
                                    enctype="multipart/form-data" 
                                    method="POST" 
                                    action="{{ route('profile', [auth()->user()->username]) }}"
                                >
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="bio">Bio (max 100 characters)</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('bio') is-invalid @enderror" 
                                            name="bio" 
                                            id="bio"
                                            placeholder="Describe who you are"
                                            value="{{ $user->profile->bio }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="hometown">Hometown</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('hometown') is-invalid @enderror" 
                                            name="hometown" 
                                            id="hometown"
                                            placeholder="Where are you from?"
                                            value="{{ $user->profile->hometown }}"
                                        >
                                    </div>
                                    <!-- Form Group (content) -->
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('location') is-invalid @enderror" 
                                            name="location" 
                                            id="location"
                                            placeholder="Where do you live?"
                                            value="{{ $user->profile->location }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('website') is-invalid @enderror" 
                                            name="website" 
                                            id="website"
                                            placeholder="Enter your website"
                                            value="{{ $user->profile->website }}"
                                        >
                                    </div>
                                    <!-- Form group (image) -->
                                    <div class="form-group">
                                        <label for="image_src">
                                            <i class="fas fa-camera ml-1 mr-2"></i>
                                            Upload your avatar (Optional)
                                        </label>
                                        <input type="file" class="form-control-file" name="image_upload" id="image_upload">
                                    </div>
                                    <!-- Form Group (create account submit)-->
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-success btn-block">Save</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('profile', [auth()->user()->username]) }}">Skip For Later</a></div>
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