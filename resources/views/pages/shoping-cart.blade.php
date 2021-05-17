@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Shopping Cart</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Shopping Cart</span>
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
                @if(Session::has("Cart") != null)
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get("Cart")->product as $item)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/image_sql/products/{{$item['productInfo']->image}}" alt="">
                                    <h5>{{$item['productInfo']->name}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                    {{number_format($item['productInfo']->price)}} VND
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                        <input id="item-quantity-<?= $item['productInfo']->id ?>" onchange="UpdateCart(<?= $item['productInfo']->id ?>)" type="text" value="{{$item['quantity']}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    {{number_format($item['productInfo']->price*$item['quantity'])}} VND
                                </td>
                                <td class="shoping__cart__item__close">
                                    <span onclick="DeleteItemListCart(<?= $item['productInfo']->id ?>)" class="fa fa-times"></span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                <div class="shoping__cart__table">
                    <div class="empty-cart">
                        <p>Oops! Cart is empty</p>
                        <img src="img/empty-cart.jpg" alt="" class="change-item-cart-img">
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="shoping__cart__btns">
                            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        </div>
                    </div>
                    <div class="col-lg-6 mr-auto">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                <li>Total Price <span>0 VND</span></li>

                            </ul>
                            <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection