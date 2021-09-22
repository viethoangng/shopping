<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    
    //xóa slide
    public function deleteSlide($slide_id)
    {
        $category=HomeSlider::find($slide_id);
        $category->delete();
        session()->flash('Thông báo','Xóa slide thành công');
    }
   public function render()
    {
        $sliders=HomeSlider::All();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }

}
