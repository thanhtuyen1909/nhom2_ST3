<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" type="text/css">
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="{{ URL::asset('css/templatemo-style.css') }}">
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
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <i class="far fa-file-alt"></i>
                                Cập nhật gần đây
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">

                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-tasks"></i>
                                <span>
                                    Quản lý <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/admin/products') }}"><i class="fas fa-archive"></i> Sản phẩm - Loại sản phẩm</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-box"></i> Đơn hàng</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-comments"></i>
                                Bình luận/Đánh giá
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/admin/accountManage') }}">
                            <i class="fas fa-user-alt"></i>
                                Quản lý tài khoản
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-wrench"></i>
                                <span>
                                    Cài đặt <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/admin/account') }}"><i class="fas fa-user-circle"></i> Thông tin cá nhân</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-tv"></i> Giao diện</a>
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
            lineChart;
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
    </script>
    <script>
        $(function() {
            $(".tm-product-name").on("click", function() {
                window.location.href = "{{ url('/admin/edit-product') }}";
            });
        });
    </script>
    <script>
        $(function() {
            $("#expire_date").datepicker({
                defaultDate: "17/05/2021"
            });
        });
    </script>
</body>

</html>