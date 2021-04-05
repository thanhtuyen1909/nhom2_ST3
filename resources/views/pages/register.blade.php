@extends('master.layout-login')
@section('content')
<div class="container">
    <form class="form" id="createAccount" method="POST" action="register.php" false>
        <h1 class="form__title">Tạo tài khoản</h1>
        <div class="form__message form__message--error"></div>
        <div class="form__input-group">
            <input type="text" id="username" name="username" class="form__input" autofocus placeholder="Username" require>
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="email" name="email" class="form__input" autofocus placeholder="Email Address" require>
            <div class="form__input-error-message"></div>
        </div>
        <div class="form__input-group">
            <input type="password" name="password" class="form__input" autofocus placeholder="Password" require>
            <div class="form__input-error-message"></div>
        </div>
        <button class="form__button" type="submit">Tiếp tục</button>
        <p class="form__text">
            Đã có tài khoản? <a class="form__link" href="./login.php" id="linkLogin">Đăng nhập</a>
        </p>
    </form>
</div>
@endsection