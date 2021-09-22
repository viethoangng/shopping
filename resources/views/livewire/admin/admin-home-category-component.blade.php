
<div>
    <div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Quản lý danh mục home
                </div>
                <div class="panel-body">
                @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
            @endif
                    <form class="form-horizontal"wire:submit.prevent="updateHomeCategory">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Lựa chọn danh mục</label>
                            <div class="col-md-4">
                                <select class="sel_categories form-control" name="categories[]" multiple="multiple" wire:model="selected_categories">
                                    @foreach ($categories as $category )
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Không có sản phẩm</label>
                            <div class="col-md-4" wire:ignore>
                                <input type="text" class="form-control input-md" wire:model="numberofproducts">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
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
        // thư viện copy select2.org
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e){
                var data = $('.sel_categories').select2("val");
                @this.set('selected_categories',date);

            });

        });
    </script>
@endpush