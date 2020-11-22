@extends('layouts.base')

@section('content')
<div id="layoutAuthentication" class="bg-gradient-primary-to-secondary pt-5">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <!-- Basic login form-->
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header justify-content-center"><h3 class="font-weight-light my-4">Login</h3></div>
                            <div class="card-body">
                                <!-- Login form-->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    
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
                                    <!-- Form Group (remember password checkbox)-->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input 
                                                class="custom-control-input" 
                                                type="checkbox" 
                                                name="remember" 
                                                id="remember" {{ old('remember') ? 'checked' : '' }}
                                            >
                                            <label class="custom-control-label" for="remeber">Remember password</label>
                                        </div>
                                    </div>
                                    <!-- Form Group (login box)-->
                                    <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
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
