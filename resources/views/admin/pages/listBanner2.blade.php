@if(count($banners) > 0)
@foreach($banners as $banner)
@if($banner->position_id == 3)
<tr>
    <th scope="row" style="padding-top: 25px;"><input type="checkbox" /></th>
    <td class="product-img"><img src="{{URL::to('/')}}/img/banner/<?= $banner->filename ?>" alt="" style="width: 80px; height: 80xp;"></td>
    <td style="padding-top: 25px; text-align: center">{{$banner->status}}</td>
    <td style="padding-top: 25px; text-align: center">{{$banner->created_at}}</td>
    <td style="padding-top: 25px; text-align: center">{{$banner->updated_at}}</td>
    <td style="padding-top: 15px;">
        <a href="{{URL::to('/')}}/admin/edit-banner/<?= $banner->id ?>" class="tm-product-delete-link">
            <i class="fas fa-pen tm-product-delete-icon"></i>
        </a>
    </td>
    <td style="padding-top: 15px;">
        <a onclick="deleteBanner2(<?= $banner->id ?>)" href="javascript:" class="tm-product-delete-link">
            <i class="far fa-trash-alt tm-product-delete-icon"></i>
        </a>
    </td>
</tr>
@endif
@endforeach
@endif