<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    
    public $slug;
    public $qty;

    public function mount($slug)
    {
        $this->slug =$slug;
        $this->qty=1;
        
    }
    public function storeed($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Bạn đã thêm sản phẩm vào giỏ hàng');
        return redirect()->route('product.cart');
    }
//click chọn số lượng sp tăng
    public function increaseQuantity()
    {
        $this->qty++;
    }
    //click chọn số lượng sp giảm
    public function decreaseQuantity()
    {
        if($this->qty>1)
        {
            $this->qty--;
        
        }
    }
    public function render()
    {
        $product=Product::where('slug',$this->slug)->first();
        $popular_products=Product::inRandomOrder()->limit(4)->get();
        $related_products=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale=Sale::find(1);
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_products'=>$related_products,'sale'=>$sale])->layout('layouts.base');
    }
}
