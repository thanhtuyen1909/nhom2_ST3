@extends('layouts.app')

@section('content')
<h1>Đăng kí tài khoản</h1>
<div class="main-agileinfo">
    <div class="agileits-top">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input id="name" class="text @error('name') is-invalid @enderror" type="text" name="name" placeholder="Username" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="email" class="text email pass  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" class="text pass @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password-confirm" class="text w3lpass pass" type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
            <button type="submit" class="btn-submit-form">
                {{ __('Đăng ký') }}
            </button>
        </form>
        <p>Bạn đã có tài khoản? <a href="{{URL::to('/')}}/login"> Đăng nhập!</a></p>
    </div>
</div>
@endsection