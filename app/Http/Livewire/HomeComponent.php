<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        //slide động bảng mysql
        $sliders=HomeSlider::where('status',1)->get();
        //sp new hiện 8sp
        $lproducts=Product::orderBy('created_at','DESC')->get()->take(8);

        //xử lý phần dạng mansory home, chọn danh mục sp trang home (phần khó) bảng mysql
        $category=HomeCategory::find(1);   //tìm id1
        $cats=explode(',',$category->sel_categories);   //biến chuỗi->mảng
        $categories=Category::whereIn('id',$cats)->get();
        $no_of_products=$category->no_of_products;

        //phần chọn giảm giá sale trang chủ= cách random ngẫu nhiên 
        $sproducts=Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);

        //phần sale (bảng sale đc tạo mysql)
        $sale=Sale::find(1);


        return view('livewire.home-component',['sliders'=>$sliders,'lproducts'=>$lproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'sproducts'=>$sproducts,'sale'=>$sale])->layout('layouts.base');
    }
}
