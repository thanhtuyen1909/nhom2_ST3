@extends('admin.master.layout')
@section('content')
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Sửa thông tin tài khoản</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="" class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="name">Username</label>
                                <input id="name" name="name" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input id="email" name="email" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Loại tài khoản</label>
                                <select class="custom-select tm-select-accounts" id="category">
                                    <option selected>- Chọn -</option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="expire_date">Ngày tạo</label>
                                    <input id="expire_date" name="expire_date" type="text" class="form-control validate" data-large-mode="true" />
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="update_date">Ngày cập nhật</label>
                                    <input id="update_date" name="update_date" type="text" class="form-control validate" data-large-mode="true" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-12">
                                    <button class="btn btn-primary btn-block text-uppercase" style="margin-top: 34px">Đổi mật khẩu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto">
                            <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('fileInput').click();"></i>
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" type="file" style="display:none;" />
                            <input type="button" class="btn btn-primary btn-block mx-auto" value="ĐỔI ẢNH ĐẠI DIỆN" onclick="document.getElementById('fileInput').click();" />
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block text-uppercase">LƯU THÔNG TIN TÀI KHOẢN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection