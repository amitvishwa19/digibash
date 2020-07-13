@extends('auth.layout')

@section('content')
<div class="container">
    <div class="media align-items-stretch justify-content-center ht-100p">
        <div class="sign-wrapper mg-lg-r-50 mg-xl-r-60">
        <div class="pd-t-20 wd-100p">
            <h4 class="tx-color-01 mg-b-5">Create New Account</h4>
            <p class="tx-color-03 tx-16 mg-b-40">It's free to signup and only takes a minute.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label>Email address *</label>
                    <input type="email" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your email address" name="email" value="{{ old('email') }}">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="mg-b-0-f">Password *</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" value="{{ old('password') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="mg-b-0-f">Confirm Password *</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="Confirm your password" name="password_confirmation" value="{{ old('password') }}">
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Firstname</label>
                    <input type="text" class="form-control @error('firstname') is-invalid @enderror" placeholder="Enter your firstname" name="firstname" value="{{ old('firstname') }}">
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Lastname</label>
                    <input type="text" class="form-control @error('lastname') is-invalid @enderror" placeholder="Enter your lastname" name="lastname" value="{{ old('lastname') }}">
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group tx-12">
                    By clicking <strong>Create an account</strong> below, you agree to our terms of service and privacy statement.
                </div><!-- form-group -->

                <button class="btn btn-brand-02 btn-block">Create Account</button>
            </form>

            <div class="tx-13 mg-t-20 tx-center">Already have an account? <a href="{{route('login')}}">Sign In</a></div>

        </div>
        </div><!-- sign-wrapper -->
        <div class="media-body pd-y-30 pd-lg-x-50 pd-xl-x-60 align-items-center d-none d-lg-flex pos-relative">
        <div class="mx-lg-wd-500 mx-xl-wd-550">
            <img src="https://via.placeholder.com/1280x1225" class="img-fluid" alt="">
        </div>
        </div><!-- media-body -->
    </div><!-- media -->
    </div>
@endsection
