@extends('admin.master.layout')
@section('content')
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Đổi mật khẩu</h2>
                    </div>
                </div>
                <form action="{{URL::to('/')}}/admin/changePass/<?= $email ?>" method="POST" class="tm-edit-product-form" enctype="multipart/form-data"> 
                    @csrf
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-3 col-lg-3">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group mb-3">
                                <label for="currentpassword">Mật khẩu hiện tại</label>
                                <input id="currentpassword" name="currentpassword" type="password" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="newpassword">Mật khẩu mới</label>
                                <input id="newpassword" name="newpassword" type="password" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="comfirmpassword">Nhập lại mật khẩu mới</label>
                                <input id="comfirmpassword" name="comfirmpassword" type="password" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                @if(session()->has('danger'))
                                <p style="color: red;">
                                    {{ session()->get('danger') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">CẬP NHẬT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection