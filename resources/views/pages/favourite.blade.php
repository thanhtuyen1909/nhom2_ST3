@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Sản phẩm yêu thích</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Sản phẩm yêu thích</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container" id="favourite">
        <div class="row" >
            @if(count($data['favourite']) > 0)
            @foreach($data['favourite'] as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="{{URL::to('/')}}/img/image_sql/products/<?= $item->filename ?>">
                        <ul class="product__item__pic__hover">
                        <?php $temp = false; ?>
                            @foreach($data['check'] as $check)
                            @if($check == $item->id)
                            <li id="favourite<?= $item->id ?>"><a  onclick="AddFavourite(<?= $item->id ?>)" href="javascript:" style="background-color: #7fad39;"><i class="fa fa-heart"></i></a></li>
                            <?php $temp = true; ?>
                            @break;
                            @endif
                            @endforeach
                            @if($temp == false)
                            <li><a id="favourite<?= $item->id ?>" onclick="AddFavourite(<?= $item->id ?>)" href="javascript:"><i class="fa fa-heart"></i></a></li>
                            @endif
                            <li><a href="javascript:"><i class="fa fa-retweet"></i></a></li>

                            <li><a onclick="AddCart(<?= $item->id ?>,1)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>

                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="./shop-details/{{$item->id}}">{{ $item->name }}</a></h6>
                        <h5>{{number_format($item->price)}} VND</h5>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <span> Không có sản phẩm yêu thích!!! </span>
            @endif
        </div>

    </div>
    </div>
</section>
<!-- Shoping Cart Section End -->
@endsection