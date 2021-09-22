<div class="wrap-icon-section minicart">
								<a href="{{route('product.cart')}}" class="link-direction">
									<i class="fa fa-cart-plus" aria-hidden="true"></i>
									<div class="left-info">
										@if (Cart::instance('cart')->count()>0)
											
										@endif
										<span class="index">{{Cart::instance('cart')->count()}}</span>
										<span class="title">GIỎ HÀNG</span>
									</div>
								</a>
							</div>