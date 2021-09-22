<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    public $sorting;   //sắp xếp hàng 
    public $pagesize;  //hiện số lượng

    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize=12;
        $this->fill(request()->only('search','product_cat','product_cat_id'));
     
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message', 'Bạn đã thêm sản phẩm vào giỏ hàng');
        return redirect()->route('product.cart');
    }
    use WithPagination;
    public function render()
    {
        //lọc sản phẩm mới nhất theo ngày
        if($this->sorting=='date')
        {
            $products=Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        //lọc sản phẩm mới nhất theo giá thấp đến cao

        else if($this->sorting=='price')
        {
            $products=Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);

        }
        //lọc sản phẩm mới nhất theo giá cao xuống thấp

        else if($this->sorting=='price-desc')
        {
            $products=Product::where('name','like','%'.$this->search .'%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);

        }
        else
        {
            $products=Product::paginate($this->pagesize);

        }

        $categories=Category::all();
        return view('livewire.search-component',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
