@extends('client.layout.master')
@section('content')
    <section class="section-account parallax bg-11">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <h2>LOGIN ACCOUNT</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                    <form action="{{route('postlogin')}}" class="account_form" method="post">
                        @csrf
                        <div class="field-form">
                            <input type="text" class="field-text" placeholder="Email" name="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-form">
                            <input type="password" class="field-text" placeholder="Password" name="password">
                            <span class="view-pass"><i class="lotus-icon-view"></i></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="field-form field-submit">
                            <button class="awe-btn awe-btn-13" type="submit">Login</button>
                        </div>
                        <span class="account-desc">I don’t have an account  -  <a href="#">Forgot Password</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
