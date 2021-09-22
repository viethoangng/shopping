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
                    <div class="col-md-6" style="font-weight: 600;padding: 6px;font-size: 16px;">Tất cả mã giảm giá</div>
                    <div class="col-md-6">
                        <a href="{{route('admin.addcoupon')}}" class="btn btn-primary pull-right">THÊM MỚI</a>
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
                            <th>MÃ GIẢM GIÁ</th>
                            
                            <th>LOẠI MÃ GIẢM GIÁ</th>
                            <th>GIÁ TRỊ MÃ GIẢM GIÁ</th>
                            <th>GIÁ TRỊ GIỎ HÀNG</th>
                            <th>HẠN SỬ DỤNG</td>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{$coupon->id}}</td>
                                <td>{{$coupon->code}}</td>
                                <td>{{$coupon->type}}</td>
                                @if ($coupon->type=='fixed')
                                   <td>${{$coupon->value}}</td>
                                @else
                                   <td>{{$coupon->value}} %</td>
                                @endif
                                   <td>{{$coupon->cart_value}}</td>
                                <td>{{$coupon->expiry_date}}</td>                               
                                <td>
                                    <a href="{{route('admin.editcoupon',['coupon_id'=>$coupon->id])}}"><i class="fa fa-edit fa-2x"></i></a>
                                    <a href="#"onclick="confirm('Bạn có thực sự muốn xóa ?')||event.stopImmediatePropagation()" wire:click.prevent="deleteCoupon({{$coupon->id}})"><i class="fa fa-remove fa-2x text-danger" style="margin-left: 10px;"></i></a>
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
