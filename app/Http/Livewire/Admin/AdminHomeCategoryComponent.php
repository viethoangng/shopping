<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    //lưu ý phần này phần cập nhật sản phẩm theo mục dạng mansory phần trang chủ (23)
    public $selected_categories=[];
    public $numberofproducts;

    public function mount()
    {
        $category=HomeCategory::find(1);
        $this->selected_categories=explode(',',$category->sel_categories);
    }

    public function updateHomeCategory()
    {
        $category=HomeCategory::find(1);
        $category->sel_categories=implode(',',$this->selected_categories);
        $category->no_of_products=$this->numberofproducts;
        $category->save();
        session()->flash('Thông báo','Danh mục trang chủ được update thành công');

    }

    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}
