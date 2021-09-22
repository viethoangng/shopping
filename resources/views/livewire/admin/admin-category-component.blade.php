<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class="container" style="padding: 30px 0;">
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6" style="font-weight: 600;padding: 6px;font-size: 16px;">Tất cả danh mục</div>
                    <div class="col-md-6">
                        <a href="{{route('admin.addcategory')}}" class="btn btn-primary pull-right">THÊM MỚI</a>
                    </div>
                </div>
            </div>
            <div class="panel-body">
            @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
            @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>TÊN DANH MỤC</th>
                            <th>ĐƯỜNG DẪN URL</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>
                                    <a href="{{route('admin.editcategory',['category_slug'=>$category->slug])}}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#"onclick="confirm('Bạn có thực sự muốn xóa ?')||event.stopImmediatePropagation()" wire:click.prevent="deleteCategory({{$category->id}})"><i class="fa fa-remove fa-2x text-danger" style="margin-left: 10px;"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
</div>
</div>
</div>
