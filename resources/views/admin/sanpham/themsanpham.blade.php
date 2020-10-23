
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản Phẩm
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/sanpham/them')}}" method="POST" enctype="multipart/form-data">
                	@if(count($errors)>0)
		                <div class="alert alert-danger">
		                    @foreach($errors->all() as $er)
		                        {{$er}}<br>
		                    @endforeach
		                </div>
		            @endif
                	@if(session('themthanhcong'))
		                <script>alert('{{session('themthanhcong')}}')</script>
		            @endif
		            @if(session('loianh'))
		                <script>alert('{{session('loianh')}}')</script>
		            @endif
                	{!!csrf_field() !!}
                    <div class="form-group">
                        <label>Tên *</label>
                        <input class="form-control" name="ten" placeholder="Nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Danh mục *</label>
                        <select class="form-control" name="danhmuc">
                        	<option value="" selected disabled hidden>Chọn Danh Mục</option>
                        	@foreach($danhmuc as $dm)
                        	<option value="{{$dm->id_danhmuc}}">{{$dm->ten}}</option>
                        	@endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá *</label>
                        <input class="form-control" name="gia" placeholder="Nhập giá sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Phụ Kiện</label>
                        <input class="form-control" name="phukien" placeholder="Phụ kiện đi kèm gồm" />
                    </div>
                    <div class="form-group">
                        <label>Bảo Hành</label>
                        <input class="form-control" name="baohanh" value="Thời gian bảo hành 12 tháng" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh *</label>
                        <input type="file" name="anh">
                    </div>
                    <div class="form-group">
                        <label>Tình Trạng *</label>
                        <input class="form-control" name="tinhtrang" placeholder="Tình trạng máy" value="New" />
                    </div>
                    <div class="form-group">
                        <label>Khuyến Mại</label>
                        <input class="form-control" name="khuyenmai"  value="0" />
                    </div>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input class="form-control" type="number" name="soluong"/>
                    </div>
                    <div class="form-group">
                        <label>Miêu Tả</label>
                        <textarea class="form-control" rows="3" name="mieuta" placeholder="Giới thiệu san phẩm"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Đặc Biệt</label>
                        <label class="radio-inline">
                            <input name="dacbiet" value="1" checked="" type="radio">Có
                        </label>
                        <label class="radio-inline">
                            <input name="dacbiet" value="2" type="radio">Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm Sản Phẩm</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection