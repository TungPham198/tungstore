
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sửa
                    <small>{{$nguoidung->email}}</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/doimk/'.$nguoidung->id)}}" method="POST">
                    @csrf
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                                {{$er}}<br>
                            @endforeach
                        </div>
                    @endif

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="{{$nguoidung->password}}" />
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