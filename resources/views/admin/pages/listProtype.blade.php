@foreach($data['protype'] as $item)
<tr>
    <td style="padding-top: 20px;" class="tm-product-name" data-id="{{$item->type_id}}">{{$item->type_name}}</td>
    <td class="text-center">
        <a onclick="deleteProtype(<?= $item->type_id ?>)" href="javascript:" class="tm-product-delete-link">
            <i class="far fa-trash-alt tm-product-delete-icon"></i>
        </a>
    </td>
</tr>
@endforeach