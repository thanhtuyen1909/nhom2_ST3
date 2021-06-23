@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  @if(session()->has('success'))
  <div class="alert alert-success alert-posifixed">
    {{ session()->get('success') }}
  </div>
  @endif
  <div class="row tm-content-row" id="banner-body">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-products">
        <h2 class="tm-block-title">Danh sách banner chính</h2>
        <div class="tm-product-table-container">
          <table class="table table-hover tm-table-small tm-product-table">
            <thead>
              <tr>
                <th scope="col">&nbsp;</th>
                <th scope="col" style="width: 150px; text-align: center">HÌNH</th>
                <th scope="col" style="width: 150px; text-align: center">TIÊU ĐỀ PHỤ</th>
                <th scope="col" style="width: 150px; text-align: center">TIÊU ĐỀ</th>
                <th scope="col" style="width: 200px; text-align: center">MÔ TẢ</th>
                <th scope="col" style="width: 100px; text-align: center">STATUS</th>
                <th scope="col" style="text-align: center">NGÀY TẠO</th>
                <th scope="col" style="text-align: center">NGÀY SỬA</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
              </tr>
            </thead>
            <tbody id="banner-hero-body">
              @if(count($banners) > 0)
              @foreach($banners as $banner)
              @if($banner->position_id == 1)
              <tr>
                <th scope="row" style="padding-top: 50px;"><input type="checkbox" /></th>
                <td class="product-img"><img src="{{URL::to('/')}}/img/banner/<?= $banner->filename ?>" alt="" style="width: 150px; height: 100px;"></td>
                <td style="padding-top: 50px;">{{$banner->sub_title}}</td>
                <td style="padding-top: 50px;">{{$banner->title}}</td>
                <td style="padding-top: 50px;">{{$banner->description}}</td>
                <td style="padding-top: 50px; text-align: center">{{$banner->status}}</td>
                <td style="padding-top: 50px; text-align: center">{{$banner->created_at}}</td>
                <td style="padding-top: 50px; text-align: center">{{$banner->updated_at}}</td>
                <td style="padding-top: 40px;">
                  <a href="{{URL::to('/')}}/admin/edit-banner/<?= $banner->id ?>" class="tm-product-delete-link">
                    <i class="fas fa-pen tm-product-delete-icon"></i>
                  </a>
                </td>
                <td style="padding-top: 40px;">
                  <a onclick="deleteBanner(<?= $banner->id ?>)" href="javascript:" class="tm-product-delete-link">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                  </a>
                </td>
              </tr>
              @endif
              @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <a href="{{ url('/admin/add-banner') }}" class="btn btn-primary btn-block text-uppercase mb-3">Thêm banner chính</a>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <h2 class="tm-block-title">Danh sách banner phụ 1</h2>
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col" style="text-align: center">HÌNH</th>
                    <th scope="col" style="text-align: center">STATUS</th>
                    <th scope="col" style="text-align: center">NGÀY TẠO</th>
                    <th scope="col" style="text-align: center">NGÀY SỬA</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody id="banner-1-body">
                  @if(count($banners) > 0)
                  @foreach($banners as $banner)
                  @if($banner->position_id == 2)
                  <tr>
                    <th scope="row" style="padding-top: 25px;"><input type="checkbox" /></th>
                    <td class="product-img"><img src="{{URL::to('/')}}/img/banner/<?= $banner->filename ?>" alt="" style="width: 100px; height: 80xp;"></td>
                    <td style="padding-top: 25px; text-align: center">{{$banner->status}}</td>
                    <td style="padding-top: 25px; text-align: center">{{$banner->created_at}}</td>
                    <td style="padding-top: 25px; text-align: center">{{$banner->updated_at}}</td>
                    <td style="padding-top: 15px;">
                      <a href="{{URL::to('/')}}/admin/edit-banner/<?= $banner->id ?>" class="tm-product-delete-link">
                        <i class="fas fa-pen tm-product-delete-icon"></i>
                      </a>
                    </td>
                    <td style="padding-top: 15px;">
                      <a onclick="deleteBanner1(<?= $banner->id ?>)" href="javascript:" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="{{ url('/admin/add-banner') }}" class="btn btn-primary btn-block text-uppercase mb-3">Thêm banner phụ thứ nhất</a>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <h2 class="tm-block-title">Danh sách banner phụ 2</h2>
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col" style="text-align: center">HÌNH</th>
                    <th scope="col" style="text-align: center">STATUS</th>
                    <th scope="col" style="text-align: center">NGÀY TẠO</th>
                    <th scope="col" style="text-align: center">NGÀY SỬA</th>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody id="banner-2-body">
                  @if(count($banners) > 0)
                  @foreach($banners as $banner)
                  @if($banner->position_id == 3)
                  <tr>
                    <th scope="row" style="padding-top: 25px;"><input type="checkbox" /></th>
                    <td class="product-img"><img src="{{URL::to('/')}}/img/banner/<?= $banner->filename ?>" alt="" style="width: 100px; height: 80xp;"></td>
                    <td style="padding-top: 25px; text-align: center">{{$banner->status}}</td>
                    <td style="padding-top: 25px; text-align: center">{{$banner->created_at}}</td>
                    <td style="padding-top: 25px; text-align: center">{{$banner->updated_at}}</td>
                    <td style="padding-top: 15px;">
                      <a href="{{URL::to('/')}}/admin/edit-banner/<?= $banner->id ?>" class="tm-product-delete-link">
                        <i class="fas fa-pen tm-product-delete-icon"></i>
                      </a>
                    </td>
                    <td style="padding-top: 15px;">
                      <a onclick="deleteBanner2(<?= $banner->id ?>)" href="javascript:" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </a>
                    </td>
                  </tr>
                  @endif
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a href="{{ url('/admin/add-banner') }}" class="btn btn-primary btn-block text-uppercase mb-3">Thêm banner phụ thứ hai</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection