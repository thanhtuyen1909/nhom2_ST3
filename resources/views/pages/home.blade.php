@extends('master.layout')

@section('banner')
<div class="hero__item set-bg" data-setbg="img/hero/banner.jpg">
    <div class="hero__text">
        <span>THỰC PHẨM SẠCH</span>
        <h2>Rau củ <br />100% Organic</h2>
        <p>Miễn phí ship khi đạt giá trị đơn hàng từ 1.000.000 đồng</p>
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
                    <div class="categories__item set-bg" data-setbg="img/image_sql/categories/<?= $value['type_img'] ?>">
                        <h5><a href="#"><?= $value['type_name'] ?></a></h5>
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
                        <li class="active" data-filter="*">All</li>
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
            @if($value['type_id'] == 4 && $value['feature'] == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix haisan">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value['image'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="AddCart(<?= $value['id'] ?>)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value['name'] ?></a></h6>
                        <h5><?= number_format($value['price']) ?> VND</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value['type_id'] == 5 && $value['feature'] == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix bovatrung">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value['image'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="AddCart(<?= $value['id'] ?>)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value['name'] ?></a></h6>
                        <h5><?= number_format($value['price']) ?> VND</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value['type_id'] == 3 && $value['feature'] == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix traicayvahat">
                <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value['image'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="AddCart(<?= $value['id']?>)" href="javascript:" ><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value['name'] ?></a></h6>
                        <h5><?= number_format($value['price']) ?> VND</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value['type_id'] == 1 && $value['feature'] == 1)
            <div class="col-lg-3 col-md-3 col-sm-6 mix fresh-meat">
                <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value['image'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="AddCart(<?= $value['id']?>)" href="javascript:" ><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value['name'] ?></a></h6>
                        <h5><?= number_format($value['price']) ?> VND</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            @foreach($data['product'] as $value)
            @if($value['type_id'] == 2 && $value['feature'] == 1)
            <div class="col-lg-3 col-md-4 col-sm-6 mix raucu">
                <div class="featured__item">
                <div class="featured__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value['image'] ?>">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="AddCart(<?= $value['id']?>)" href="javascript:" ><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"><?= $value['name'] ?></a></h6>
                        <h5><?= number_format($value['price']) ?> VND</h5>
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
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="banner 1">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="img/banner/banner-1.jpg" alt="banner 2">
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
                                    <img src="img/image_sql/products/<?= $value['image']; ?>" class="rounded-circle" style="width: 150px;" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $value['name'] ?></h6>
                                    <span><?= number_format($value['price']) ?> VND</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                        <div class="latest-prdouct__slider__item">
                            @foreach($data['proLast2'] as $value)
                            <a href="{{URL::to('/')}}/shop-details/{{$value->id}}" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/image_sql/products/<?= $value['image']; ?>" class="rounded-circle" style="width: 150px;" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6><?= $value['name'] ?></h6>
                                    <span><?= number_format($value['price']) ?> VND</span>
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
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
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
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-1.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="img/latest-product/lp-2.jpg" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Crab Pool Security</h6>
                                    <span>$30.00</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
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