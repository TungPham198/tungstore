
@extends('layouts.index')
@section('main')
<div id="wrap-inner">
	<div class="products">
		<h3>Tìm kiếm với từ khóa: <span>{{$tukhoa}}</span></h3>
		<div class="product-list row">
			@foreach($timkiem as $sp)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="{{asset('chitiet/'.$sp->id_sanpham.'/'.$sp->tenkhongdau.'.html')}}"><img height="150px" src="upload/sanpham/{{$sp->anh}}" class="img-thumbnail"></a>
				<p><a href="{{asset('chitiet/'.$sp->id_sanpham.'/'.$sp->tenkhongdau.'.html')}}">{{$sp->ten}}</a></p>
				<p class="price">{{number_format($sp->gia,0,',','.')}}</p>	  
				<div class="marsk">
					<a href="{{asset('chitiet/'.$sp->id_sanpham.'/'.$sp->tenkhongdau.'.html')}}">Xem chi tiết</a>
				</div>                                    
			</div>
			@endforeach
		</div>                	                	
	</div>
	
	<div id="pagination" class="pagination justify-content-center pagination-lg">
		{{$timkiem->links()}}
	</div>
</div>
@endsection