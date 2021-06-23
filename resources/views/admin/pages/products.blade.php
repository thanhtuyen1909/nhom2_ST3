@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  @if(session()->has('success'))
  <div class="alert alert-success alert-posifixed">
    {{ session()->get('success') }}
  </div>
  @endif
  <div class="row tm-content-row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-products">
        <h2 class="tm-block-title">Sản phẩm <span style="padding-left: 30px; font-size: 15px; color: #f5a623;">{{count($product)}} sản phẩm</span></h2>
        <div class="tm-product-table-container">
          <table class="table table-hover tm-table-small tm-product-table">
            <thead>
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">TÊN SẢN PHẨM</th>
                <th scope="col">GIÁ</th>
                <th scope="col">LOẠI SẢN PHẨM</th>
                <th scope="col">SỐ LƯỢNG</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody id="product-body">
              @foreach($product as $item)
              <?php $check = true ?>
              <tr>
                <th scope="row" style="padding-top: 50px;"><input value="<?= $item->id ?>"  class="deleteMulti" type="checkbox" /></th>
                @foreach($photos as $photo)
                @if($photo->product_id == $item->id && $photo->photo_feature == 1)
                <?php $check = false ?>
                <td class="product-img"><img src="{{URL::to('/')}}/img/image_sql/products/{{$photo->filename}}" alt="" style="width: 100px; height: 100px;"></td>
                @endif
                @endforeach
                @if($check == true)
                <td class="product-img"><img src="" alt="" style="width: 100px; height: 100px;"></td>
                @endif
                <td class="tm-product-name" data-id="{{$item->id}}" style="padding-top: 50px;">{{$item->name}}</td>
                <td style="padding-top: 50px;">{{number_format($item->price)}}</td>
                <td style="padding-top: 50px;">{{$item->type_name}}</td>
                <td style="padding-top: 50px;">{{$item->amount}}</td>
                <td style="padding-top: 40px;">
                  <a onclick="deleteProduct(<?= $item->id ?>)" href="javascript:" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <a href="{{ url('/admin/add-product') }}" class="btn btn-primary btn-block text-uppercase mb-3">Thêm sản phẩm</a>
        <button onclick="deleteMulti()" class="btn btn-primary btn-block text-uppercase">
          Xoá sản phẩm được chọn
        </button>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
        <h2 class="tm-block-title">Loại sản phẩm</h2>
        <div class="tm-product-table-container">
          <table class="table tm-table-small tm-product-table">
            <tbody id="protype-body">
              @foreach($data['protype'] as $item)
              <tr>
                <td style="padding-top: 20px;" class="tm-product-name" data-id="{{$item->type_id}}">{{$item->type_name}}</td>
                <td class="text-center">
                  <a onclick="deleteProtype(<?= $item->type_id ?>)" href="javascript:" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <a href="{{ url('/admin/add-protype') }}" class="btn btn-primary btn-block text-uppercase mb-3">
          Thêm loại sản phẩm
        </a>
      </div>
    </div>
  </div>
</div>
@endsection