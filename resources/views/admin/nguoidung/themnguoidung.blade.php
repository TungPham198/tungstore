
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="{{asset('admin/nguoidung/them')}}" method="POST">
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
                        <script>alert('{{session('loiathem')}}')</script>
                    @endif
                    @csrf()
                    <div class="form-group">
                        <label>Email</label>
                        <input type="mail" class="form-control" name="email" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                    </div>
                    <div class="form-group">
                        <label>User Level</label>
                        <label class="radio-inline">
                            <input name="level" value="1" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="2" type="radio">Nhân Viên
                        </label>
                        <label class="radio-inline">
                            <input name="level" value="3" type="radio">Khách Hàng
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm Mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
            <!-- /.container-fluid -->
</div>
@endsection