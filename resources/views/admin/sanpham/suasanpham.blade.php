
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa sản phẩm
                    <small>{{$sanpham->ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/sanpham/sua/'.$sanpham->id_sanpham)}}" method="POST" enctype="multipart/form-data">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                                {{$er}}<br>
                            @endforeach
                        </div>
                    @endif
                    @if(session('suathanhcong'))
                        <script>alert('{{session('suathanhcong')}}')</script>
                    @endif
                    @if(session('loianh'))
                        <script>alert('{{session('loianh')}}')</script>
                    @endif
                	@csrf
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="ten" placeholder="Nhập tên sản phẩm" value="{{$sanpham->ten}}" />
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="danhmuc">
                        	@foreach($danhmuc as $dm)
                        	<option 
                            @if($sanpham->danhmucsanpham==$dm->id_danhmuc)
                                {{"selected"}}
                            @endif
                            value="{{$dm->id_danhmuc}}">{{$dm->ten}}</option>
                        	@endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="gia" placeholder="Nhập giá sản phẩm"value="{{$sanpham->gia}} "/>
                    </div>
                    <div class="form-group">
                        <label>Phụ Kiện</label>
                        <input class="form-control" name="phukien" placeholder="Phụ kiện đi kèm gồm" value="{{$sanpham->phukien}}" />
                    </div>
                    <div class="form-group">
                        <label>Bảo Hành</label>
                        <input class="form-control" name="baohanh" placeholder="Thời gian bảo hành" value="{{$sanpham->baohanh}}" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh</label>
                        <p><img width="100px" src="upload/sanpham/{{$sanpham->anh}}"></p>
                        <input type="file" name="anh" >
                    </div>
                    <div class="form-group">
                        <label>Tình Trạng</label>
                        <input class="form-control" name="tinhtrang" placeholder="Tình trạng máy" value="{{$sanpham->tinhtrang}}" />
                    </div>
                    <div class="form-group">
                        <label>Khuyến Mại</label>
                        <input class="form-control" name="khuyenmai" placeholder="Chương trình khuyến mại ??%" value="{{$sanpham->khuyenmai}}"/>
                    </div>
                    <div class="form-group">
                        <label>Số Lượng</label>
                        <input class="form-control" name="soluong" placeholder="" value="{{$sanpham->soluong}}"/>
                    </div>
                    <div class="form-group">
                        <label>Miêu Tả</label>
                        <textarea class="form-control" rows="3" name="mieuta" placeholder="Giới thiệu san phẩm">{{$sanpham->mieuta}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đặc Biệt</label>
                        <label class="radio-inline">
                            <input name="dacbiet" value="1" type="radio"
                                @if($sanpham->dacbiet == 1)
                                    {{"checked"}}
                                @endif
                            >Có
                        </label>
                        <label class="radio-inline">
                            <input name="dacbiet" value="2" type="radio"
                                @if($sanpham->dacbiet == 2)
                                    {{"checked"}}
                                @endif
                            >Không
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Sản Phẩm</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection