<div>
   <div class="container" style="padding: 30px 0;">
     <div class="row">
         <div class="col-md-12">
             <div class="panel panel-default">
                 <div class="panel-heading">
                     Quản lý Sale
                 </div>
                 <div class="panel-body">
                 @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
                     @endif
                     <form class="form-horizontal" wire:submit.prevent="updateSale">
                           <div class="form-group">
                             <label class="col-md-4 control-label">Trạng thái</label>
                             <div class="col-md-4">
                                 <select class="form-control" wire:model="status">
                                     <option value="0">Không kích hoạt</option>
                                     <option value="1">Kích hoạt</option>
                                 </select>
                             </div>
                         </div>

                           <div class="form-group">
                             <label class="col-md-4 control-label">Ngày Sale</label>
                             <div class="col-md-4">
                                    <input type="text" placeholder="YYYY/MM//DD H:M:S" id="sale-date" class="form-control input-md" wire:model="sale_date">
                             </div>
                         </div>

                           <div class="form-group">
                             <label class="col-md-4 control-label"></label>
                             <div class="col-md-4">
                             <button type="submit" class="btn btn-primary">Cập nhật</button>
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
          $('#sale-date').datetimepicker({
              format:'Y-MM-DD h:m:s'
          })
          .on('dp.change',function(ev){
            var data=$('#sale-date').val();
            @this.set('sale_date',data);
          });
        });
    </script>
@endpush