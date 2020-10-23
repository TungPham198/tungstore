<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('')}}">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="yandex-verification" content="01da8354a0d3fb26" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Tùng Shop - .S2.</title>
	<link rel="stylesheet" href="layout/css/bootstrap.min.css">
	<link rel="stylesheet" href="layout/css/home.css">
	<link rel="stylesheet" href="layout/css/details.css">
	<link rel="stylesheet" href="layout/css/category.css">
	<link rel="stylesheet" href="layout/css/search.css">
	<link rel="stylesheet" href="layout/css/cart.css">
	<link rel="stylesheet" href="layout/css/complete.css">
	<script type="text/javascript" src="layout/js/jquery-3.2.1.min.js"></script>
	<script src="layout/https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="layout/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="layout/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="#"><img width="200px" src="{{asset('upload/logos/logo.png')}}"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<form class="navbar-form" role="search" method="get" action="{{'seach/'}}">
						<input type="text" name="text" placeholder="Nhập từ khóa ...">
						<input type="submit" name="submit" value="Tìm Kiếm">
					</form>
				</div>
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('GioHang/HienThi.html')}}">Giỏ hàng</a>
				
					<a href="{{asset('GioHang/HienThi.html')}}">{{Cart::getContent()->count() }}</a>				    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
	<div class="container">
		<div class="row">
			<div id="sidebar" class="col-md-3">
				<nav id="menu">
					<ul>
						<li class="menu-item">danh mục sản phẩm</li>
						@foreach($dmsp as $dmspn)
						<li class="menu-item"><a href="{{asset('danhmuc/'.$dmspn->id_danhmuc.'/'.$dmspn->tenkhongdau.'.html')}}" title="">{{$dmspn->ten}}</a></li>
						@endforeach
					</ul>
					<!-- <a href="#" id="pull">Danh mục</a> -->
				</nav>

				<div id="banner-l" class="text-center">
					@foreach($banner as $bn)
						@if($bn->loai==2)
							<div class="banner-l-item">
								<a href="#"><img src="{{asset('upload/banner/'.$bn->anh)}}" alt="" class="img-thumbnail"></a>
							</div>
						@endif
					@endforeach
				</div>
			</div>

			<div id="main" class="col-md-9">
				<!-- main -->
				<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
				<div id="slider">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
					  	<div class="carousel-inner">
						  	<?php $i=0; ?>
						  	@foreach($banner as $bn)
						  		@if($bn->loai==1)
									<div
									    @if($i==0)
									    	class="carousel-item active"
									    @else
									    	class="carousel-item"
									    @endif
									>
									      <img class="d-block w-100" src="{{'upload/banner/'.$bn->anh}}" alt="First slide">
									</div>
								@endif
						    <?php $i++; ?>
						    @endforeach
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
						    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
						    <span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
						    <span class="carousel-control-next-icon" aria-hidden="true"></span>
						    <span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<br><br>
				

	@yield('main')
					<!-- end main -->
			</div>
		</div>
	</div>
</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="#"><img width="200px" src="{{asset('upload/logos/logo.png')}}"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Tùng Shop thành lập năm 2019. Chúng tôi chuyên cung cấp các sản phẩm điện thoại di động Cũ - Mới. Nhập đặt hàng đối với những sản phẩm sắp ra mắt</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 363325454</p>
						<p>Email: tungtuong98@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Vũ Chính - Thái Bình - Thái Bình</p>
						<p>Address 2: Cầu Sơn Tiến - Quyết Thắng - Thái Nguyên</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Sự hài lòng của các bạn là hạnh phúc của chúng tôi</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© Tùng Shop - .S2.</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="layout/img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>