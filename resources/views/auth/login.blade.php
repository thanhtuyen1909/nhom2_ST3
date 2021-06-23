@extends('layouts.app')

@section('content')
<h1>Chào mừng quay trở lại OganiShop!</h1>
<div class="main-agileinfo">
    <div class="agileits-top">
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf
            <input id="email" class="text email @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" class="text pass @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button type="submit" class="btn-submit-form">
                {{ __('Đăng nhập') }}
            </button>
        </form>
        <p>Bạn chưa có tài khoản? <a href="{{URL::to('/')}}/register"> Đăng kí ngay!</a></p>
    </div>
</div>
@endsection