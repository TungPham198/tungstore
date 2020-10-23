
@extends('layouts.index')
@section('main')
<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>Điện thoại Apple iPhone 7 Plus - 32GB</h3>
		<div class="row">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
				<img style="padding-top: 40px;" width="220px" src="{{asset('upload/sanpham/'.$sanpham->anh)}}">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
				<p>Giá: <span class="price">{{number_format($sanpham->gia)}}</span></p>
				<p>Bảo hành: {{$sanpham->baohanh}}</p> 
				<p>Phụ kiện: {{$sanpham->phukien}}</p>
				<p>Tình trạng: {{$sanpham->tinhtrang}}</p>
				<p>Khuyến mại: {{$sanpham->khuyenmai}}</p>
				<p>Còn hàng: 
				@if($sanpham->soluong>0)
					Còn Hàng
				@else
					Hết Hàng
				@endif</p>
				<p class="add-cart text-center"><a href="{{asset('GioHang/them/'.$sanpham->id_sanpham.'.html')}}">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{!!str_replace("/","</br>",$sanpham->mieuta)!!}</p>
	</div>
	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment">
			<form action="{{asset('danhmuc/'.$sanpham->id_sanpham.'/'.$sanpham->tenkhongdau.'.html')}}" method="post">
				@csrf
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="mail">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="ten">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="noidung"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button>
				</div>
			</form>
		</div>
	</div>
	<div id="comment-list">
		@foreach($binhluan as $bl)
		<ul>
			<li class="com-title">
				{{$bl->ten_binhluan}}
				<br>
				<span>{{$bl->created_at}}</span>	
			</li>
			<li class="com-details">
				{{$bl->noidung_binhluan}}
			</li>
		</ul>
		@endforeach
	</div>
</div>
@endsection