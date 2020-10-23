
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>Thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/danhmuc/them')}}" method="POST">
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
                    @if(session('loithem'))
                        <script>alert('{{session('loithem')}}')</script>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label>Tên Danh Mục</label>
                        <input class="form-control" name="ten" placeholder="Nhập Tên Danh Mục Muốn Thêm !!" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection