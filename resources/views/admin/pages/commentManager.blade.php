@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
    <!-- row -->
    <div class="row tm-content-row">
        <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <h2 class="tm-block-title">Danh sách bình luận</h2>
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">Tên người gửi</th>
                                <th scope="col">Bình luận</th>
                                <th scope="col">Ngày gửi</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Quản lý</th>
                            </tr>
                        </thead>
                        <tbody id="comment-body">
                            @foreach($data['comment'] as $comment)
                            @if($comment->parent_id == 0)
                            <tr>
                                <th scope="row"><input value="{{$comment->id}}" class="multi-comment" type="checkbox" /></th>
                                <td><?= $comment->linkUser['name'] ?></td>
                                <td>{{$comment->comment}} <br>
                                    <ul style="list-style-type: decimal;">
                                        Trả lời:
                                        @foreach($data['comment'] as $key => $comm_reply)
                                        @if($comm_reply->parent_id == $comment->id)
                                        <li>{{$comm_reply->comment}}
                                            <a onclick="deleteComment(<?= $comm_reply->id ?>)" href="javascript:" style="width: 20px;">
                                                <i class="far fa-trash-alt tm-product-delete-icon" style="font-size: 1rem;"></i>
                                            </a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    <form action="#">
                                        @csrf
                                        <textarea class="form-control comment-content-reply-<?= $comment->id ?>" col="" rows="3"></textarea> <br>
                                        <button class="btn-sm" onclick="getReply(<?= $comment->id ?>, <?= $comment->idSP ?>)">Trả lời bình luận</button>
                                    </form>
                                </td>
                                <td>{{$comment->created_at}}</td>
                                <td><?= $comment->linkProduct['name'] ?></td>
                                <td>
                                    <a onclick="deleteComment(<?= $comment->id ?>)" href="javascript:" class="tm-product-delete-link">
                                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                    </a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <button onclick="deleteMultiComment()" class="btn btn-primary btn-block text-uppercase">
                    XOÁ BÌNH LUẬN ĐƯỢC CHỌN
                </button>
            </div>
        </div>
    </div>
</div>
@endsection