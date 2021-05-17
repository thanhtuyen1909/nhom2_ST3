<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/logo.ico') }}" />
    <title>Ogani | Template</title>
    <style>
        .shoping__cart__item img {
            width: 100px;
        }

        .shoping__cart__table-empty {
            display: flex;
            align-items: center;
            flex-direction: column;

        }

        .msg {
            font-size: 3rem;
            color: #7fad39;
            text-align: center;
            font-weight: 600;
        }
    </style>

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
            <div class="header__top__right__auth">
                <a href="./login"><i class="fa fa-user"></i>Đăng nhập</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu" id="myDIV">
            <ul>
                <li class="active"><a href="{{ url('/home') }}">Home</a></li>
                <li><a href="{{ url('/shop-grid') }}">Cửa hàng</a></li>
                <li><a href="#">Trang</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ url('/shop-details/1') }}">Chi tiết</a></li>
                        <li><a href="{{ url('/shoping-cart') }}">Giỏ hàng</a></li>
                        <li><a href="{{ url('/checkout') }}">Thanh toán</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/contact') }}">Liên hệ</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> nhom2_ST3@gmail.com</li>
                <li>Miễn phí giao hàng từ 1.000.000 đồng</li>
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
                                <li>Miễn phí giao hàng từ 1.000.000 đồng</li>
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
                            <div class="header__top__right__auth">
                                <a href="./login"><i class="fa fa-user"></i>Đăng nhập</a>
                            </div>
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
                            <li id="shop-grid"><a href="{{ url('/shop-grid') }}">Cửa hàng</a></li>
                            <li id="page"><a href="#">Trang</a>
                                <ul class="header__menu__dropdown">
                                    <li id="shop-details"><a href="{{ url('/shop-details/1') }}">Chi tiết</a></li>
                                    <li id="shoping-cart"><a href="{{ url('/shoping-cart') }}">Giỏ hàng</a></li>
                                    <li id="checkout"><a href="{{ url('/checkout') }}">Thanh toán</a></li>
                                </ul>
                            </li>
                            <li id="contact"><a href="{{ url('/contact') }}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li class="cart-icon"><a href=""> <a href="{{ url('/shoping-cart') }}"><i class="fa fa-shopping-bag"></i></a>
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
                                                        <td class="si-pic"><img class="img-cart" src="{{URL::to('/')}}/img/image_sql/products/<?= $item['productInfo']->image ?>" alt=""></td>
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
                                    <div id="change-item-cart">
                                        <span>Giỏ hàng trống</span>
                                    </div>
                                    @endif
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
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
                            <span>Loại sản phẩm</span>
                        </div>
                        <ul>
                            @foreach($data['protype'] as $value)
                            <li><a href="#">{{ $value['type_name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="search.php" method="get">
                                <input type="text" placeholder="Từ khóa..." name="key">
                                <button type="submit" class="site-btn">TÌM</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+84 0123 456 789</h5>
                                <span>Hỗ trợ 24/7</span>
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
                            <li>Address: 53 Võ Văn Ngân, Linh Chiểu, Thủ Đức</li>
                            <li>Phone: +84 0123 456 789</li>
                            <li>Email: nhom2_ST3@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Thông tin hữu ích</h6>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Về cửa hàng của chúng tôi</a></li>
                            <li><a href="#">Mua sắm an toàn</a></li>
                            <li><a href="#">Thông tin giao hàng</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Địa chỉ Map</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Chúng tôi là ai?</a></li>
                            <li><a href="#">Dịch vụ của chúng tôi là gì?</a></li>
                            <li><a href="#">Những dự án của chúng tôi</a></li>
                            <li><a href="./contact">Liên hệ</a></li>
                            <li><a href="#">Thay đổi mới</a></li>
                            <li><a href="#">Chứng nhận</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Tham gia bản tin của chúng tôi ngay bây giờ!</h6>
                        <p>Nhận thông tin về cập nhật và các ưu đãi đặc biệt mới nhất qua Email.</p>
                        <form action="#">
                            <input type="text" placeholder="Nhập địa chỉ email...">
                            <button type="submit" class="site-btn">Đăng ký</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
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


    <script>
        function AddCart(id) {
            $.ajax({
                url: 'AddCart/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Thêm vào giỏ hàng thành công!');

            });
        }
        $("#change-item-cart").on("click", ".si-close i", function() {
            $.ajax({
                url: 'Delete/' + $(this).data("id"),
                type: 'GET',
            }).done(function(response) {
                RenderCart(response);
                alertify.success('Đã xoá sản phẩm ra khỏi giỏ hàng thành công!');

            });
        });

        function RenderCart(response) {
            $("#change-item-cart").empty();
            $("#change-item-cart").html(response);
            $("#total-quantity").text($("#total-quantity-cart").val());
        }

        function DeleteItemListCart(id) {
            $.ajax({
                url: 'DeleteItemCart/' + id,
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                alertify.success('Đã xoá sản phẩm ra khỏi giỏ hàng thành công!');

            })
        }

        function RenderListCart(response) {
            $("#list-cart").empty();
            $("#list-cart").html(response);
            $("#total-quantity").text($("#total-quantity-cart").val());
        }

        function UpdateCart(id) {
            $.ajax({
                url: 'UpdateCart/' + id + '/' + $("#item-quantity-" + id).val(),
                type: 'GET',
            }).done(function(response) {
                RenderListCart(response);
                alertify.success('Đã cập nhật!');
            })
        }
    </script>
    <script>
        // lay duong dan trang web
        const href = document.location.href;

        // cat duong dan thanh mot mang va lay gia tri cuoi, de dem ra so sanh
        const index = href.split("/")[href.split("/").length - 1];
        const index2 = href.split("/")[href.split("/").length - 2];

        // neu duong dan khong ton tai ky tu nao la index thi khong hien thi mau xanh
        if (index.indexOf("home") < 0) {
            document.querySelector("#index").classList.remove('active');
        }

        // cac cau lenh iff phia duoi nay thi NGUOC LAI
        if (index.indexOf(document.querySelector("#shop-grid").id) >= 0) {
            document.querySelector("#shop-grid").classList.add('active');
        }
        if (index.indexOf(document.querySelector("#contact").id) >= 0) {
            document.querySelector("#contact").classList.add('active');
        }

        // phan nay danh cho Trang, cho no mau xanh va hien thi thanh phan da click
        if (index2.indexOf(document.querySelector("#shop-details").id) >= 0) {
            document.querySelector("#page").classList.add('active');
        }
        if (index.indexOf(document.querySelector("#shoping-cart").id) >= 0) {
            document.querySelector("#page").classList.add('active');
        }
        if (index.indexOf(document.querySelector("#checkout").id) >= 0) {
            document.querySelector("#page").classList.add('active');
        }
    </script>
</body>

</html>