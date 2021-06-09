@extends('master.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
                <h2>KẾT QUẢ TÌM KIẾM</h2>
            </div>
        </div>
    </div>
    <div class="row">
        @if(isset($data))
        @foreach($data['product1'] as $value)
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
                <div class="product__item__pic set-bg" data-setbg="img/image_sql/products/<?= $value->filename ?>" style="height: 320px; background-size: cover; background-position: center;"> 
                    @if($value->sale > 0)
                    <div class="product__discount__percent">-{{$value->sale}}%</div>
                    @endif
                    <ul class="product__item__pic__hover">
                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                        <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                        <li><a onclick="AddCart(<?= $value->id ?>)" href="javascript:"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6><a href="{{URL::to('/')}}/shop-details/{{$value->id}}"> {{ $value->name }}</a></h6>
                    <h5><?= number_format($value->price) ?> VND</h5>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection