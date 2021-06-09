<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template Admin</title>
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('img/logo.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ URL::asset('css/templatemo-style.css') }}">
    <style>
        .imgPreview img {
            padding: 8px;
            max-width: 100px;
        }

        .alert-posifixed {
            position: fixed;
            bottom: -5px;
            right: 40px;
            padding-top: 17px;
            padding-bottom: 17px;
            z-index: 2;
        }

        .alert-success {
            border-radius: 2px;
            border: 0.5px solid #fff;
            background-color: #59ba76;
            color: #fff;
        }

        .tm-content-row {
            z-index: 1;
        }
    </style>
</head>

<body id="reportsPage">
    <div class="" id="home">
        <nav class="navbar navbar-expand-xl">
            <div class="container h-100">
                <a class="navbar-brand" href="{{URL::to('/')}}/admin/home">
                    <h1 class="tm-site-title mb-0">Product Admin</h1>
                </a>
                <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars tm-nav-icon"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto h-100">
                        <li id="index" class="nav-item active">
                            <a class="nav-link" href="{{ url('/admin/home') }}">
                                <i class="far fa-file-alt"></i>
                                Cập nhật gần đây
                            </a>
                        </li>
                        <li id="quanly" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tasks"></i>
                                <span>
                                    Quản lý <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a id="products" class="dropdown-item" href="{{ url('/admin/products') }}"><i class="fas fa-archive"></i> Sản phẩm - Loại sản phẩm</a>
                                <a id="donhang" class="dropdown-item" href="{{ url('/admin/') }}"><i class="fas fa-box"></i> Đơn hàng</a>
                                <a id="donhang" class="dropdown-item" href="{{ url('/admin/listContact') }}"><i class="fas fa-envelope-open-text"></i> Góp ý</a>
                            </div>
                        </li>
                        <li id="binhluan" class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-comments"></i>
                                Bình luận/Đánh giá
                            </a>
                        </li>
                        <li id="accountManage" class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/accountManage') }}">
                                <i class="fas fa-user-alt"></i>
                                Quản lý tài khoản
                            </a>
                        </li>
                        <li id="caidat" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-wrench"></i>
                                <span>
                                    Cài đặt <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a id="account" class="dropdown-item" href="{{ url('/admin/account') }}"><i class="fas fa-user-circle"></i> Thông tin cá nhân</a>
                                <a id="giaodien" class="dropdown-item" href="#"><i class="fas fa-tv"></i> Giao diện</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link d-block" href="{{ url('/admin/login') }}">
                                Admin, <b>Logout</b>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
        <footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved.

                    Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
                </p>
            </div>
        </footer>
    </div>

    <script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/Chart.min.js') }}"></script>
    <script src="{{ URL::asset('js/tooplate-scripts.js') }}"></script>
    <script src="{{ URL::asset('js/moment.min.js') }}"></script>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart,
            barChart, pieChart;
        // DOM is ready
        $(function() {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function() {
                updateLineChart();
                updateBarChart();
            });
        })
        $("#product-body").on("click", "tr .tm-product-name", function() {
            let a = $(this).data("id")
            window.location.href = "{{url('/admin/edit-product/')}}" + "/" + a;
        })
        $("#account-body").on("click", "tr .tm-product-name", function() {
            // let a = $(this).data("id")
            // window.location.href = "{{url('/admin/edit-product/')}}" + "/" + a;
            window.location.href = "{{url('/admin/edit-account/')}}";
        })
        $("#protype-body").on("click", ".tm-product-name", function() {
            let a = $(this).data("id")
            window.location.href = "{{url('/admin/edit-protype/')}}" + "/" + a;
        })
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        $('.imgPreview').empty();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imgUpload').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function deleteProduct(id) {
            $.ajax({
                url: "{{URL::to('/')}}/admin/deleteProduct/" + id,
                method: 'GET',
            }).done(function(response) {
                $("#product-body").empty();
                $("#product-body").html(response);
                alertify.success('Đã xoá sản phẩm!!!');
            });
        }

        function deleteProtype(id) {
            $.ajax({
                url: "{{URL::to('/')}}/admin/deleteProtype/" + id,
                method: 'GET',
            }).done(function(response) {
                $("#protype-body").empty();
                $("#protype-body").html(response);
                alertify.success('Đã xoá loại sản phẩm!!!');
            });
        }

        //checkbox in contact
        const checkBContact = document.querySelectorAll('#checkContact');

        checkBContact.forEach(element => {
            element.addEventListener('click', function() {
                if (this.checked) {
                    $.ajax({
                        url: "{{URL::to('/')}}/admin/updateSeen/" + element.value,
                        method: 'GET',
                    }).done(function(response) {
                        $("#contact-body").empty();
                        $("#contact-body").html(response);
                        alertify.success('Đã xem góp ý!!!');
                    });
                } else {
                    $.ajax({
                        url: "{{URL::to('/')}}/admin/updateSeen/" + element.value,
                        method: 'GET',
                    }).done(function(response) {
                        $("#contact-body").empty();
                        $("#contact-body").html(response);
                        alertify.success('Đã huỷ xem góp ý!!!');
                    });
                }
            });
        });
    </script>
    <script>
        // lay duong dan trang web
        const href = document.location.href;

        const index = href.split("/")[href.split("/").length - 1];

        if (index.indexOf("home") < 0) {
            document.querySelector("#index").classList.remove('active');
        }
        if (index.indexOf("admin") >= 0) {
            document.querySelector("#index").classList.add('active');
        }

        if (index == document.querySelector("#accountManage").id) {
            document.querySelector("#accountManage").classList.add('active');
        }

        if (href.indexOf("edit-account") >= 0) {
            document.querySelector("#accountManage").classList.add('active');
        }

        if (index == "add-account") {
            document.querySelector("#accountManage").classList.add('active');
        }

        if (href.indexOf("edit-product") >= 0) {
            document.querySelector("#quanly").classList.add('active');
        }

        if (index == "add-product") {
            document.querySelector("#quanly").classList.add('active');
        }

        if (index == document.querySelector("#products").id) {
            document.querySelector("#quanly").classList.add('active');
        }

        if (index == document.querySelector("#account").id) {
            document.querySelector("#caidat").classList.add('active');
        }
    </script>
</body>

</html>