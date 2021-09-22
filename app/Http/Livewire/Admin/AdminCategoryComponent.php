<?php

namespace App\Http\Livewire\Admin;


use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories=Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }



//xóa danh mục
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        session()->flash('Thông báo','Danh mục đã được xóa thành công');
    }
}
