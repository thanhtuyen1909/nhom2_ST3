@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Lịch sử đơn hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Lịch sử đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" id="list-cart">
            @if(count($data['listOrder']) > 0)
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Đơn hàng</th>
                                <th>Số lượng sản phẩm</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['listOrder'] as $item)
                            <tr>
                                <td class="shoping__cart__item-1">
                                    <h5><a href="{{URL::to('/')}}/order-details/{{$item->id}}">{{$item->id}}</a></h5>
                                </td>
                                <td class="shoping__cart__price-1">
                                    {{$item->totalQuantity}}
                                </td>
                                <td class="shoping__cart__total-1">
                                <?= number_format($item->totalPrice)?> VND
                                </td>
                                <td class="shoping__cart__status">
                                    {{$item->status_title}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shoping__cart__btns">
                            <a href="{{ url('/shop-grid') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                </div>
                @else
                <div class="shoping__cart__table">
                    <div class="empty-cart">
                        <p>Chưa có đơn hàng</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shoping__cart__btns">
                            <a href="{{ url('/shop-grid') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
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