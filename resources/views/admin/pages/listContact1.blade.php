@foreach ($data['listContact'] as $value)
<tr>
    @if($value->seen == 1)
    <th scope="row"><input type="checkbox" id="checkContact" value="{{$value->id}}" checked /></th>
    @else
    <th scope="row"><input type="checkbox" id="checkContact" value="{{$value->id}}" /></th>
    @endif
    <td>{{$value->tieude}}</td>
    <td>{{$value->noidung}}</td>
    <td>{{$value->hoten}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->sdt}}</td>
    <td>
        <a href="#" class="tm-product-delete-link"><i class="far fa-trash-alt tm-product-delete-icon"></i>
        </a>
    </td>
</tr>
@endforeach