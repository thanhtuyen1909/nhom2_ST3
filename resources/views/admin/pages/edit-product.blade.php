@extends('admin.master.layout')
@section('content')
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Chỉnh sửa thông tin sản phẩm</h2>
          </div>
        </div>
        <form action="{{URL::to('/')}}/admin/upload/{{$data['product1'][0]->id}}" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
          @csrf
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <div class="form-group mb-3">
                <label for="name">Tên sản phẩm
                </label>
                <input id="name" name="name" type="text" value="{{$data['product1'][0]->name}}" class="form-control validate" />
              </div>
              <div class="form-group mb-3">
                <label for="description">Mô tả</label>
                <textarea class="form-control validate tm-small" name="description" rows="4" required>{{$data['product1'][0]->description}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label for="information">Giới thiệu</label>
                <textarea class="form-control validate tm-small" name="information" rows="4" required>{{$data['product1'][0]->information}}</textarea>
              </div>
              <div class="form-group mb-3">
                <label for="type_id">Loại sản phẩm</label>
                <select class="custom-select tm-select-accounts" id="type_id" name="type_id">
                  <option value="{{$data['product1'][0]->type_id}}" selected>{{$data['product1'][0]->type_name}}</option>
                  @foreach($data['protype'] as $item)
                  @if($item->type_name !== $data['product1'][0]->type_name)
                  <option value="{{$item->type_id}}">{{$item->type_name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="created_at">Ngày nhập
                  </label>
                  <input readonly id="created_at" name="created_at" type="text" value="{{date('d-m-Y', strtotime($data['product1'][0]->created_at))}}" class="form-control validate" data-large-mode="true" />
                </div>
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="weight">Cân nặng
                  </label>
                  <input id="weight" name="weight" type="text" value="{{$data['product1'][0]->weight}}" class="form-control validate" />
                </div>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="feature">Nổi bật</label>
                  <select class="custom-select tm-select-accounts" id="feature" name="feature">
                    @if($data['product1'][0]->feature == 1)
                    <option value="1" selected>Nổi bật</option>
                    <option value="0">Không</option>
                    @else
                    <option value="1">Nổi bật</option>
                    <option value="0" selected>Không</option>
                    @endif

                  </select>
                </div>
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="sale">Giảm giá
                  </label>
                  <input id="sale" name="sale" type="text" value="{{$data['product1'][0]->sale}}" class="form-control validate" />
                </div>
              </div>
              <div class="row">
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="amount">Số lượng
                  </label>
                  <input id="amount" name="amount" type="text" value="{{$data['product1'][0]->amount}}" class="form-control validate" />
                </div>
                <div class="form-group mb-3 col-xs-12 col-sm-6">
                  <label for="price">Giá
                  </label>
                  <input id="price" name="price" value="{{$data['product1'][0]->price}}" class="form-control validate" />
                </div>
              </div>

            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
              <div class="tm-product-img-edit mx-auto">
                  <?php $check = false ?>
                  @foreach($photos as $photo)
                  @if($photo->photo_feature == 1)
                  <?php $check = true ?>
                  <img id="imgUpload" src="{{URL::to('/')}}/img/image_sql/products/{{$photo->filename}}" alt="Product image" class="img-fluid d-block mx-auto">
                  @endif
                  @endforeach
                  @if($check == false)
                  <img id="imgUpload" src="" alt="Product image" class="img-fluid d-block mx-auto">
                  @endif
              </div>
              <div class="tm-product-img-edit mx-auto">
                <div class="imgPreview">
                  @foreach($photos as $photo)
                  @if($photo->photo_feature == 0)
                  <img src="{{URL::to('/')}}/img/image_sql/products/{{$photo->filename}}" alt="">
                  @endif
                  @endforeach
                </div>
              </div>
              <div class="custom-file mt-3 mb-3">
                <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
                <input class="btn btn-primary btn-block mx-auto" value="CHỌN ẢNH ĐẠI DIỆN" onclick="document.getElementById('fileInput').click();" />
                <input id="images" class="btn btn-primary btn-block mx-auto" value="CHỌN ẢNH" name="imageFile[]" type="file" multiple="multiple" />
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block text-uppercase">Cập nhật</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection