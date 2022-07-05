@extends('User/Layouts/_layout')
@section('content')
@include('Home.banner')
<section class="" >
	<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
		<div class="col-md-12 heading-section text-center ">
		<span class="subheading">Danh Sách Sản Phẩm</span>
		<h2 class="mb-4">Sản Phẩm Của Chúng Tôi</h2>
		</div>
	</div>   		
	</div>
	<div class="container" ng-controller="mycontroller">
		<div class="row">
			<div class="col-md-6 col-lg-3 " ng-repeat="item in sanphams|limitTo:12">
				<div class="product ">
					<a href="/detail/@{{item.id}}" class="img-prod"><img class=" product-index" src="/images/products/product/@{{ item.image }}" alt="Colorlib Template">
						<span class="status">30%</span>
						<div class="overlay"></div>
					</a>
					<div class="text py-2 pb-4 px-3 text-center">
						<h3><a href="#">@{{item.name}}</a></h3>
						<div class="d-flex">
							<div class="pricing">
								{{-- <p class="price"><span class="mr-2 price-dc">@{{item.price}} ₫</span><span class="price-sale">@{{item.unit_price|number}}</span></p> --}}
								<p class="price">
									<span class="mr-2">@{{item.unit_price|number}} ₫</span>
									{{-- <span class="price-sale">@{{item.unit_price|number}}</span> --}}
								</p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3" ng-controller="myCartcontroller">
							<div class="m-auto d-flex">
								<a  class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart" ng-click="addToCart(item)"></i></span>
								</a>
								<a  class="heart d-flex justify-content-center align-items-center ">
									<span><i class="ion-ios-heart"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			</div>
		</div>
	</div>
</section>

@include('Partial.SubInfo')

@include('Partial.Description')

{{-- @include('Partial.Partner') --}}

@include('Partial.Subcriber')
@stop
