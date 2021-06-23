@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  <!-- row -->
  <div class="row tm-content-row">
    <div class="tm-block-col tm-col-avatar">
      <div class="tm-bg-primary-dark tm-block tm-block-avatar">
        <h2 class="tm-block-title">Đổi ảnh đại diện</h2>
        <div class="tm-avatar-container">
          <img src="{{URL::to('/')}}/img/avatar.png" alt="Avatar" class="tm-avatar img-fluid mb-4" />
          <a href="#" class="tm-avatar-delete-link">
            <i class="far fa-trash-alt tm-product-delete-icon"></i>
          </a>
        </div>
        <button class="btn btn-primary btn-block text-uppercase">
          Tải lên ảnh mởi
        </button>
      </div>
    </div>
    <div class="tm-block-col tm-col-account-settings">
      <div class="tm-bg-primary-dark tm-block tm-block-settings">
        <h2 class="tm-block-title">Cài đặt tài khoản</h2>
        <form action="" class="tm-signup-form row">
          <div class="form-group col-lg-6">
            <label for="name">Username</label>
            <input id="name" name="name" type="text" class="form-control validate" value="{{Session::get('userAdmin')->name}}"/>
          </div>
          <div class="form-group col-lg-6">
            <label for="email">Email</label>
            <input id="email" name="email" type="email" style="background-color: #54657d;" disabled class="form-control validate" value="{{Session::get('userAdmin')->email}}"/>
          </div>
          <div class="form-group col-lg-6">
            <label class="tm-hide-sm">&nbsp;</label>
            <button class="btn btn-primary btn-block text-uppercase">
              Cập nhật
            </button>
          </div>
          <div class="form-group col-lg-6">
            <label class="tm-hide-sm">&nbsp;</label>
            <button class="btn btn-primary btn-block text-uppercase">
              Đổi mật khẩu
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection