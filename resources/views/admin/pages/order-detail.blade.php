@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <h2 class="tm-block-title">Mã đơn hàng: #{{$id}}</h2>
                <div class="location-ship">
                    <p>Địa chỉ: {{$dataArray1[0]['diachi']}}</p>
                    <p>Họ tên người nhận: {{$dataArray1[0]['hoten']}}</p>
                    <p>Số điện thoại: {{$dataArray1[0]['sdt']}}</p>
                    <p>Ghi chú: {{$dataArray1[0]['ghichu']}}</p>
                </div>
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px;">&nbsp;</th>
                                <th scope="col" style="width: 250px; text-align: center">TÊN SẢN PHẨM</th>
                                <th scope="col" style="width: 80px; text-align: center">SỐ LƯỢNG</th>
                                <th scope="col" style="width: 80px; text-align: center">THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataArrayCTDH1 as $value)
                            <tr>
                                <td class="product-img"><img src="{{URL::to('/')}}/img/image_sql/products/<?= $value['photo'] ?>" alt="" style="width: 50px; height: 50px;"></td>
                                <td style="text-align: center">{{$value['nameSP']}}</td>
                                <td style="text-align: center">{{$value['amount']}}</td>
                                <td style="text-align: center">{{$value['price']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block">
                <h2 class="tm-block-title">Khách hàng</h2>
                <div class="">
                    <div class="img-customer">
                        <img src="{{URL::to('/')}}/img/image_sql/img_users/<?= $dataArray1[0]['userimg'] ?>" alt="" style="width: 200px; height: 200px;">
                    </div>
                    <p>Tên đăng nhập: {{$dataArray1[0]['username']}}</p>
                    <p>Eamil: {{$dataArray1[0]['gmail']}}</p>
                </div>
            </div>
            @php
            $status = DB::table('status')->get();
            @endphp
            <div class="tm-bg-primary-dark tm-block-1" style="margin-top: 25px">
                <h2 class="tm-block-title">Trạng thái</h2>
                <div class="tm-select-status">
                    <select class="custom-select" id="select_id" onchange="changeStatus()">
                        <option value="0">-- Chọn trạng thái --</option>
                        @foreach($status as $value)
                        @if($value->status_id == $dataArray1[0]['status'])
                        <option value="{{$value->status_id}}" selected>{{$value->status_title}}</option>
                        @else
                        <option value="{{$value->status_id}}">{{$value->status_title}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-12" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-primary btn-block text-uppercase" onclick="download()">IN PHIẾU</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection