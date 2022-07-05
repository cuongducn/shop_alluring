    
	
	{{-- <div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">freshfood@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">3-5 ngày làm việc giao hàng &amp;Miễn phí hoàn trả</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div> --}}

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		{{-- <a class="navbar-brand" href="/"><img src="/images/logoAlluring.png" alt=""></a> --}}
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<div class="navbar">
				
				<a class="navbar-logo" href="/"><img src="/images/logoAlluring.png" alt=""></a>
				<div class="navbar-nav navbar-nav_main">
					<div class="nav-item"><a href="/all_product" class="nav-link">Nam</a></div>
					<div class="nav-item"><a href="/all_product" class="nav-link">Nữ</a></div>
					<div class="nav-item"><a href="/Tintuc" class="nav-link">SUMMER COLLECTION</a></div>
				</div>
				<div class="navbar-nav navbar-nav_sub">
				<div class="nav-item"><span class="nav-link nav-icon">
					<span class="nav-link_icon">
						<img class="nav-link_icon" src="/images/icon/search.png" alt="">
					</span></span>
				</div>
					<div class="nav-item cta cta-colored"><a href="/login" class="nav-link nav-icon">
					<span class="nav-link_icon">
						<img class="nav-link_icon" src="/images/icon/user.png" alt="">
					</span></a>
					</div>
					{{-- <div class="nav-item cta cta-colored"><a href="" class="nav-link"><span class="">XIN CHÀO:@{{nguoidung}}</span></a></div> --}}
					<div class="nav-item cta cta-colored"><div href="/Cart" class="nav-link nav-icon">
							<img class="nav-link_icon nav-link_icon_bag" src="/images/icon/bag.png" alt="">
						<span class="amount-cart">@{{sum}}</span></div>
					</div>
			</div>
			</div>
		</div>
	</div>
	<div class="container-cart" ng-controller="myCartcontroller">
		<div class="cart-header">
			<svg data-action="close" class="icon-back" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"> 
				<path d="M492,236H68.442l70.164-69.824c7.829-7.792,7.859-20.455,0.067-28.284c-7.792-7.83-20.456-7.859-28.285-0.068    l-104.504,104c-0.007,0.006-0.012,0.013-0.018,0.019c-7.809,7.792-7.834,20.496-0.002,28.314c0.007,0.006,0.012,0.013,0.018,0.019    l104.504,104c7.828,7.79,20.492,7.763,28.285-0.068c7.792-7.829,7.762-20.492-0.067-28.284L68.442,276H492    c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z">
				</path>
			</svg>
			<div class="title-cart">Giỏ hàng</div>
		</div>
		<div class="content-cart">
			<ul class="list-product" >
				<li ng-repeat="item in listSP">
					<a class="product_thumbnail" href="" style="background-image: url('../../images/products/product/@{{item.image}}');"></a>
					<div>
						<h6>@{{item.name}}</h6>
						<span class="product_variation">Trắng 0</span>
						<div class="price">
							<p>@{{item.unit_price|number}} ₫</p>
							<p class="discount"></p>
							<div class="add_product">
								<div class="decrease" ng-click="Giam(item)">-</div>
								<input type="number" value="@{{item.quantity}}">
								<div class="increase" ng-click="Tang(item)">+</div>
							</div>
						</div>
					</div>
					<div class="clear_product">
						<svg ng-click=remove(item) id="close_nav" class="icon-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<path d="M23.707.293h0a1,1,0,0,0-1.414,0L12,10.586,1.707.293a1,1,0,0,0-1.414,0h0a1,1,0,0,0,0,1.414L10.586,12,.293,22.293a1,1,0,0,0,0,1.414h0a1,1,0,0,0,1.414,0L12,13.414,22.293,23.707a1,1,0,0,0,1.414,0h0a1,1,0,0,0,0-1.414L13.414,12,23.707,1.707A1,1,0,0,0,23.707.293Z">
							</path>
						</svg>
					</div>
				</li>
			</ul>
		</div>
		<div class="cart-sub">
			<div class="total-cart">
				<p>Tổng:</p>
				<span class="cart-purchase_main"> ₫</span>
			</div>
			<div class="total-cart">
				<span class="sub-total">Ưu đãi:</span>
				<span class="cart-purchase_sub">-0 ₫</span>
			</div>
			<div class="total-cart">
				<span class="sub-total">Phí ship:</span>
				<span class="cart-purchase_sub">20.000 ₫</span>
			</div>
			<div class="total-cart">
				<p>Thành tiền:</p>
				<span class="cart-purchase_main">@{{(total + 20000)|number}} ₫</span>
 			</div>
			<a class="cart-button">Thanh Toán</a>
		</div>
	</div>
</nav>
@section("script")
{{-- <script src="/homejs/cart.js"></script> --}}
@endsection