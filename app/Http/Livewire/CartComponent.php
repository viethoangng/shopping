<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;
use Carbon\Carbon;
use Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CartComponent extends Component
{

   public $haveCouponCode; //ẩn hiện form nhập mã giảm giá+ kết hợp bên form view nhập mã
   public $couponCode;//hàm nhập code bên view chỗ nhập mã giam gia
   public $discount;  
   public $subtotalAfterDiscount;
   public $taxAfterDiscount;
   public $totalAfterDiscount;

      //----------------function tính toán  giảm giá------------------
      public function calculateDiscounts()
      {
          if(session()->has('coupon'))
          {
              if(session()->get('coupon')['type']=='fixed')
              {
                  $this->discount=session()->get('count')['value'];
                  
              }
              else
              {
                  $this->discount=(Cart::instance('cart')->subtotal()* session()->get('coupon')['value'])/100;

              }
              $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal()-$this->discount;
              $this->taxAfterDiscount=($this->subtotalAfterDiscount * config('cart.tax'))/100;
              $this->totalAfterDiscount=$this->subtotalAfterDiscount +$this->taxAfterDiscount;
            }
      }
      //----------------function tính toán  giảm giá------------------


   //----------------function áp dụng mã giảm giá------------------
   public function applyCouponCode()
   {
       $coupon=Coupon::where('code',$this->couponCode)->where('expiry_date','>=',Carbon::today())->where('cart_value','<=',FacadesCart::instance('cart')->subtotal())->first();
       if(!$coupon)
       {
           session()->flash('Thông báo','Mã giảm giá không hợp lệ!');
           return;
       }
      //session truyền all giá trị giảm giá code,type,value,cart_value
       session()->put('coupon',[
          'code'=>$coupon->code,
          'type'=>$coupon->type,
          'value'=>$coupon->value,
          'cart_value'=>$coupon->cart_value
       ]);
    }
   //----------------function áp dụng mã giảm giá------------------

    public function removeCoupon()
    {
        session()->forget('coupon');
    }


    //hàm tăng số lượng hàng khi kích chọn số lượng và trái tim
    public function increaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty+1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent'); //cap nhat click cart lập tức
    }
    //hàm giảm số lượng hàng khi kích chọn số lượng và trái tim
    public function decreaseQuantity($rowId)
    {
        $product=Cart::instance('cart')->get($rowId);
        $qty=$product->qty-1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent'); //cap nhat  cart lập tức

    }
    
    //hàm xóa từng sp và trái tim dạng session 
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent'); //cap nhat  cart lập tức

        session()->flash('success_message','xóa thành công sản phẩm');
    }
    
    //hàm xóa all sp khỏi giỏ
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component',['refreshComponent']); //cap nhat card  lập tức

    }

    public function render()
    {
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() < session() -> get('coupon')['cart_value']) {
                session()->forget('coupon');
            }
            else{
                $this->calculateDiscounts();
            }
        }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
