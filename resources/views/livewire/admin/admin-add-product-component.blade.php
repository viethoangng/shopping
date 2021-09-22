<div>
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                Thêm sản phẩm mới
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.products')}}" class="btn btn-success pull-right">Tất cả sản phẩm</a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                    @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
            @endif
                        <form class="form-horizontal" enctype="multipart/form-data" wire:submit.prevent="addProduct">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tên sản phẩm</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Tên sản phẩm" class="form-control input-md" wire:model="name" wire:keyup="generateSlug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Đường dẫn sản phẩm</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="url sản phẩm" class="form-control input-md" wire:model="slug">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô tả ngắn</label>
                            <div class="col-md-4" wire:ignore>
                                <textarea class="form-control"id="short_description" placeholder="Mô tả ngắn" wire:model="short_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Mô tả</label>
                            <div class="col-md-4"wire:ignore>
                                <textarea class="form-control" id="description" placeholder="Mô tả" wire:model="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Giá sản phẩm</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Giá sản phẩm" class="form-control input-md" wire:model="regular_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Giá sale</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Giá sale" class="form-control input-md"wire:model="sale_price">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">SKU</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="SKU" class="form-control input-md" wire:model="SKU">
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="col-md-4 control-label">Kho hàng</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="stock_status">
                                    <option value="instock">InStock</option>
                                    <option value="outofstock">Out of Stock</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Featured</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="featured">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Số lượng</label>
                            <div class="col-md-4">
                                <input type="text" placeholder="Số lượng" class="form-control input-md" wire:model="quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Ảnh sản phẩm</label>
                            <div class="col-md-4">
                                <input type="file"  class="input-file" wire:model="image">
                                @if ($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120">
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Danh mục</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="category_id">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Tạo sản phẩm</button>
                            </div>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('scripts')
<script>
    $(function(){
    tinymce.init({
        selector: '#short_description',
        setup:function(editor){
            editor.on('Change',function(e){
              tinyMCE.triggerSave();
              var sd_data=$('#short_description').val();
              @this.set('short_description',sd_data);
            });
        }
        });
    tinymce.init({
        selector: '#description',
        setup:function(editor){
            editor.on('Change',function(e){
              tinyMCE.triggerSave();
              var d_data=$('#description').val();
              @this.set('description',d_data);
            });
        }
        });
    });
    
  </script>
@endpush