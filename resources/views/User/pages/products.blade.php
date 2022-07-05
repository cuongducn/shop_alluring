@extends('User/Layouts/_layout')
@section("styles")
<link rel="stylesheet"href="/css/subStyleLPL.css">
@endsection
@section('content')

{{-- <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
				<h1 class="mb-0 bread">Products</h1>
			</div>
		</div>
	</div>
</div> --}}

<!-- <div id="myBtnContainer">
 <button class="btn active" onclick="filterSelection('all')"> Show all</button>
 <button class="btn" onclick="filterSelection('car')"> Cars</button>
 <button class="btn" ng-click="filterSelection('Nước cam')"> Animals</button>
 <button class="btn" onclick="filterSelection('fruits')"> Fruits</button>
 <button class="btn" onclick="filterSelection('colors')"> Colors</button>
</div> -->

<!-- <div class="container">
	<div class="filterDiv" ng-class="addclass(c+item.id_loai_sp)" ng-repeat="item in sanphams">@{{item.name}}</div>
</div> -->

<section class="ftco-section">

	<div  class="container">
		<div class="row justify-content-center">
			<div class="col-lg-12">
				<ul id="myBtnContainer">
				<button ng-click="filterSelection('all')"  type="button" name="" id="" class="btn btn-primary ">Tất cả</button>
					<li class="btn" ng-repeat="lsp in lsp" ng-click="filterSelection(lsp.tenloai)">@{{lsp.tenloai}}</li>
               </ul>
			</div>
		</div>
		<div class="row col-md-12 list-product">
			<div class="col-md-4 filterDiv single-product"  ng-class="addclass(sp)" dir-paginate="sp in sanphams |itemsPerPage: pageSize" current-page="currentPage">
				<div class="product">
					<a href="/detail/@{{sp.id}}" class="img-prod"><img class="product_all" src="/images/products/product/@{{sp.image}}" alt="Colorlib Template">
						<span class="status">30%</span>
						<div class="overlay"></div>
					</a>
					<div class="text py-2 pb-4 px-3 text-center">
						<h3><a >@{{sp.name}}</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price">
									<span class="price-sale">@{{sp.unit_price|number}}</span>
									<span class="mr-2">@{{sp.price}} ₫</span>
									{{-- <span class="mr-2 price-dc">@{{sp.price}} ₫</span> --}}
								</p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart" ng-click="addToCart(sp)"></i></span>
								</a>
								<a class="heart d-flex justify-content-center align-items-center ">
									<span><i class="ion-ios-heart"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4 hidesp" dir-paginate="sp in sanphams |itemsPerPage: pageSize" current-page="currentPage">
				<div class="product">
					<a href="/detail/@{{sp.id}}" class="img-prod">
						<img class="product_all" src="/images/products/product/@{{sp.image}}" alt="Colorlib Template">
						<span class="status">30%</span>
						<div class="overlay"></div>
					</a>
					<div class="text py-2 pb-4 px-3 text-center">
						<h3><a >@{{sp.name}}</a></h3>
						<div class="d-flex">
							<div class="pricing">
								<p class="price">
									<span class="price-sale">@{{sp.unit_price|number}}</span>
									<span class="mr-2">@{{sp.name}} ₫</span>
									{{-- <span class="mr-2 price-dc">@{{sp.name}} ₫</span> --}}
								</p>
							</div>
						</div>
						<div class="bottom-area d-flex px-3">
							<div class="m-auto d-flex">
								<a href="/detail/@{{sp.id}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
									<span><i class="ion-ios-menu"></i></span>
								</a>
								<a class="buy-now d-flex justify-content-center align-items-center mx-1">
									<span><i class="ion-ios-cart" ng-click="addToCart(sp)"></i></span>
								</a>
								<a class="heart d-flex justify-content-center align-items-center ">
									<span><i class="ion-ios-heart"></i></span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col text-center">
				<div class="block-27">
					<ul>
						<li> <dir-pagination-controls max-size='5' id="abuttonv" on-page-change="pageChangeHandler(newPageNumber)"></dir-pagination-controls></li>
				
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('scripts')
	<script src="Homejs/phanloai.js"></script>
	<script src="/homejs/cart.js"></script>
@endsection