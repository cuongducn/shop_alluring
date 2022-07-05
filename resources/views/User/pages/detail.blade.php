
@extends('User/Layouts/_layout')
@section('content')
@section('styles')
<link rel="stylesheet" href="/choncss/css/custom.css">
@endsection


    <section class="ftco-section" ng-controller="myDetailcontroller">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ">
    				<a href="" class="image-popup" src="/images/products/product/@{{sanpham.image}}"><img src="/images/products/product/@{{sanpham.image}}" class="detail_product" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ">
					<h3>@{{sanpham.name}}</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
    				<p class="price"><span>@{{sanpham.unit_price|number}} ₫</span></p>
    				<p>
					@{{sanpham.mota_sp}}
					</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"></div>
	                  <!-- <select name="" id="" class="form-control">
	                  	<option value="">Small</option>
	                    <option value="">Medium</option>
	                    <option value="">Large</option>
	                    <option value="">Extra Large</option>
	                  </select> -->
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="" ng-click="reduction()"> 
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
	             	<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100" ng-model="quantity">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="" ng-click="increase()">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;"></p>
	          	</div>
          	</div>
          	<p><a ng-click="addToCart(sanpham)" class="btn-cart_add btn btn-black py-3 px-5">Thêm giỏ hàng</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section" ng-controller="myDetailcontroller">
    	<div class="container">
    		<div class="row" >
    			<div class="col-md-6 col-lg-3 " ng-repeat="item in sanphams|limitTo:5" ng-if="sanpham.id_loai_sp==item.id_loai_sp&&sanpham.id!=item.id">
    				<div class="product" >
    					<a href="/detail/@{{item.id}}" class="img-prod"><img class="img-detail" src="../images/products/product/@{{item.image}}" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-2 pb-4 px-3 text-center">
    						<h3><a href="#">@{{item.name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>@{{item.unit_price|number}} ₫</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							<a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    </section>

@stop
@section('scripts')
<script src="/homejs/detail.js"></script>
@endsection