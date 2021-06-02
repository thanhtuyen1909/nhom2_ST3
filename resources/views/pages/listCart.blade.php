@if(Session::has("Cart") != null)
<div class="shoping__cart__table">
    <table>
        <thead>
            <tr>
                <th class="shoping__product">Sản phẩm</th>
                <th>Đơn Giá</th>
                <th>Số Lượng</th>
                <th>Tổng</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach(Session::get("Cart")->product as $item)
            <tr>
                <td class="shoping__cart__item">
                    <img src="{{URL::to('/')}}/img/image_sql/products/{{$item['productInfo']->filename}}" alt="">
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
<div class="row">
    <div class="col-lg-6">
        <div class="shoping__cart__btns">
            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
        </div>
    </div>
    <div class="col-lg-6 mr-auto">
        <div class="shoping__checkout">
            <h5>Tổng giỏ hàng</h5>
            <ul>
                <li>Tổng tiền <span>{{number_format(Session::get("Cart")->totalPrice)}} VND</span></li>
                <input id="list-cart-quantity" type="number" hidden value="{{Session::get('Cart')->totalQuantity}}">
            </ul>
            <a href="#" class="primary-btn">Thanh toán</a>
        </div>
    </div>
</div>
@else
<div class="shoping__cart__table">
    <div class="empty-cart">
        <p>Oops! Cart is empty</p>
        <img src="img/empty-cart.jpg" alt="" class="change-item-cart-img">
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="shoping__cart__btns">
            <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
        </div>
    </div>
    <div class="col-lg-6 mr-auto">
        <div class="shoping__checkout">
            <h5>Tổng giỏ hàng</h5>
            <ul>
                <li>Tổng tiền <span>0 VND</span></li>
                <li><input hidden id="list-cart-quantity" type="number" value="0"></li>
            </ul>
            <a href="#" class="primary-btn">Thanh toán</a>
        </div>
    </div>
</div>
@endif

<script>
    var proQty = $('.pro-qty');
    proQty.prepend('<span class="dec qtybtn">-</span>');
    proQty.append('<span class="inc qtybtn">+</span>');
    proQty.on('click', '.qtybtn', function() {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });
</script>