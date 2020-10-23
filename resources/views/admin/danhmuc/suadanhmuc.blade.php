
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa Danh Mục
                    <small>{{$dm->ten}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $er)
                            {{$er}}<br>
                        @endforeach
                    </div>
                @endif

                
                <form action="{{asset('admin/danhmuc/sua/'.$dm->id_danhmuc)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên Danh Mục Mới</label>
                        <input class="form-control" name="ten" placeholder="Nhập Tên Danh Mục !!" value="{{$dm->ten}}" />
                    </div>
                    <button type="submit" class="btn btn-default">Sửa</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection