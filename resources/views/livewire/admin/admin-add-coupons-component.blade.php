<div>
<br>
<div class="container">
<div class="row">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    Thêm mới mã giảm giá
                </div>
                <div class="col-md-6" style="padding-left: 35%;">
                    <a href="{{route('admin.coupons')}}" class="btn btn-success">TẤT CẢ MÃ</a>
                </div>
            </div>

        </div>
        <div class="panel-body">
            @if (Session::has('Thông báo'))
                <div class="alert alert-success" role="alert">{{Session::get('Thông báo')}}</div>
            @endif
            <form class="form-horizontal" wire:submit.prevent="storeCoupon">
                <div class="form-group">
                    <label class="col-md-4 control-label">MÃ GIẢM GIÁ</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="magiamgia" class="form-control input-md" wire:model="code" >
                    @error('code')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">GIẢM GIÁ THEO</label>
                    <div class="col-md-4">
                    <select class="form-control"wire:model="type">
                        <option value="">Lựa chọn</option>
                        <option value="fixed">Fixed</option>
                        <option value="percent">Percent</option>
                        
                     </select>
                    @error('type')<p class="text-danger">{{$message}}</p>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">GIÁ TRỊ MÃ GIẢM GIÁ</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="coupon value" class="form-control input-md"wire:model="value">
                        @error('value')<p class="text-danger">{{$message}}</p>@enderror

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">GIÁ TRỊ GIỎ HÀNG</label>
                    <div class="col-md-4">
                        <input type="text" placeholder="cart value" class="form-control input-md"wire:model="cart_value">
                        @error('cart_value')<p class="text-danger">{{$message}}</p>@enderror

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label">HẠN SỬ DỤNG</label>
                    <div class="col-md-4" wire:ignore>
                        <input type="text" id="expiry-date" placeholder="Expiry Date" class="form-control input-md"wire:model="expiry_date">
                        @error('expiry_date')<p class="text-danger">{{$message}}</p>@enderror

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label"></label>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-danger">THÊM MỚI</button>
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
            $('#expiry-date').datetimepicker({
                format: 'Y-MM-DD'
            })
            .on('dp.change',function(ev){
                var date = $('#expiry-date').val();
                @this.set('expiry_date',data);
            });
        });
    </script>
@endpush