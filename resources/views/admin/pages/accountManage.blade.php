@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h2 class="tm-block-title">Danh sách quyền</h2>
        <p class="text-white">Accounts</p>
        @php
        $roles = DB::table('roles')->get();
        @endphp
        <select class="custom-select" id="select_id" onchange="roleChange()">
          <option value="0">-- Chọn quyền --</option>
          @foreach($roles as $role)
          <option value="{{$role->role_id}}">{{$role->role_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
  </div>
  <!-- row -->
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
      <h2 class="tm-block-title">Danh sách tài khoản</h2>
        <div class="tm-product-table-container">
          <table class="table table-hover tm-table-small tm-product-table">
            <thead>
              <tr>
                <th scope="col">USERNAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">CREATED AT</th>
              </tr>
            </thead>
            <tbody id="account-body">
              @php
              $user = DB::table('users')->join('roles', 'users.role_id', '=', 'roles.role_id')->orderByDesc('users.id', 'desc')->get();
              @endphp
              
              @foreach($user as $users)
              <tr>
                <td class="tm-product-name">{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td>{{$users->role_name}}</td>
                <td>{{$users->created_at}}</td>
                <td>{{$users->updated_at}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- table container -->
        <a href="{{ url('/admin/add-account') }}" class="btn btn-primary btn-block text-uppercase mb-3">THÊM TÀI KHOẢN MỚI</a>
      </div>
    </div>
  </div>
</div>
@endsection