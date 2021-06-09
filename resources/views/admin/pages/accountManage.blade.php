@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <h2 class="tm-block-title">Danh sách tài khoản</h2>
        <p class="text-white">Loại tài khoản</p>
        <select class="custom-select">
          <option value="0">Select account</option>
          @if(count($data['listRole']) > 0)
          @foreach($data['listRole'] as $value)
          <option value="<?= $value->role_id ?>">{{$value->role_name}}</option>
          @endforeach
          @endif
        </select>
      </div>
    </div>
  </div>
  <!-- row -->
  <div class="row tm-content-row">
    <div class="col-12 tm-block-col">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="tm-product-table-container">
          <table class="table table-hover tm-table-small tm-product-table">
            <thead>
              <tr>
                <th scope="col">NAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ROLE</th>
                <th scope="col">UPDATED AT</th>
                <th scope="col">CREATED AT</th>
              </tr>
            </thead>
            @if(count($data['listAcc']) > 0)
            <tbody id="account-body">
              @foreach($data['listAcc'] as $value)
              <tr>
                <td class="tm-product-name">{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->role_name}}</td>
                <td>{{$value->updated_at}}</td>
                <td>{{$value->created_at}}</td>
              </tr>
              @endforeach
            </tbody>
            @else
            <tbody id="account-body">
            </tbody>
            @endif
          </table>
        </div>
        <!-- table container -->
        <a href="{{ url('/admin/add-account') }}" class="btn btn-primary btn-block text-uppercase mb-3">THÊM TÀI KHOẢN MỚI</a>
      </div>
    </div>
  </div>
</div>
@endsection