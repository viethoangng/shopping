<div>
    <style>
        nav svg{height: 20px;};
        nav.hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Tất cả sản phẩm</div>
                            <div class="col-md-6">
                                <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Thêm sản phẩm mới</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                    @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
                     @endif
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Tình trạng</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                                <th>Danh mục</th>
                                <th>Ngày</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td><img src="{{asset('assets/images/products')}}/{{$product->image}}"width="60"></td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->stock_status}}</td>
                                        <td>{{$product->regular_price}}</td>
                                        <td>{{$product->sale_price}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                            <a href=""onclick="confirm('Bạn có thực sự muốn xóa ?')||event.stopImmediatePropagation()" style="padding-left: 10px;" wire:click.prenvent="deleteProduct({{$product->id}})"><i class="fa fa-remove fa-2x text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$products->links()}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
