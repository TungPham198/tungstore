
@extends('layouts.index')
@section('main')
<script type="text/javascript">
	function capnhat(qty,id){
		$.get(
			'{{asset("GioHang/CapNhat.html")}}',
			{qty:qty,id:id},
			function(){
				location.reload();
			}
			);
;	}
</script>
<div id="wrap-inner">
	<div id="list-cart">
		<h3>Giỏ hàng</h3>
		<form>
			@if(session('hethang'))
                <script>alert('{{session('hethang')}}')</script>
            @endif
            @if(session('khongsanpham'))
                <script>alert('{{session('khongsanpham')}}')</script>
            @endif
			<table class="table table-bordered .table-responsive text-center">
				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				<?php $dem=1; ?>
				@foreach($sanphams as $sp)
					<tr>
						<td><img width="80rem" class="img-responsive" src="{{asset('upload/sanpham/'.$sp->attributes->img)}}"></td>
						<td>{{$sp->name}}</td>
						<td>
							<div class="form-group">
								<input class="form-control" type="number" name="soluong<?php $dem++;  ?>" value="{{$sp->quantity}}" onchange="capnhat(this.value,'{{$sp->id}}')">
							</div>
						</td>
						<td><span class="price">{{number_format($sp->price,0,',','.')}} đ</span></td>
						<td><span class="price">{{number_format($sp->price*$sp->quantity,0,',','.')}} đ</span></td>
						<td><a href="{{asset('GioHang/Xoa/'.$sp->id.'.html')}}">Xóa</a></td>
					</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
						Tổng thanh toán: <span class="total-price">{{number_format($tongtien,0,',','.')}} đ</span>
																								
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="#" class="my-btn btn">Mua tiếp</a>
					<a href="{{asset('GioHang/Xoa/All.html')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>             	                	
	</div>

	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form method="post">
			@csrf
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="mail">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="ten">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="sdt">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="diachi">
			</div>
			<div class="form-group text-right">
				<button type="submit" class="btn btn-default" >Thực hiện đơn hàng</button>
			</div>
		</form>
	</div>
</div>

@endsection