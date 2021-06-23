@foreach($data['comment'] as $comment)
@if($comment->parent_id == 0)
<tr>
    <th scope="row"><input type="checkbox" /></th>
    <td><?= $comment->linkUser['name'] ?></td>
    <td>{{$comment->comment}} <br>
        <ul style="list-style-type: decimal;">
            Trả lời:
            @foreach($data['comment'] as $key => $comm_reply)
            @if($comm_reply->parent_id == $comment->id)
            <li>{{$comm_reply->comment}}
                <a onclick="deleteComment(<?= $comm_reply->id ?>)" href="javascript:" style="width: 20px;">
                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
            </li>
            @endif
            @endforeach
        </ul>
        <form action="#">
            @csrf
            <textarea class="form-control comment-content-reply-<?= $comment->id ?>" id="" col="" rows="3"></textarea> <br>
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