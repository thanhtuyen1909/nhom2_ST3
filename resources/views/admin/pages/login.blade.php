<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Ogani | Template Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/logo.ico') }}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <!-- CSS -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <!-- Default theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
  <!-- Semantic UI theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
  <!-- Bootstrap theme -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ URL::asset('css/templatemo-style.css') }}">
  <style>
    .imgPreview img {
      padding: 8px;
      max-width: 100px;
    }

    .alert-posifixed {
      position: fixed;
      bottom: -5px;
      right: 40px;
      padding-top: 17px;
      padding-bottom: 17px;
      z-index: 2;
    }

    .alert-success {
      border-radius: 2px;
      border: 0.5px solid #fff;
      background-color: #59ba76;
      color: #fff;
    }

    .tm-content-row {
      z-index: 1;
    }
  </style>
</head>

<body id="reportsPage">
  <div class="" id="home">
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Chào mừng quản trị viên!</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <form action="{{URL::to('/')}}/admin/toLogin" method="post" class="tm-login-form">
                  @csrf
                  <div class="form-group">
                    <label for="username">Email:</label>
                    <input name="email" type="text" class="form-control validate" id="email" value="" required />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password:</label>
                    <input name="password" type="password" class="form-control validate" id="password" value="" required />
                  </div>
                  <div class="form-group mt-3">
                    @if(session()->has('danger'))
                    <p style="color: red;">
                      {{ session()->get('danger') }}
                    </p>
                    @endif
                  </div>
                  <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary btn-block text-uppercase">
                      Đăng nhập
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>