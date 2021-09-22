<div>
    
    <div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"> Tất cả slide</div>
                        <div class="col-md-6">
                            <a href="{{route('admin.addhomeslider')}}" class="btn btn-success pull-right">Thêm slide mới</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
            @endif
                    <table class="table table-striped">
                        <thead>
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Tiêu đề</th>
                                <th>Nội dung tiêu đề</th>
                                <th>Giá</th>
                                <th>Link</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as  $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td><img width="120" src="{{asset('assets/images/sliders')}}/{{$slider->image}}" alt=""></td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->subtitle}}</td>
                                <td>{{$slider->price}}</td>
                                <td>{{$slider->link}}</td>
                                <td>{{$slider->status ==1 ? 'Active':'Inactive'}}</td>
                                <td>{{$slider->created_at}}</td>
                                <td>
                            <a href="{{route('admin.edithomeslider',['slide_id'=>$slider->id])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                            <a href="#"onclick="confirm('Bạn có thực sự muốn xóa ?')||event.stopImmediatePropagation()" wire:click.prevent="deleteSlide({{$slider->id}})"><i class="fa fa-remove fa-2x text-danger" style="margin-left: 10px;"></i></a>
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
</div>
