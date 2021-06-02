@foreach($product as $item)
<?php $check = true ?>
<tr>
    <th scope="row" style="padding-top: 50px;"><input type="checkbox" /></th>
    @foreach($photos as $photo)
    @if($photo->product_id == $item->id && $photo->photo_feature == 1)
    <?php $check = false ?>
    <td class="product-img"><img src="{{URL::to('/')}}/img/image_sql/products/{{$photo->filename}}" alt="" style="width: 100px; height: 100px;"></td>
    @endif
    @endforeach
    @if($check == true)
    <td class="product-img"><img src="" alt="" style="width: 100px; height: 100px;"></td>
    @endif
    <td class="tm-product-name" data-id="{{$item->id}}" style="padding-top: 50px;">{{$item->name}}</td>
    <td style="padding-top: 50px;">{{number_format($item->price)}}</td>
    <td style="padding-top: 50px;">{{$item->type_name}}</td>
    <td style="padding-top: 50px;">{{$item->amount}}</td>
    <td style="padding-top: 40px;">
        <a onclick="deleteProduct(<?= $item->id ?>)" href="javascript:" class="tm-product-delete-link">
            <i class="far fa-trash-alt tm-product-delete-icon"></i>
        </a>
    </td>
</tr>
@endforeach