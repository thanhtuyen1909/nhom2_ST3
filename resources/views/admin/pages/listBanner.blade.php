@if(count($banners) > 0)
@foreach($banners as $banner)
@if($banner->position_id == 1)
<tr>
    <th scope="row" style="padding-top: 50px;"><input type="checkbox" /></th>
    <td class="product-img"><img src="{{URL::to('/')}}/img/banner/<?= $banner->filename ?>" alt="" style="width: 100px; height: 100px;"></td>
    <td style="padding-top: 50px;">{{$banner->sub_title}}</td>
    <td style="padding-top: 50px;">{{$banner->title}}</td>
    <td style="padding-top: 50px;">{{$banner->description}}</td>
    <td style="padding-top: 50px; text-align: center">{{$banner->status}}</td>
    <td style="padding-top: 50px; text-align: center">{{$banner->created_at}}</td>
    <td style="padding-top: 50px; text-align: center">{{$banner->updated_at}}</td>
    <td style="padding-top: 40px;">
        <a href="{{URL::to('/')}}/admin/edit-banner/<?= $banner->id ?>" class="tm-product-delete-link">
            <i class="fas fa-pen tm-product-delete-icon"></i>
        </a>
    </td>
    <td style="padding-top: 40px;">
        <a onclick="deleteBanner(<?= $banner->id ?>)" href="javascript:" class="tm-product-delete-link">
            <i class="far fa-trash-alt tm-product-delete-icon"></i>
        </a>
    </td>
</tr>
@endif
@endforeach
@endif