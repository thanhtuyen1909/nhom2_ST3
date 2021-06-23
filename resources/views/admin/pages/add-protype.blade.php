@extends('admin.master.layout')
@section('content')
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Thêm loại sản phẩm</h2>
                    </div>
                </div>
                <form action="{{URL::to('/')}}/admin/addProtype" class="tm-edit-product-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group mb-3">
                                <label for="name">Tên loại
                                </label>
                                <input id="name" name="name" value="" type="text" class="form-control validate" required />
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                            <div class="tm-product-img-edit mx-auto">
                                <img id="imgUpload" src="{{URL::to('/')}}/img/default-product.png" alt="Product image" class="img-fluid d-block mx-auto">
                            </div>
                            <div class="custom-file mt-3 mb-3">
                                <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
                                <input class="btn btn-primary btn-block mx-auto" value="THÊM ẢNH" onclick="document.getElementById('fileInput').click();" />
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">THÊM LOẠI SẢN PHẨM</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection