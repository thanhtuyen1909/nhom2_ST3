@if(Session::has("Cart") != null)
    <div class="select-items">
        <table>
            <tbody>
                @foreach(Session::get("Cart")->product as $item)
                <tr>
                    <td class="si-pic"><img class="img-cart" src="img/image_sql/products/{{$item['productInfo']->image}}" alt=""></td>
                    <td class="si-text">
                        <div class="product-selected">
                            <p>{{number_format($item['productInfo']->price)}}₫ x {{$item['quantity']}}</p>
                            <h6>{{$item['productInfo']->name}} </h6>
                        </div>
                    </td>
                    <td class="si-close">
                        <i class="fa fa-times" data-id="{{$item['productInfo']->id}}"></i>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="select-total">
        <span>total:</span>
        <h5>{{number_format(Session::get("Cart")->totalPrice)}}₫</h5>
        <input hidden id="total-quantity-cart" type="number" value="{{Session::get('Cart')->totalQuantity}}">
    </div>
@else
    <span>Giỏ hàng trống</span>
@endif