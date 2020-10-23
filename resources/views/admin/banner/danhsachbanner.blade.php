
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                @if(session('suathanhcong'))
                    <script>alert('{{session('suathanhcong')}}')</script>
                @endif
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên banner</th>
                        <th>loai</th>
                        <th>Tuỳ Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banner as $bn)
                    <tr class="odd gradeX" align="center">
                        <td>{{$bn->id_banner}}</td>
                    	<td><img width="300rem" src="{{asset('upload/banner/'.$bn->anh)}}"></td>
                        <td>{{$bn->loai}}</td>
                        
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{asset('admin/banner/xoa/'.$bn->id_banner)}}"> Xoá</a>
                        <i class="fa fa-pencil fa-fw"></i> <a href="{{asset('admin/banner/sua/'.$bn->id_banner)}}">Sửa</a></td>
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