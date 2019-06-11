@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="{{ asset('images/logo/logo.svg') }}" alt="Convene Logo" class="mb-3" width="75px">

                                <h1 class="h4 text-gray-900 mb-4">{{ __('Sign in to Convene') }}</h1>
                            </div>
                            <form class="user" id="login-form" name="login-form">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                                <button type="submit" form="login-form" formaction="{{ route('login') }}" formmethod="POST" class="btn btn-primary btn-user btn-block">
                                    {{ __('Login') }}
                                </button>
                            </form>
                            <hr>
                            @if (Route::has('password.request'))
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">{{ __('Forgot Your Password?') }}</a>
                            </div>
                            @endif
                            <div class="text-center">
                                <a class="small" href="register.html">{{ __('Create an Account') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
    </div>
@endsection
