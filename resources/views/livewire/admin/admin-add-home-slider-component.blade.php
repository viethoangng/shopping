<div>
    <div class="container" style="padding:30px 0;">
       <div class="row">
           <div class="col-md-12">
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <div class="row">
                           <div class="col-md-6">
                               Thêm slide mới
                           </div>
                           <div class="col-md-6">
                               <a href="{{route('admin.homeslider')}}" class="btn btn-success pull-right">Tất cả slide</a>
                           </div>
                       </div>
                   </div>
                   <div class="panel-body">
                   @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
                 @endif
                       <form class="form-horizontal" wire:submit.prevent="addSlide">
                           <div class="form-group">
                               <label class="col-md-4 control-label">Tiêu đề</label>
                               <div class="col-md-4">
                                   <input type="text" placeholder="Tiêu đề" class="form-control input-md" wire:model="title">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-4 control-label">Nội dung Tiêu đề</label>
                               <div class="col-md-4">
                                   <input type="text" placeholder="Nội dung Tiêu đề" class="form-control input-md" wire:model="subtitle">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-4 control-label">Giá</label>
                               <div class="col-md-4">
                                   <input type="text" placeholder="Giá" class="form-control input-md" wire:model="price">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-4 control-label">Link</label>
                               <div class="col-md-4">
                                   <input type="text" placeholder="Link" class="form-control input-md"wire:model="link">
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-4 control-label">Image</label>
                               <div class="col-md-4">
                                   <input type="file" class="input-file" wire:model="image">
                                   <!-- chọn ảnh mới thì hiện ảnh mới, ko thì hiện ảnh có trong db -->
                                @if ($image)
                                    <img src="{{$image->temporaryUrl()}}" width="120">
                              
                                @endif
                               </div>
                           </div>
                           

                           <div class="form-group">
                            <label class="col-md-4 control-label">Status</label>
                            <div class="col-md-4">
                                <select class="form-control" wire:model="status">
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                         </div>
                         <div class="form-group">
                               <label class="col-md-4 control-label"></label>
                               <div class="col-md-4">
                                  <button type="submit" class="btn btn-primary">Tạo mới</button>
                               </div>
                           </div>

                       </form>
                       
                   </div>

               </div>
           </div>
       </div>

</div>
</div>
