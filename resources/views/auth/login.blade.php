@extends('auth.layout')

@section('content')
    <div class="login-page">
        <div class="row">
            <div class="col-9 left-area">
                <img src="https://miro.medium.com/max/2625/1*qAX1633WKgkCBjW-7BICCA.jpeg" alt="">

            </div>

            <div class="col-3 right-area">

                <div class="login-content">
                    <div class="brand-logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('public/admin/assets/digizigs logo (2).png')}}" alt="" style="width: 150px;">
                         </a>
                    </div>

                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}" class="mg-b-20">
                            @csrf
                            <h5 class="info-title">Sign in to your account</h5>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                               <input type="text" class="form-control" name="email" placeholder="yourname@yourdomain.com" required="" autofocus value="{{ old('email') }}"/>
                               @if ($errors->has('email'))
                               <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                               </span>
                               @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                               <input type="password" class="form-control" name="password" placeholder="Enter your password" required="" />
                               @if ($errors->has('password'))
                               <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                               </span>
                               @endif
                            </div>

                            <div class="form-group">
                               <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="filled-in chk-col-pink">
                               <label for="rememberme">Remember Me</label>

                               @if (Route::has('password.request'))
                                  <a class="pull-right" href="">
                                      {{ __('Forgot Password?') }}
                                  </a>
                               @endif

                            </div>

                            <div>
                               <button class="btn btn-primary btn-login submit btn-sm pull-left form-control" style="margin-top: 5px;">Sign In</button>
                            </div>

                        </form>

                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">New to site?
                                <a href="{{ route('register') }}" class="to_register"> Create Account </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />

                        </div>
                        <p class="info">Your data will not be used outside of digizigs. By signing up you agree that your statistics may be used anonymously inside www.digizigs.com.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
