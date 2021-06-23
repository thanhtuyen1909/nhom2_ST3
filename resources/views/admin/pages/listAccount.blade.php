@foreach($user as $users)
<tr>
    <td class="tm-product-name">{{$users->name}}</td>
    <td>{{$users->email}}</td>
    <td>{{$users->role_name}}</td>
    <td>{{$users->created_at}}</td>
    <td>{{$users->updated_at}}</td>
</tr>
@endforeach