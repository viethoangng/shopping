<div>
<br>
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    SỬA DANH MỤC
                </div>
                <div class="col-md-6" style="padding-left: 35%;">
                    <a href="{{route('admin.categories')}}" class="btn btn-success">TẤT CẢ DANH MỤC</a>
                </div>
            </div>

        </div>
        <div class="panel-body">
            @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="updateCategory">
                <div class="form-group">
                    <label class="col-md-4 control-label">TÊN DANH MỤC</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="Tên danh mục" class="form-control input-md" wire:model="name" wire:keyup="generateslug">
                        @error('name')<p class="text-danger">{{$message}}</p>@enderror

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">TÊN URL</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="URL friendly" class="form-control input-md"wire:model="slug">
                        @error('slug')<p class="text-danger">{{$message}}</p>@enderror

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-danger">CẬP NHẬT</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
</div>
</div>
</div>
