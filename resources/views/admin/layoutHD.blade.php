<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoá đơn OganiShop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Viaoda+Libre&display=swap" rel="stylesheet">
    <style>
    body {
    font-family: DejaVu Sans, sans-serif;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="tm-block-title" style="text-align: center;">OGANISHOP <br> Thực phẩm oganic</h2>

        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col" style="margin: 0 auto">
            <div class="location-ship" style="margin-left: 20px; font-size: 15px;">
                <p><strong>Địa chỉ:</strong> 53 Võ Văn Ngân, phường Linh Chiểu, quận Thủ Đức, thành phố Hồ Chí Minh</p>
                <p><strong>Số điện thoại liên hệ:</strong> 0123.456.789</p>
                <p><strong>Email:</strong> nhom2_ST3@gmail.com</p>
            </div>
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <h2 class="tm-block-title" style="text-align: center">Hoá đơn bán hàng</h2>
                <h6 class="tm-block-title" style="text-align: center">Mã đơn hàng: {{$id}}</h6>
                <div class="location-ship">
                    <p>Địa chỉ: {{$data['info'][0]->diachi}}</p>
                    <p>Họ tên người nhận: {{$data['info'][0]->hoten}}</p>
                    <p>Số điện thoại: {{$data['info'][0]->sdt}}</p>
                    <p>Ghi chú: {{$data['info'][0]->ghichu}}</p>
                </div>
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 50px; text-align: center">#</th>
                                <th scope="col" style="width: 300px; text-align: center">TÊN SẢN PHẨM</th>
                                <th scope="col" style="width: 100px; text-align: center">SỐ LƯỢNG</th>
                                <th scope="col" style="width: 250px; text-align: center">THÀNH TIỀN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @foreach($data['detail'] as $value)
                            <tr>
                                <td style="text-align: center">{{$i}}</td>
                                <td style="text-align: left">{{$value->linkProduct->name}}</td>
                                <td style="text-align: center">{{$value->soluong}}</td>
                                <td style="text-align: center">{{number_format($value->thanhtien)}} VND</td>
                            </tr>
                            <?php $i++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div  style="padding-top: 15px;">
                    Tổng cộng: {{number_format($data['DH']->totalPrice)}} VND
                </div>
                <div style="text-align: right; padding-top: 15px">
                    TP.HCM, ngày {{$time[2]}} tháng {{$time[1]}} năm {{$time[0]}} <br>
                    Người tạo hoá đơn <br>
                    <strong>OGANISHOP</strong>
                </div>
                <!-- table container -->
            </div>
        </div>
    </div>
</body>

</html>