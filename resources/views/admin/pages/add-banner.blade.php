@extends('admin.master.layout')
@section('content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Thêm banner</h2>
          </div>
        </div>
        <form action="{{URL::to('/')}}/admin/addBanner" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
          @csrf
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <div class="form-group mb-3">
                <label for="name">Sub tiêu đề
                </label>
                <input id="name" name="sub_title" type="text" value="" class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="name">Tiêu đề
                </label>
                <input id="name" name="title" type="text" value="" class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="description">Mô tả</label>
                <textarea class="form-control validate tm-small" name="description" rows="4"></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="type_id">Trạng thái</label>
                <select class="custom-select tm-select-accounts" id="type_id" name="status">
                  <option value="active">Active</option>
                  <option value="inactive">Inactive</option>
                </select>
              </div>
              <div class="form-group mb-3">
                <label for="type-banner">Nơi hiển thị</label>
                <select class="custom-select tm-select-accounts" id="type-banner" name="type_banner">
                  @foreach($positions as $pos)
                  <option value="{{$pos->id}}">{{$pos->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-edit mx-auto">
                <img id="imgUpload" src="{{URL::to('/')}}/img/default-product.png" alt="Image" class="img-fluid d-block mx-auto">
              </div>
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
                <input class="btn btn-primary btn-block mx-auto" value="CHỌN ẢNH" onclick="document.getElementById('fileInput').click();" />
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase">THÊM BANNER</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection