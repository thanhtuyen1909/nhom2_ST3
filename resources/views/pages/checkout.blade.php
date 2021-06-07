@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Thông tin nhận hàng</h4>
            <form action="{{URL::to('/')}}/checkoutInput" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-5">
                        <div class="checkout__input">
                            <p>Họ & Tên <span>*</span></p>
                            <input type="text" placeholder="Điền Họ & Tên" require name="hoTen">
                        </div>
                        <div class="checkout__input">
                            <p>Số điện thoại <span>*</span></p>
                            <input type="text" placeholder="Điền số điện thoại" require name="soDT">
                        </div>
                        <div class="checkout__input">
                            <p>Địa chỉ giao hàng <span>*</span></p>
                            <input type="text" placeholder="Điền địa chỉ giao hàng" require name="diaChi">
                        </div>
                        <div class="checkout__input">
                            <p>Ghi chú</p>
                            <textarea name="" id="" cols="90" rows="3" placeholder="Lưu ý..." name="note"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-7">
                        <div class="checkout__order">
                            <h4>Danh sách mặt hàng</h4>
                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                            <ul>
                                @if(isset(Session::get("Cart")->product))
                                @foreach(Session::get("Cart")->product as $item)
                                <li>{{$item['productInfo']->name}} <span>{{number_format($item['productInfo']->price)}} VND</span></li>
                                @endforeach
                                @endif
                            </ul>
                            @if(isset(Session::get("Cart")->product))
                            <div class="checkout__order__total">Tổng cộng <span>{{number_format(Session::get("Cart")->totalPrice)}} VND</span></div>
                            @else
                            <div class="checkout__order__total">Tổng cộng <span>0 VND</span></div>
                            @endif
                            <p>Sau khi đặt hàng thành công chúng tôi sẽ liên hệ xác nhận đơn hàng với quý khách trước khi đơn hàng được chuyển đi.</p>
                            <button type="submit" class="site-btn">Đặt hàng</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection