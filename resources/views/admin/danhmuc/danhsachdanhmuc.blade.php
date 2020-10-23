
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            @if(session('suathanhcong'))
                <script>alert('{{session('suathanhcong')}}')</script>
            @endif

            @if(session('themthanhcong'))
                <script>alert('{{session('themthanhcong')}}')</script>
            @endif
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dsdanhmuc as $dm)
                    <tr class="odd gradeX" align="center">
                        <td>{{$dm->id_danhmuc}}</td>
                        <td>{{$dm->ten}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{asset('admin/danhmuc/xoa/'.$dm->id_danhmuc)}}" onclick="return checkdel()"> Xoá</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{asset('admin/danhmuc/sua/'.$dm->id_danhmuc)}}">Sửa</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection