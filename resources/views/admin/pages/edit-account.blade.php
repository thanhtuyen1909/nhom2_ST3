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
                <form action="{{URL::to('/')}}/admin/edit-account/<?= $id ?>" method="POST" class="tm-edit-product-form">
                    @csrf
                    <div class="row tm-edit-product-row">
                        <div class="col-xl-3 col-lg-3">
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control validate" required />
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block text-uppercase">LƯU THÔNG TIN TÀI KHOẢN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection