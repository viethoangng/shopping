<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishlistCountComponent extends Component
{
    //phương thức cập nhật số like sản phẩm realtime
    protected $listeners=['refreshComponent'=>'$refresh'];
    public function render()
    {
        return view('livewire.wishlist-count-component');
    }
}
