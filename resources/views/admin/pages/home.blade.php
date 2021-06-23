@extends('admin.master.layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <p class="text-white mt-5 mb-5">Welcome back, <b> {{Session::get('userAdmin')->name}}</b></p>
        </div>
    </div>
    <!-- row -->
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                <h2 class="tm-block-title">Bình luận</h2>
                <div class="tm-notification-items">
                    @foreach($data['comment'] as $key => $comment)
                    @if($key <= 25) @if($comment->parent_id == 0)
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle">
                                @if($comment->linkUser['image'] != null)
                                <img src="{{URL::to('/')}}/img/image_sql/img_users/<?= $comment->linkUser['image'] ?>" alt="Avatar Image" class="rounded-circle" style="width: 80px">
                                @else
                                <img src="{{URL::to('/')}}/img/notification-01.jpg" alt="Avatar Image" class="rounded-circle">
                                @endif
                            </div>
                            <div class="media-body">
                                <p class="mb-2"><b><?= $comment->linkUser['name'] ?></b> đã bình luận về sản phẩm <a href="#/" class="tm-notification-link"><?= $comment->linkProduct['name'] ?></a>. <a href="{{ url('/admin/commentManager') }}">Xem</a></p>
                                <span class="tm-small tm-text-color-secondary"><?= time_elapsed_string($comment->created_at); ?>.</span>
                            </div>
                        </div>
                        @else
                        @php $comm = DB::table('comment')->where('id', $comment->parent_id)->get();
                        $user = DB::table('users')->where('id', $comm[0]->idUser)->get();@endphp
                        <div class="media tm-notification-item">
                            <div class="tm-gray-circle">
                                @if($comment->linkUser['image'] != null)
                                <img src="{{URL::to('/')}}/img/image_sql/img_users/<?= $comment->linkUser['image'] ?>" alt="Avatar Image" class="rounded-circle" style="width: 80px">
                                @else
                                <img src="{{URL::to('/')}}/img/notification-01.jpg" alt="Avatar Image" class="rounded-circle">
                                @endif
                            </div>
                            <div class="media-body">
                                <p class="mb-2"><b><?= $comment->linkUser['name'] ?></b> đã trả lờI bình luận của <b><?= $user[0]->name ?></b> về sản phẩm <a href="#/" class="tm-notification-link"><?= $comment->linkProduct['name'] ?></a>. <a href="{{ url('/admin/commentManager') }}">Xem</a></p>
                                <span class="tm-small tm-text-color-secondary"><?= time_elapsed_string($comment->created_at); ?>.</span>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endforeach
                </div>
            </div>
        </div>
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
                <h2 class="tm-block-title">Danh sách đặt hàng</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="text-align: center">MÃ ĐƠN</th>
                            <th scope="col" style="text-align: center">USERNAME</th>
                            <th scope="col" style="text-align: center">TRẠNG THÁI</th>
                            <th scope="col" style="text-align: center">GIÁ TRỊ ĐƠN</th>
                            <th scope="col" style="text-align: center">NGÀY TẠO ĐƠN</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dataArray1 as $value)
                        <tr>
                            <td style="text-align: center" class="tm-product-name" data-id="{{$value['maDH']}}">#{{$value['maDH']}}</td>
                            <td style="text-align: center">{{$value['username']}}</td>
                            <td style="text-align: center">
                                @if($value['status'] == "Đã nhận")
                                <div class="tm-status-circle moving">
                                    @elseif($value['status'] == "Đã huỷ")
                                    <div class="tm-status-circle cancelled">
                                        @else
                                        <div class="tm-status-circle pending">
                                            @endif
                                        </div>{{$value['status']}}
                            </td>
                            <td style="text-align: center">{{number_format($value['totalPrice'])}} VND</td>
                            <td style="text-align: center">{{$value['created_at']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

<?php
function time_elapsed_string($datetime, $full = false)
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'năm',
        'm' => 'tháng',
        'w' => 'tuần',
        'd' => 'ngày',
        'h' => 'giờ',
        'i' => 'phút',
        's' => 'giây',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v;
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' trước' : 'bây giờ';
}
?>