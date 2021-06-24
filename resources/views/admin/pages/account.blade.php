@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  <!-- row -->
  <div class="tm-bg-primary-dark tm-block tm-block-settings">
    <h2 class="tm-block-title">Cài đặt tài khoản</h2>
    <form action="{{URL::to('/')}}/admin/editProfile" class="tm-signup-form row" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group col-lg-12">
        <div class="tm-product-img-edit mx-auto">
          <img id="imgUpload" src="{{URL::to('/')}}/img/image_sql/img_users/{{$user->image}}" alt="Product image" class="img-fluid d-block mx-auto" style="width: 200px; height: 200px">
        </div>
        <div class="form-group custom-file mt-3 mb-3">
          <input id="fileInput" name="fileInput" class="form-control validate" type="file" style="display:none;" onchange="readURL(this);" />
          <input style="width: 30%; margin: 0 auto" class="btn btn-primary btn-block mx-auto" value="THÊM ẢNH" onclick="document.getElementById('fileInput').click();" />
        </div>
      </div>
      <div class="form-group col-lg-6">
        <label for="name">Username</label>
        <input id="name" name="name" type="text" class="form-control validate" value="{{$user->name}}" />
      </div>
      <div class="form-group col-lg-6">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" readonly style="background-color: #54657d;" class="form-control validate" value="{{$user->email}}" />
      </div>
      <div class="form-group col-lg-12">
        <label class="tm-hide-sm">&nbsp;</label>
        <button type="submit" class="btn btn-primary btn-block text-uppercase" style="width: 30%; margin: 0 auto">
          Cập nhật
        </button>
      </div>
    </form>
    <div>
      <label class="tm-hide-sm">&nbsp;</label>
      <button class="btn btn-primary btn-block text-uppercase" onclick="goChangePage()" style="width: 30%; margin: 0 auto">
        Đổi mật khẩu
      </button>
    </div>
  </div>
</div>
@endsection