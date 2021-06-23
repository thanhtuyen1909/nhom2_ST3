@extends('master.layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Liên hệ</h2>
                    <div class="breadcrumb__option">
                        <a href="{{ url('/home') }}">Home</a>
                        <span>Liên hệ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Phone</h4>
                    <p>+84 0123 456 789</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Địa chỉ</h4>
                    <p>53 Võ Văn Ngân, P.Linh Chiểu, Q.Thủ Đức, TP.HCM</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Mở cửa</h4>
                    <p>10:00 am to 23:00 pm</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>nhom2_ST3@gmail.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4786145912058!2d106.755745014117!3d10.85115516077873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527bd532d45d9%3A0x6b46595d312dcffe!2zNTMgVsO1IFbEg24gTmfDom4sIExpbmggQ2hp4buDdSwgVGjhu6cgxJDhu6ljLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1622915313747!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <div class="map-inside" style="top:-5px; left:49.5%;">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>OganiShop</h4>
            <ul>
                <li>Phone: +84 0123 456 789</li>
                <li>Địa chỉ: 53 Võ Văn Ngân, P.Linh Chiểu, Q.Thủ Đức, TP.HCM</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Góp ý</h2>
                </div>
            </div>
        </div>
        <form action="#">
            @csrf
            <div class="row contact">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Điền họ & tên" class="contact_name">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Điền số điện thoại" class="contact_sdt">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Điền email" class="contact_email"> 
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Tiêu đề" class="contact_title">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Nội dung" class="contact_content"></textarea>
                    <button type="submit" class="site-btn">Gửi góp ý</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->
@endsection