@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <h2 class="tm-block-title">Đơn hàng</h2>
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col" style="text-align: center">MÃ ĐƠN</th>
                                <th scope="col" style="text-align: center">USERNAME</th>
                                <th scope="col" style="text-align: center">TRẠNG THÁI</th>
                                <th scope="col" style="text-align: center">GIÁ TRỊ ĐƠN</th>
                                <th scope="col" style="text-align: center">NGÀY TẠO ĐƠN</th>
                            </tr>
                        </thead>
                        <tbody id="order-body">
                            @foreach($dataArray1 as $value)
                            <tr>
                                <td style="text-align: center" class="tm-product-name" data-id="{{$value['maDH']}}">#{{$value['maDH']}}</td>
                                <td style="text-align: center">{{$value['username']}}</td>
                                <td style="text-align: center">
                                    @if($value['status'] == "Đã nhận")
                                    <div class="tm-status-circle moving">
                                        @elseif($value['status'] == "Đã huỷ")
                                        <div class="tm-status-circle cancelled">
                                            @else
                                            <div class="tm-status-circle pending">
                                                @endif
                                            </div>{{$value['status']}}
                                </td>
                                <td style="text-align: center">{{number_format($value['totalPrice'])}} VND</td>
                                <td style="text-align: center">{{$value['created_at']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection