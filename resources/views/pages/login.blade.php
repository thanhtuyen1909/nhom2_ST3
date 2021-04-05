@extends('master.layout-login')
@section('content')
<div class="container">
    <form class="form" id="login" method="POST" action="login.php">
        <h1 class="form__title">Đăng nhập</h1>
        <div class="form__message form__message--error"></div>
        <div class="form__input-group">
            <input type="text" name="username" class="form__input" autofocus placeholder="Username">
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" name="password" class="form__input" autofocus placeholder="Password">
            <div class="form__input-error-message"></div>
        </div>
        <button class="form__button" type="submit" name="submit">Continue</button>
        <p class="form__text">
            Bạn chưa có tài khoản? <a class="form__link" href="#" id="linkCreateAccount">Tạo tài khoản</a>
        </p>
    </form>
</div>
@endsection