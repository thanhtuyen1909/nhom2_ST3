@extends('master.layout')
@section('content')
<div class="container">
    <div class="row profile-content">
        <div class="col-lg-7">
            <div class="card-body border">
                <h3 class="profile-tittle">THÔNG TIN TÀI KHOẢN</h3>
                <form method="post" action="{{route('user.profile.update',$profile->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body-image">
                                <div class="image">
                                    <img id="imgUpload" src="{{URL::to('/')}}/img/image_sql/img_users/{{$profile->image}}" alt="profile picture" class="img-fluid d-block mx-auto" style="width: 150px">
                                </div>
                                <div class="custom-image">
                                    <input id="fileInput" name="fileInput" type="file" style="display:none;" onchange="readURL(this);" />
                                    <input class="btn btn-success btn-sm" value="ĐỔI ẢNH" onclick="document.getElementById('fileInput').click();" style="margin: 15px 0 0 15px; width: 150px" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Tên người dùng</label>
                                <input id="inputTitle" type="text" name="name" placeholder="Enter name" value="{{$profile->name}}" class="form-control">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-form-label">Địa chỉ email</label>
                                <input id="inputEmail" disabled type="email" name="email" placeholder="Enter email" value="{{$profile->email}}" class="form-control">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">UPDATE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card-body">
                <h3 class="profile-tittle-1">THÔNG TIN LIÊN QUAN</h3>
            </div>
        </div>
    </div>
</div>
@endsection