<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

     public function generateslug()
     {
         $this->slug =Str::slug($this->name);
        
     }

     //validate: mess nếu không nhâp mà submit
  public function updated($fields)
      {
          $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=> 'required|unique:categories'
          ]);
      }

  
public function storeCategory()
{
      $this->validate([
          'name'=>'required',
          'slug'=> 'required|unique:categories'
      ]);


    $category=new Category();
    $category->name= $this->name;
    $category->slug= $this->slug;
    $category->save();
    session()->flash('Thông báo','Bạn đã tạo danh mục mới thành công');

}

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
