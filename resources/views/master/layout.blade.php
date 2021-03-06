<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/logo.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" id="theme-style-css" href="https://themify.me/wp-content/themes/themify-v32/style.css" type="text/css" media="all"> -->
    <!-- <link rel="stylesheet" id="themify-media-queries-css" href="https://themify.me/wp-content/themes/themify-v32/media-queries.css" type="text/css" media="all"> -->
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ url('/home') }}"><img src="{{URL::to('/')}}/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
        </div>
        <div class="humberger__menu__widget">
            @if(Auth::check()==false)
            <div class="header__top__right__auth">
                <a href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
            </div>
            @else
            <div class="header__top__right__auth">
                <div class="header__top__right__language">
                    <div><i class="fa fa-user"> {{Auth::user()->name}}</i></div>
                    <ul>
                        <li><a href="{{url('setting')}}">Th??ng tin t??i kho???n</a></li>
                        <li><a href="{{url('listOrder')}}">????n h??ng</a></li>
                        <li><a href="{{url('logout')}}">Logout</a></li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
        <nav class="humberger__menu__nav mobile-menu" id="myDIV">
            <ul>
                <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/shop-grid') }}">C???a h??ng</a></li>
                <li><a href="{{ url('/contact') }}">Li??n h???</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="https://www.facebook.com/groups/231663862028818"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/"><i class="fa fa-twitter"></i></a>
            <a href="https://twitter.com/?lang=vi"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest-p"></i></a>
        </div>

        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> nhom2_ST3@gmail.com</li>
                <li>Mi???n ph?? giao h??ng t??? 1.000.000 ?????ng</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> nhom2_ST3@gmail.com</li>
                                <li>Mi???n ph?? giao h??ng t??? 1.000.000 ?????ng</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>

                            @if(Auth::check() == false)
                            <div class="header__top__right__auth">
                                <a href="{{url('login')}}"><i class="fa fa-user"></i> Login</a>
                            </div>
                            @else
                            <div class="header__top__right__auth">
                                <div class="header__top__right__language">
                                    <div><i class="fa fa-user"> {{Auth::user()->name}}</i></div>
                                    <ul style="width: 200px; left: -50px;">
                                        <li><a href="{{route('user.profile')}}">Th??ng tin t??i kho???n</a></li>
                                        <li><a href="{{route('user.change.password')}}">?????i m???t kh???u</a></li>
                                        <li><a href="{{url('listOrder')}}">????n h??ng</a></li>
                                        <li><a href="{{url('logout')}}">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/home') }}"><img src="{{URL::to('/')}}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu" id="myDIV">
                        <ul>
                            <li id="index" class="active"><a href="{{ url('/home') }}">Home</a></li>
                            <li id="shop-grid"><a href="{{ url('/shop-grid') }}">C???a h??ng</a></li>
                            <li id="contact"><a href="{{ url('/contact') }}">Li??n h???</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @if(Session::has("Login") != null)
                            @if(Session::has("Favourite") != null)
                            <li><a href="{{ url('/favourite') }}"><i class="fa fa-heart"></i> <span id="favourite-quantity">{{Session::get('Favourite')}}</span></a></li>
                            @else
                            <li><a href="{{ url('/favourite') }}"><i class="fa fa-heart"></i> <span id="favourite-quantity">0</span></a></li>
                            @endif
                            <li class="cart-icon"><a href="{{ url('/shoping-cart') }}"><i class="fa fa-shopping-bag"></i>
                                    @if(Session::has("Cart") != null)
                                    <span id="total-quantity">{{Session::get("Cart")->totalQuantity}}</span>
                                    @else
                                    <span id="total-quantity">0</span>
                                    @endif
                                </a>
                                <div class="cart-hover">
                                    @if(Session::has("Cart") != null)
                                    <div id="change-item-cart">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    @foreach(Session::get("Cart")->product as $item)
                                                    <tr>
                                                        <td class="si-pic"><img class="img-cart" src="{{URL::to('/')}}/img/image_sql/products/<?= $item['productInfo']->filename ?>" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{number_format($item['productInfo']->price*(100-$item['productInfo']->sale)/100)}} VND x {{$item['quantity']}}</p>
                                                                <a href="{{URL::to('/')}}/shop-details/{{$item['productInfo']->id}}">
                                                                    <h6>{{$item['productInfo']->name}} </h6>
                                                                </a>
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
                                            <h5>{{number_format(Session::get("Cart")->totalPrice)}} VND</h5>
                                            <input hidden id="total-quantity-cart" type="number" value="{{Session::get('Cart')->totalQuantity}}">
                                        </div>
                                        <div class="select-button">
                                            <a onclick="clearCart();" class="primary-btn view-card" style="cursor:pointer">XO?? S???CH</a>
                                        </div>
                                    </div>
                                    @else
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>0 VND</h5>
                                        <input hidden id="total-quantity-cart" type="number" value="0">
                                    </div>
                                    @endif
                                </div>
                            </li>
                            @else
                            <li><a href="{{ url('/login') }}"><i class="fa fa-heart"></i> <span id="favourite-quantity">0</span></a></li>
                            <li class="cart-icon"><a href="{{ url('/login') }}"><i class="fa fa-shopping-bag"></i>
                                    @if(Session::has("Cart") != null)
                                    <span id="total-quantity">{{Session::get("Cart")->totalQuantity}}</span>
                                    @else
                                    <span id="total-quantity">0</span>
                                    @endif
                                </a>
                                <div class="cart-hover">
                                    @if(Session::has("Cart") != null)
                                    <div id="change-item-cart">
                                        <div class="select-items">
                                            <table>
                                                <tbody>
                                                    @foreach(Session::get("Cart")->product as $item)
                                                    <tr>
                                                        <td class="si-pic"><img class="img-cart" src="{{URL::to('/')}}/img/image_sql/products/<?= $item['productInfo']->filename ?>" alt=""></td>
                                                        <td class="si-text">
                                                            <div class="product-selected">
                                                                <p>{{number_format($item['productInfo']->price)}} VND x {{$item['quantity']}}</p>
                                                                <a href="{{URL::to('/')}}/shop-details/{{$item['productInfo']->id}}">
                                                                    <h6>{{$item['productInfo']->name}} </h6>
                                                                </a>
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
                                            <h5>{{number_format(Session::get("Cart")->totalPrice)}} VND</h5>
                                            <input hidden id="total-quantity-cart" type="number" value="{{Session::get('Cart')->totalQuantity}}">
                                        </div>
                                    </div>
                                    @else
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>0 VND</h5>
                                        <input hidden id="total-quantity-cart" type="number" value="0">
                                    </div>
                                    @endif

                                </div>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Lo???i s???n ph???m</span>
                        </div>
                        <ul>
                            @foreach($data['protype'] as $value)
                            <li><a href="{{URL::to('/')}}/classifiProduct/<?= $value->type_id ?>">{{ $value->type_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('getSearch') }}" method="POST">
                                @csrf
                                <input type="text" placeholder="T??? kh??a..." name="key">
                                <button type="submit" class="site-btn">T??M</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 0123 456 789</h5>
                                <span>H??? tr??? 24/7</span>
                            </div>
                        </div>
                    </div>
                    @yield('banner')
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    @yield('content')

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ url('/home') }}"><img src="{{URL::to('/')}}/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 53 V?? V??n Ng??n, Linh Chi???u, Th??? ?????c</li>
                            <li>Phone: +84 0123 456 789</li>
                            <li>Email: nhom2_ST3@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Th??ng tin h???u ??ch</h6>
                        <ul>
                            <li><a href="#">V??? ch??ng t??i</a></li>
                            <li><a href="#">V??? c???a h??ng c???a ch??ng t??i</a></li>
                            <li><a href="#">Mua s???m an to??n</a></li>
                            <li><a href="#">Th??ng tin giao h??ng</a></li>
                            <li><a href="#">Ch??nh s??ch b???o m???t</a></li>
                            <li><a href="#">?????a ch??? Map</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Ch??ng t??i l?? ai?</a></li>
                            <li><a href="#">D???ch v??? c???a ch??ng t??i l?? g???</a></li>
                            <li><a href="#">Nh???ng d??? ??n c???a ch??ng t??i</a></li>
                            <li><a href="./contact">Li??n h???</a></li>
                            <li><a href="#">Thay ?????i m???i</a></li>
                            <li><a href="#">Ch???ng nh???n</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia b???n tin c???a ch??ng t??i ngay b??y gi???!</h6>
                        <p>Nh???n th??ng tin v??? c???p nh???t v?? c??c ??u ????i ?????c bi???t m???i nh???t qua Email.</p>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com/groups/231663862028818"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                            <a href="https://twitter.com/?lang=vi"><i class="fa fa-twitter"></i></a>
                            <a href="https://www.pinterest.com/"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="{{URL::to('/')}}/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ URL::asset('js/mixitup.min.js') }}"></script>
    <script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/fontawesome.js') }}"></script>
    <link rel="stylesheet" id="themify-builder-animate-css" href="https://themify.me/wp-content/plugins/themify-popup/assets/animate.min.css" type="text/css" media="all">

    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript">
        function clearCart() {
            $.confirm({
                title: 'X??c nh???n!',
                content: 'B???n c?? ch???c ch???n mu???n xo?? s???ch gi??? h??ng ?',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: "{{URL::to('/')}}/DeleteAllItemCart/",
                            type: 'GET',
                        }).done(function(response) {
                            RenderCart(response);
                            alertify.success('???? xo?? s???n ph???m ra kh???i gi??? h??ng th??nh c??ng!');
                        })
                    },
                    cancel: function() {

                    }
                }
            });


        }

        function AddFavourite(id) {
            $.ajax({
                url: "{{URL::to('/')}}/addFavourite/" + id,
                dataType: 'html',
            }).done(function(response) {
                if (response == true) {
                    let a = parseInt(document.querySelector("#favourite-quantity").innerHTML);

                    a++;
                    $("#favourite-quantity").text("" + a);
                    alertify.success("???? th??m y??u th??ch");
                    if (document.querySelector("#favourite" + id) != null) {
                        document.querySelector("#favourite" + id).style.background = "#7fad39";
                    }
                    if (document.querySelector("#favourite-grid" + id) != null) {
                        document.querySelector("#favourite-grid" + id).style.background = "#7fad39";
                    }

                    if (document.querySelector("#favourite-product-grid" + id) != null) {
                        document.querySelector("#favourite-product-grid" + id).style.background = "#7fad39";
                    }
                    if (document.querySelector("#favourite-detail" + id) != null) {
                        document.querySelector("#favourite-detail" + id).style.background = "#7fad39";
                    }

                    if (document.querySelector("#favourite-product-detail" + id) != null) {
                        document.querySelector("#favourite-product-detail" + id).style.color = "#fb2410";
                    }
                } else {
                    DeleteFavourite(id);
                }
            });
        }

        function DeleteFavourite(id) {
            $.confirm({
                title: 'X??c nh???n!',
                content: 'B???n c?? ch???c ch???n mu???n xo?? s???n ph???m kh???i danh s??ch y??u th??ch ?',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: "{{URL::to('/')}}/DeleteFavourite/" + id,
                            method: 'GET',
                            dataType: 'html',
                        }).done(function(response) {
                            let a = parseInt(document.querySelector("#favourite-quantity").innerHTML);
                            a--;
                            $("#favourite-quantity").text("" + a);
                            $("#favourite").empty();
                            $("#favourite").html(response);
                            alertify.success('???? xo?? y??u th??ch');
                            if (document.querySelector("#favourite" + id) != null) {
                                document.querySelector("#favourite" + id).style.background = "#ffffff";
                            }
                            if (document.querySelector("#favourite-grid" + id) != null) {
                                document.querySelector("#favourite-grid" + id).style.background = "#ffffff";
                            }
                            if (document.querySelector("#favourite-product-grid" + id) != null) {
                                document.querySelector("#favourite-product-grid" + id).style.background = "#ffffff";
                            }
                            if (document.querySelector("#favourite-detail" + id) != null) {
                                document.querySelector("#favourite-detail" + id).style.background = "#ffffff";
                            }
                            if (document.querySelector("#favourite-product-detail" + id) != null) {
                                document.querySelector("#favourite-product-detail" + id).style.color = "#fff";
                            }
                        })
                    },
                    cancel: function() {

                    }
                }
            });

        }

        function AddCart(id, quantity = null) {
            if (quantity != null) {
                $.ajax({
                    url: "{{URL::to('/')}}/checkCart/" + id + "/" + quantity,
                    method: "GET"
                }).done(function(result) {
                    if (result == true) {
                        $.ajax({
                            url: "{{URL::to('/')}}/AddCart/" + id + "/" + quantity,
                            type: 'GET',
                        }).done(function(response) {
                            RenderCart(response);
                            alertify.success('Th??m v??o gi??? h??ng th??nh c??ng!');
                        });
                    } else {
                        alertify.error('V?????t qu?? c??n n???ng gi??? h??ng!');
                    }
                })
            } else {
                let temp = parseInt($("#detail-quantity").val());
                AddCart(id, temp);
            }
        }


        $("#change-item-cart").on("click", ".si-close i", function() {
            let id = $(this).data("id");
            $.confirm({
                title: 'X??c nh???n!',
                content: 'B???n c?? ch???c ch???n mu???n xo?? s???n ph???m kh???i gi??? h??ng ?',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: "{{URL::to('/')}}/Delete/" + id,
                            type: 'GET',

                        }).done(function(response) {
                            RenderCart(response);
                            alertify.success('???? xo?? s???n ph???m ra kh???i gi??? h??ng th??nh c??ng!');
                        });
                    },
                    cancel: function() {

                    }
                }
            });


        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quantity").text($("#total-quantity-cart").val());

            $.ajax({
                url: "{{URL::to('/')}}/listCart",
                dataType: 'html',
                success: function(response) {
                    if ($("#list-cart") != null) {
                        $("#list-cart").empty();
                        $("#list-cart").html(response);
                    }
                },
            });
        }

        function DeleteItemListCart(id) {
            $.confirm({
                title: 'X??c nh???n!',
                content: 'B???n c?? ch???c ch???n mu???n xo?? s???n ph???m kh???i gi??? h??ng ?',
                buttons: {
                    confirm: function() {
                        $.ajax({
                            url: "{{URL::to('/')}}/DeleteItemCart/" + id,
                            type: 'GET',
                        }).done(function(response) {
                            RenderListCart(response);
                            alertify.success('???? xo?? s???n ph???m ra kh???i gi??? h??ng th??nh c??ng!');
                        });
                    },
                    cancel: function() {

                    }
                }
            });

        }

        function RenderListCart(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);
            $("#total-quantity").text($("#list-cart-quantity").val());
            $.ajax({
                url: "{{URL::to('/')}}/cartInfo",
                dataType: 'html',
                success: function(response) {
                    $("#change-item-cart").html(response);
                },
            });
        }

        function UpdateCart(id) {
            $.ajax({
                url: "{{URL::to('/')}}/UpdateCart/" + id + '/' + $("#item-quantity-" + id).val(),
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                alertify.success('???? c???p nh???t!');
            })
        }

        function DeleteOneOfItemInListCart(id) {
            $.ajax({
                url: "{{URL::to('/')}}/DeleteOneOfItemCart/" + id,
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                alertify.success('???? xo?? s???n ph???m ra kh???i gi??? h??ng th??nh c??ng!');
            });
        }

        $(document).ready(function() {
            load_comment();

            function load_comment() {
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/loadComment')}}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#_comment_show').html(data);
                    }
                });
            };

            $('.send-comment').click(function() {
                var product_id = $('.comment_product_id').val();
                var comment_content = $('.comment-content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/postComment')}}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        comment_content: comment_content,
                        _token: _token
                    },
                    success: function(data) {
                        load_comment();
                        $('.comment-content').val('')
                        alertify.success('???? th??m b??nh lu???n!');
                    }
                });
            });

            $('.site-btn').click(function() {
                var contact_name = $('.contact_name').val();
                var contact_sdt = $('.contact_sdt').val();
                var contact_email = $('.contact_email').val();
                var contact_title = $('.contact_title').val();
                var contact_content = $('.contact_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{URL::to('/sendContact')}}",
                    method: "POST",
                    data: {
                        contact_name: contact_name,
                        contact_sdt: contact_sdt,
                        contact_email: contact_email,
                        contact_title: contact_title,
                        contact_content: contact_content,
                        _token: _token
                    },
                    success: function(data) {
                        $('.contact-form').html();
                        $('.contact_name').val('')
                        $('.contact_sdt').val('')
                        $('.contact_email').val('')
                        $('.contact_title').val('')
                        $('.contact_content').val('')
                        $('.contact').html();
                        alertify.success('C???m ??n b???n ???? g???i l???i g??p ?? t???i ch??ng t??i! L???i g??p ?? c???a b???n s??? l?? m???t ph???n ?????ng l???c ????? th??c ?????y ch??ng t??i d???n ho??n thi???n v?? ph??t tri???n h??n.');
                    }
                });
            });
        })

        function Login() {
            var string = location.href;
            window.location = string.slice(0, string.indexOf("public") + "public/".length) + "login";
        }

        function load_comment() {
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/loadComment')}}",
                method: "POST",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    $('#_comment_show').html(data);
                }
            });
        };

        function getReply(id, idSP) {
            var comment_content = $('.comment-content-reply-' + id).val();
            var product_id = idSP
            var comment_id = id;
            var checkLogin = $('#imgUser').attr("src").indexOf("user.png");
            if (checkLogin < 0) {
                $.ajax({
                    url: "{{url('/replyComment')}}",
                    method: "GET",
                    data: {
                        product_id: product_id,
                        comment_content: comment_content,
                        comment_id: comment_id
                    },
                    success: function(data) {
                        load_comment();
                        $('.comment-content-reply-' + id).val('');
                        alertify.success('???? th??m b??nh lu???n!');
                    }
                });
            } else {
                Login();
            }
        }

        function showReply(id) {
            var node = document.querySelector('.replies-' + id);
            var display = node.style.display;
            node.style.display = display == "none" ? 'block' : "none";
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgUpload').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        // lay duong dan trang web
        const href = document.location.href;

        // cat duong dan thanh mot mang va lay gia tri cuoi, de dem ra so sanh
        const index = href.split("/")[href.split("/").length - 1];

        // neu duong dan khong ton tai ky tu nao la index thi khong hien thi mau xanh
        if (href.indexOf("home") < 0) {
            document.querySelector("#index").classList.remove('active');
        }

        if (index == "") {
            document.querySelector("#index").classList.add('active');
        }

        // cac cau lenh iff phia duoi nay thi NGUOC LAI
        if (href.indexOf(document.querySelector("#shop-grid").id) >= 0) {
            document.querySelector("#shop-grid").classList.add('active');
        }
        if (href.indexOf(document.querySelector("#contact").id) >= 0) {
            document.querySelector("#contact").classList.add('active');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
</body>

</html>