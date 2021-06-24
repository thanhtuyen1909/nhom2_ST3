@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
@if($data !=null)
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Loại sản phẩm</h4>
                        <ul>
                            @foreach($data['protype'] as $value)
                            <li><a href="{{URL::to('/')}}/classifiProduct/<?= $value->type_id ?>">{{ $value->type_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Sản phẩm mới</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                    @foreach($data['proLast1'] as $value)
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/image_sql/products/<?= $value->filename ?>" alt="" style='width:100px'>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $value->name}}</h6>
                                            <span>{{ $value->price}} VND</span>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @foreach($data['proLast2'] as $value)
                                    <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="img/image_sql/products/<?= $value->filename ?>" alt="" style='width:100px'>
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $value->name}}</h6>
                                            <span>{{ $value->price}}</span>
                                        </div>
                                    </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount" style="border-bottom: 4px solid #7fad39;">
                    <div class="section-title product__discount__title">
                        <h2>Sản phẩm đang được giảm giá</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach($data['saleProduct'] as $value)
                            @if($value->sale > 0)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    <div class="product__discount__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                                        <div class="product__discount__percent">-{{$value->sale}}%</div>
                                        <ul class="product__item__pic__hover">
                                            <?php $temp = false; ?>
                                            @if(Session::get('Login') != null)
                                            @foreach($data['check'] as $check)
                                            @if($check == $value->id)
                                            <li><a id="favourite<?= $value->id ?>" onclick="AddFavourite(<?= $value->id ?>)" href="javascript:" style="background-color: #7fad39;"><i class="fa fa-heart"></i></a></li>
                                            <?php $temp = true; ?>
                                            @break;
                                            @endif
                                            @endforeach
                                            @if($temp == false)
                                            <li><a id="favourite<?= $value->id ?>" onclick="AddFavourite(<?= $value->id ?>)" href="javascript:"><i class="fa fa-heart"></i></a></li>
                                            @endif
                                            @else
                                            <li><a href="{{url('login')}}"><i class="fa fa-heart"></i></a></li>
                                            @endif
                                            <li><a href="javascript:"><i class="fa fa-retweet"></i></a></li>
                                            @if(Session::get('Login') != null)
                                            <li><a onclick="AddCart(<?= $value->id ?>,1)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                                            @else
                                            <li><a href="{{url('login')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>{{$value->type_name}}</span>
                                        <h5><a href="{{URL::to('/')}}/shop-details/{{$value->id}}">{{$value->name}}</a></h5>
                                        <div class="product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="section-title product__discount__title" style="text-align: center; padding-top: 30px">
                    <h4>Danh sách sản phẩm</h4>
                </div>
                <div class="row">
                    @foreach($data['productA'] as $value)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                                @if($value->sale > 0)
                                <div class="product__discount__percent">-{{$value->sale}}%</div>
                                @endif
                                <ul class="product__item__pic__hover">
                                    <?php $temp = false; ?>
                                    @if(Session::get('Login') != null)
                                    @foreach($data['check'] as $check)
                                    @if($check == $value->id)
                                    <li><a id="favourite<?= $value->id ?>" onclick="AddFavourite(<?= $value->id ?>)" href="javascript:" style="background-color: #7fad39;"><i class="fa fa-heart"></i></a></li>
                                    <?php $temp = true; ?>
                                    @break;
                                    @endif
                                    @endforeach
                                    @if($temp == false)
                                    <li><a id="favourite<?= $value->id ?>" onclick="AddFavourite(<?= $value->id ?>)" href="javascript:"><i class="fa fa-heart"></i></a></li>
                                    @endif
                                    @else
                                    <li><a href="{{url('login')}}"><i class="fa fa-heart"></i></a></li>
                                    @endif
                                    <li><a href="javascript:"><i class="fa fa-retweet"></i></a></li>
                                    @if(Session::get('Login') != null)
                                    <li><a onclick="AddCart(<?= $value->id ?>,1)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                                    @else
                                    <li><a href="{{url('login')}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}">{{$value->name}}</a></h6>
                                @if($value->sale > 0)
                                <div class="product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                                @else
                                <h5>{{number_format($value->price*(100-$value->sale)/100)}} VND</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-12">
                    {{$data['productA']->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!-- Product Section End -->
@endsection