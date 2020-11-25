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
                                <h3 class="font-weight-light my-4">Edit Post</h3>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-warning shadow-sm" role="alert">
                                        @foreach ($errors->all() as $error)
                                            <div><i class="fas fa-exclamation-triangle mr-2"></i>{{ $error }}</div>
                                        @endforeach
                                    </div>
                                @endif
                                <!-- Edit post form-->
                                <form
                                    enctype="multipart/form-data" 
                                    method="POST" 
                                    action="{{ route('posts.show', [auth()->user()->username, $post->id ]) }}"
                                >
                                    @csrf
                                    @method('PUT')
                                    <!-- Form Group (content) -->
                                    <div class="form-group">
                                        <div>
                                            <textarea 
                                                class="form-control @error('content') is-invalid @enderror" 
                                                name="content" 
                                                id="content" 
                                                rows="6" 
                                                placeholder="Got something awesome to share? Write something here..."
                                            >{{ $post->content }}</textarea>
                                        </div>
                                    </div>
                                    <!-- Form group (image) -->
                                    {{-- <div class="form-group">
                                        <label for="image_src"> 
                                            <i class="fas fa-camera ml-1 mr-2"></i> 
                                            Swap an image (Optional)        
                                        </label>
                                        <input type="file" class="form-control-file" name="image_upload" id="image_upload">
                                    </div> --}}
                                    <!-- Form Group (save changes)-->
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-success btn-block">Save Changes</button>
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