@extends('master.layout')

@section('banner')
@php
$bannerActives = DB::table('banner')->where([['status','active'], ['position_id', 1]])->get();
@endphp
<div class="hero__item set-bg" data-setbg="img/banner/<?= $bannerActives[0]->filename ?>">
    <div class="hero__text">
        <span>{{$bannerActives[0]->sub_title}}</span>
        <h2>{{$bannerActives[0]->title}}</h2>
        <p>{{$bannerActives[0]->description}}</p>
        <a href="./shop-grid" class="primary-btn">MUA NGAY</a>
    </div>
</div>
@endsection

@section('content')
<!-- Categories Section Begin -->
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($data['protype'] as $value)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="img/image_sql/categories/<?= $value->type_img ?>">
                        <h5><a href="{{URL::to('/')}}/classifiProduct/<?= $value->type_id ?>"><?= $value->type_name ?></a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="all">Tất cả</li>
                        <li data-filter=".raucu">Rau củ</li>
                        <li data-filter=".fresh-meat">Thịt sạch</li>
                        <li data-filter=".haisan">Hải sản</li>
                        <li data-filter=".bovatrung">Bơ và Trứng</li>
                        <li data-filter=".traicayvahat">Trái cây và Hạt</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row featured__filter">
            @foreach($data['product'] as $value)
            @if($value->type_id == 4 && $value->feature == 1 && $value->photo_feature == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix haisan">
                <div class="featured__item product__item">
                    <div class="featured__item__pic product__discount__item__pic  set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                        @if($value->sale > 0)
                        <div class="product__discount__percent">-{{$value->sale}}%</div>
                        @endif
                        <ul class="featured__item__pic__hover">
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
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value->name ?></a></h6>
                        @if($value->sale > 0)
                        <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                        @else
                        <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value->type_id == 5 && $value->feature == 1 && $value->photo_feature == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix bovatrung">
                <div class="featured__item">
                    <div class="featured__item__pic product__discount__item__pic  set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                        @if($value->sale > 0)
                        <div class="product__discount__percent">-{{$value->sale}}%</div>
                        @endif
                        <ul class="featured__item__pic__hover">
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
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value->name ?></a></h6>
                        @if($value->sale > 0)
                        <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                        @else
                        <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value->type_id == 3 && $value->feature == 1 && $value->photo_feature == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix traicayvahat">
                <div class="featured__item">
                    <div class="featured__item__pic product__discount__item__pic  set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                        @if($value->sale > 0)
                        <div class="product__discount__percent">-{{$value->sale}}%</div>
                        @endif
                        <ul class="featured__item__pic__hover">
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
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value->name ?></a></h6>
                        @if($value->sale > 0)
                        <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                        @else
                        <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value->type_id == 1 && $value->feature == 1 && $value->photo_feature == 1)
            <div class="col-lg-3 col-md-3 col-sm-6 mix fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic product__discount__item__pic  set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                        @if($value->sale > 0)
                        <div class="product__discount__percent">-{{$value->sale}}%</div>
                        @endif
                        <ul class="featured__item__pic__hover">
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
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value->name ?></a></h6>
                        @if($value->sale > 0)
                        <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                        @else
                        <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value->type_id == 2 && $value->feature == 1 && $value->photo_feature == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix raucu">
                <div class="featured__item">
                    <div class="featured__item__pic product__discount__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>">
                        @if($value->sale > 0)
                        <div class="product__discount__percent">-{{$value->sale}}%</div>
                        @endif
                        <ul class="featured__item__pic__hover">
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
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value->name ?></a></h6>
                        @if($value->sale > 0)
                        <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                        @else
                        <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
</section>
<!-- Featured Section End -->

<!-- Banner Begin -->

@php
$bannerActive1 = DB::table('banner')->where([['status','active'], ['position_id', 2]])->get();
$bannerActive2 = DB::table('banner')->where([['status','active'], ['position_id', 3]])->get();
@endphp

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic banner-1">
                    <img src="img/banner/<?= $bannerActive1[0]->filename ?>" alt="banner 1">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic banner-2">
                    <img src="img/banner/<?= $bannerActive2[0]->filename ?>" alt="banner 2">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="latest-product__text">
                    <h4>Latest Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            @foreach($data['proLast1'] as $value)
                            <a href="{{URL::to('/')}}/shop-details/{{$value->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/image_sql/products/<?= $value->filename; ?>" class="rounded-circle" style="width: 150px;" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $value->name ?></h6>
                                    @if($value->sale > 0)
                                    <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                                    @else
                                    <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                                    @endif
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach($data['proLast2'] as $value)
                            <a href="{{URL::to('/')}}/shop-details/{{$value->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/image_sql/products/<?= $value->filename; ?>" class="rounded-circle" style="width: 150px;" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $value->name ?></h6>
                                    @if($value->sale > 0)
                                    <div class="product__item__price product__details__price">{{number_format($value->price*(100-$value->sale)/100)}} VND <span>{{number_format($value->price)}} VND</span></div>
                                    @else
                                    <div class="product__item__price product__item__price">{{number_format($value->price*(100-$value->sale)/100)}} VND</div>
                                    @endif
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="latest-product__text">
                    <h4>Top Rated Products</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="javascript:" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="javascript:" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="javascript:" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="javascript:" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="javascript:" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="javascript:" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-3.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Latest Product Section End -->
@endsection