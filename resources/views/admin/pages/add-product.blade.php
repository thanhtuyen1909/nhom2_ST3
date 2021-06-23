@extends('admin.master.layout')
@section('content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Thêm sản phẩm</h2>
          </div>
        </div>
        <form action="{{URL::to('/')}}/admin/add" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
          @csrf
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <div class="form-group mb-3">
                <label for="name">Tên sản phẩm
                </label>
                <input id="name" name="name" type="text" value="" class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="description">Mô tả</label>
                <textarea class="form-control validate tm-small" name="description" rows="4" required></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="information">Giới thiệu</label>
                <textarea class="form-control validate tm-small" name="information" rows="4" required></textarea>
              </div>
              <div class="form-group mb-3">
                <label for="type_id">Loại sản phẩm</label>
                <select class="custom-select tm-select-accounts" id="type_id" name="type_id">
                  @foreach($data['protype'] as $item)
                  <option value="{{$item->type_id}}">{{$item->type_name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="created_at">Ngày nhập
                  </label>
                  <input readonly id="created_at" name="created_at" style="background-color: #54657d;" type="text" value="<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); echo date('Y-m-d H:i:s'); ?>" class="form-control validate" data-large-mode="true" />
                </div>
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="weight">Cân nặng
                  </label>
                  <input id="weight" name="weight" type="text" value="" class="form-control validate" />
                </div>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="feature">Nổi bật</label>
                  <select class="custom-select tm-select-accounts" id="feature" name="feature">
                    <option value="1">Nổi bật</option>
                    <option value="0" selected>Không</option>
                  </select>
                </div>
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="sale">Giảm giá
                  </label>
                  <input id="sale" name="sale" type="text" value="" class="form-control validate" />
                </div>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="amount">Số lượng
                  </label>
                  <input id="amount" name="amount" type="text" value="" class="form-control validate" />
                </div>
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="price">Giá
                  </label>
                  <input id="price" name="price" value="" class="form-control validate" />
                </div>
              </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-edit mx-auto">
                <img id="imgUpload" src="{{URL::to('/')}}/img/default-product.png" alt="Product image" class="img-fluid d-block mx-auto">
              </div>
              <div class="tm-product-img-edit mx-auto">
                <div class="imgPreview"> </div>
              </div>
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
                <input class="btn btn-primary btn-block mx-auto" value="CHỌN ẢNH ĐẠI DIỆN" onclick="document.getElementById('fileInput').click();" />
                <input id="images" class="btn btn-primary btn-block mx-auto" value="CHỌN ẢNH" name="imageFile[]" type="file" multiple="multiple" />
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase">THÊM SẢN PHẨM</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection