
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa
                    <small>{{$banner->ten_banner}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/banner/sua/'.$banner->id_banner)}}" method="POST" enctype="multipart/form-data">
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
                    @csrf
                    <div class="form-group">
                        <label>Tên *</label>
                        <input class="form-control" name="ten" placeholder="Nhập tên banner" value="{{$banner->ten_banner}}" />
                    </div>
                    <div class="form-group">
                        <img src="{{asset('upload/banner/'.$banner->ten_banner)}}">
                        <label>Ảnh *</label>
                        <input type="file" name="anh">
                    </div>
                    <div class="form-group">
                        <label>Loại *</label>
                        <label class="radio-inline">
                            <input name="loai" value="1"@if($banner->loai==1) checked @endif type="radio">Slide
                        </label>
                        <label class="radio-inline">
                            <input name="loai" value="2"@if($banner->loai==2) checked @endif type="radio">Quảng Cáo
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Sửa Banner</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection