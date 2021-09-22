<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $sorting;   //sắp xếp hàng 
    public $pagesize;  //hiện số lượng

    //lọc giá dùng no uislider+ copy script viết bên shop view
    public $min_price;
    public $max_price;

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize=12;
        
        $this->min_price=1;
        $this->max_price=1000;
   
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Bạn đã thêm sản phẩm vào giỏ hàng');
        return redirect()->route('product.cart');
    }

    //sản phẩm yêu thích
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
    }
    //delete sản phẩm yêu thích
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id==$product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
        
    }




    use WithPagination;
    public function render()
    {
        //lọc sản phẩm mới nhất theo ngày
        if($this->sorting=='date')
        {
            $products=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        //lọc sản phẩm mới nhất theo giá thấp đến cao

        else if($this->sorting=='price')
        {
            $products=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);

        }
        //lọc sản phẩm mới nhất theo giá cao xuống thấp

        else if($this->sorting=='price-desc')
        {
            $products=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);

        }
        else
        {
            $products=Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);

        }

        $categories=Category::all();
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
