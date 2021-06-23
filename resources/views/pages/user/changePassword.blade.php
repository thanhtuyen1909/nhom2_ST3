@extends('master.layout')
@section('content')
<div class="container">
    <div class="row profile-content">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h3 class="profile-tittle">ĐỔI MẬT KHẨU</h3>
                              <form method="POST" action="{{ route('user.changepass.save') }}">
                        @csrf
                        @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                        @endforeach
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu hiện tại</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Mật khẩu mới</label>
                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nhập lại mật khẩu mới</label>
                            <div class="col-md-6">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    UPDATE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection