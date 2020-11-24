@extends('layouts.base')

@section('content')
<div id="layoutAuthentication" class="bg-gradient-primary-to-secondary pt-3">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <!-- Basic registration form-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center">
                                <h3 class="font-weight-light my-4">Create New Account</h3>
                                <p>It's quick and easy</p>
                            </div>
                            <div class="card-body">
                                <!-- Registration form-->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Form Group (name) -->
                                    <div class="form-group" >
                                        <label class="small mb-1" for="name">Name</label>
                                        <div>
                                            <input 
                                                id="name" 
                                                type="name" 
                                                placeholder="Enter first and last name" 
                                                class="form-control @error('name') is-invalid @enderror" 
                                                name="name" 
                                                value="{{ old('name') }}" 
                                                required autocomplete="name"
                                            >
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Group (username)            -->
                                    <div class="form-group">
                                        <label class="small mb-1" for="username">Username</label>
                                        <div>
                                            <input 
                                                id="username" 
                                                type="username" 
                                                placeholder="Enter username" 
                                                class="form-control @error('username') is-invalid @enderror" 
                                                name="username" 
                                                value="{{ old('username') }}" 
                                                required autocomplete="username"
                                            >
            
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Group (email address)            -->
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">E-Mail Address</label>
                                        <div>
                                            <input 
                                                id="email" 
                                                type="email" 
                                                placeholder="Enter email address" 
                                                class="form-control @error('email') is-invalid @enderror" 
                                                name="email" 
                                                value="{{ old('email') }}" 
                                                required autocomplete="email"
                                            >
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Form Row    -->
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <!-- Form Group (password)-->
                                            <div class="form-group">
                                                <label class="small mb-1" for="password">Password</label>
                                                <div>
                                                    <input 
                                                        id="password" 
                                                        type="password" 
                                                        placeholder="Enter password" 
                                                        class="form-control @error('password') is-invalid @enderror" 
                                                        name="password" 
                                                        value="{{ old('password') }}" 
                                                        required autocomplete="password"
                                                    >
                    
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Form Group (confirm password)-->
                                            <div class="form-group">
                                                <label class="small mb-1" for="password_confirmation">Confirm Password</label>
                                                <div>
                                                    <input 
                                                        id="password_confirmation" 
                                                        type="password" 
                                                        placeholder="Confirm Password" 
                                                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                                                        name="password_confirmation" 
                                                        value="{{ old('password_confirmation') }}" 
                                                        required autocomplete="password_confirmation"
                                                    >
                    
                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Form Group (create account submit)-->
                                    <div class="form-group mt-4 mb-0">
                                        <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="/login">Have an account? Go to login</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer mt-auto footer-dark">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                    <div class="col-md-6 text-md-right small">
                        <a href="#!">Privacy Policy</a>
                        &middot;
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection