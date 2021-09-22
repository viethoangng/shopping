<div class="wrap-icon-section wishlist">
    <a href="{{route('product.wishlist')}}" class="link-direction">
        <i class="fa fa-heart" aria-hidden="true"></i>
        <div class="left-info">
            @if (Cart::instance('wishlist')->count()>0)
            <span class="index">{{Cart::instance('wishlist')->count()}} Like</span>
            @endif
            <span class="title">Ưa thích</span>
        </div>
    </a>
    </div>