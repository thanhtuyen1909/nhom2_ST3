@extends('admin.master.layout')
@section('content')
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <h2 class="tm-block-title">Góp ý</h2>
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">TIÊU ĐỀ</th>
                                <th scope="col">NỘI DUNG</th>
                                <th scope="col">HỌ TÊN</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody id="contact-body">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection