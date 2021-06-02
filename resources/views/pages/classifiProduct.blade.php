@extends('master.layout')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Phân loại</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Trang chủ</a>
                        <a href="{{ url('/typeProduct') }}">Phân Loại</a>
                        <span>{{ $protype[0]->type_name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>{{ $protype[0]->type_name }}</h2>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($data['product'] as $item) 
            <div class="col-lg-3 col-md-4 col-sm-6 mix haisan inline-block">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{URL::to('/')}}/img/image_sql/products/{{ $item->filename }}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li> 
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a onclick="AddCart(<?= $item->id ?>)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{URL::to('/')}}/shop-details/{{ $item->id }}">{{ $item->name }}</a></h6>
                        <h5><?= number_format($item->price) ?> VND</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection