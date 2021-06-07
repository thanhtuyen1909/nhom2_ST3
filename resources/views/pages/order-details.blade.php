@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Chi tiết đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Chi tiết đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h4>Địa chỉ nhận hàng</h4>
                <p style="padding-top: 30px;">Người đặt hàng: {{$thongTinNH[0]->hoten}}</p>
                <p>Số điện thoại: {{$thongTinNH[0]->sdt}}</p>
                <p>Địa chỉ: {{$thongTinNH[0]->diachi}}</p>
                <p>Ghi chú: {{$thongTinNH[0]->ghichu}}</p>
            </div>
            <div class="col-lg-5">
                <h4>Trạng thái đơn hàng</h4>
                <p class="status">{{$trangThaiDH[0]->status_title}}</p>
            </div>
        </div>
    </div>
</section>

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
                @if(count($listOrderDetail) > 0)
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th class="shoping__product">Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i=0; $i < count($listOrderDetail); $i++) <tr>
                                <td>
                                    <img src="../img/image_sql/products/{{$photo_product[$i][0]->filename}}" alt="" style="width:100px; height:100px;">
                                </td>
                                <td class="shoping__cart__item-1">
                                    <h5><a href="{{URL::to('/')}}/order-details/{{$listOrderDetail[$i]->idSP}}">{{$listOderDetailName[$i]}}</a></h5>
                                </td>
                                <td class="shoping__cart__price-1">
                                    {{$listOrderDetail[$i]->soluong}}
                                </td>
                                <td class="shoping__cart__total-1">
                                    <?= number_format($listOrderDetail[$i]->thanhtien) ?> VND
                                </td>
                                </tr>
                                @endfor
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shoping__cart__btns">
                            <a href="{{ url('/shop-grid') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__cart__btns" style="text-align: right;">
                            <a href="#" class="primary-btn cart-btn">REVIEW</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection