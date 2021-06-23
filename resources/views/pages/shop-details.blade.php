@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thông tin sản phẩm</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="#">{{ $data['product'][0]->type_name }}</a>
                        <span>{{ $data['product'][0]->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    @if($data['product'][0]->sale > 0)
                    <div class="product__details__discount__percent">-{{$data['product'][0]->sale}}%</div>
                    @endif
                    <div class="product__details__pic__item">
                        @foreach($data['product'] as $item)
                        @if($item->photo_feature == 1)
                        <img class="product__details__pic__item--large img-fluid" src="../img/image_sql/products/<?= $item->filename ?>" alt="">
                        @endif
                        @endforeach
                    </div>
                    <div class="product__details__pic__slider owl-carousel">
                        @foreach($data['product'] as $item)
                        @if($item->photo_feature == 0)
                        <img class="img-fluid" src="../img/image_sql/products/<?= $item->filename ?>" alt="" style="width: 120px; height: 120px;">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3 style="padding-bottom: 15px; border-bottom: 1px solid #ebebeb">{{ $data['product'][0]->name }}</h3>
                    <!-- <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(18 reviews)</span>
                    </div> -->
                    <div class="product__details__price">{{number_format($data['product'][0]->price*(100-$data['product'][0]->sale)/100)}} VND
                        @if($data['product'][0]->sale > 0)
                        <span>{{number_format($data['product'][0]->price)}} VND</span>
                        @endif
                    </div>
                    <p>{{ $data['product'][0]->description }}</p>
                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                                <span class="dec qtybtn">-</span>
                                <input id="detail-quantity" type="text" value="1">
                                <span class="inc qtybtn">+</span>
                            </div>
                        </div>
                    </div>
                    @if(Session::get('Login') != null)
                    <a onclick="AddCart(<?= $data['product'][0]->id ?>)" href="javascript:" class="primary-btn">ADD TO CARD</a>
                    @else
                    <a href="{{url('login')}}" class="primary-btn">ADD TO CARD</a>
                    @endif
                    <?php $temp = false; ?>
                    @if(Session::get('Login') != null)
                    @if(isset($data['check']))
                    @foreach($data['check'] as $check)
                    @if($check == $data['product'][0]->id)
                    <a onclick="AddFavourite(<?= $data['product'][0]->id ?>)" href="javascript:" class="heart-icon" style="background-color: #7fad39;"><i id="favourite-product-detail<?= $data['product'][0]->id ?>" class="fa fa-heart" style="color: #fb2410;"></i></a>
                    <?php $temp = true; ?>
                    @break;
                    @endif
                    @endforeach
                    @endif
                    @if($temp == false)
                    <a onclick="AddFavourite(<?= $data['product'][0]->id ?>)" href="javascript:" class="heart-icon" style="background-color: #7fad39;"><i id="favourite-product-detail<?= $data['product'][0]->id ?>" class="fas fa-heart"></i></a>
                    @endif
                    @else
                    <a href="{{url('login')}}" class="heart-icon" style="background-color: #7fad39;"><i id="favourite-product-detail<?= $data['product'][0]->id ?>" class="fas fa-heart"></i></a>
                    @endif
                    <ul>
                        <li><b>Giao hàng: </b> <span>01 ngày.</span></li>
                        <li><b>Cân nặng: </b> <span>{{ $data['product'][0]->weight }} kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Thông tin</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Thông tin sản phẩm</h6>
                                <p>{{ $data['product'][0]->information }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" aria-selected="false"><strong>Bình luận</strong></a>
                    </li>
                </ul>
                <div class="container-comment" style="width:50%; margin: 50px auto;">
                    <form action="#">
                        @csrf
                        <input type="hidden" name="comment_product_id" value="<?= $data['product'][0]->id ?>" class="comment_product_id">
                        <div class="bg-light p-2">
                            <div class="d-flex flex-row align-items-start">
                                <img class="rounded-circle" src="../img/image_sql/img_users/<?= $userIMG ?>" width="40">
                                <textarea class="form-control ml-1 shadow-none textarea comment-content" placeholder="Nhập bình luận..."></textarea>
                            </div>
                            <div class="mt-2 text-right">
                                @if(Auth::check() == true)
                                <button class="btn btn-success btn-sm shadow-none send-comment" type="button">Gửi bình luận</button>
                                @else
                                <button class='btn btn-success btn-sm shadow-none' onclick="Login();" type="button">Gửi bình luận</button>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form>
                        @csrf
                        <input type="hidden" name="comment_product_id" value="<?= $data['product'][0]->id ?>" class="comment_product_id">
                        <div id="_comment_show">

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($data['productRelate'] as $item)
            @if($data['product'][0]->id !== $item->id)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="../img/image_sql/products/<?= $item->filename ?>">
                        <ul class="product__item__pic__hover">
                            <?php $temp = false; ?>
                            @if(Session::get('Login') != null)
                            @if(isset($data['check']))
                            @foreach($data['check'] as $check)
                            @if($check == $item->id)
                            <li><a id="favourite<?= $item->id ?>" onclick="AddFavourite(<?= $item->id ?>)" href="javascript:" style="background-color: #7fad39;"><i class="fa fa-heart"></i></a></li>
                            <?php $temp = true; ?>
                            @break;
                            @endif
                            @endforeach
                            @endif
                            @if($temp == false)
                            <li><a id="favourite<?= $item->id ?>" onclick="AddFavourite(<?= $item->id ?>)" href="javascript:"><i class="fa fa-heart"></i></a></li>
                            @endif
                            @else
                            <li><a id="favourite<?= $item->id ?>" href="{{url('login')}}"><i class="fa fa-heart"></i></a></li>
                            @endif
                            <li><a href="javascript:"><i class="fa fa-retweet"></i></a></li>

                            @if(Session::get('Login') != null)
                            <li><a onclick="AddCart(<?= $item->id ?>, 1)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                            @else
                            <li><a href="{{url('login')}}"><i class="fa fa-shopping-cart"></i></a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><a href="./<?= $item->id ?>">{{$item->name}}</a></h6>
                        <h5>{{number_format($item->price)}} VND</h5>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
<!-- Related Product Section End -->
@endsection