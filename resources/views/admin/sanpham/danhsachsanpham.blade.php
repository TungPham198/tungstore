
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
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Ảnh</th>
                        <th>Danh Mục</th>
                        <th>Mô Tả</th>
                        <th>Số Lượng</th>
                        <th>Tuỳ Chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanpham as $sp)
                    <tr class="odd gradeX" align="center">
                        <td>{{$sp->id_sanpham}}</td>
                        <td>{{$sp->ten}}</td>
                        <td>{{$sp->gia}}</td>
                        <td><img width="100px" src="upload/sanpham/{{$sp->anh}}"></td>
                        <td>
                        @foreach($danhmuc as $dm)
                            @if($sp->danhmucsanpham==$dm->id_danhmuc)
                                {{$dm->ten}}
                            @endif
                        @endforeach
                        </td>
                        <td>{{$sp->mieuta}}</td>
                        <td>{{$sp->soluong}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{asset('admin/sanpham/xoa/'.$sp->id_sanpham)}}"> Xoá</a>
                        <i class="fa fa-pencil fa-fw"></i> <a href="{{asset('admin/sanpham/sua/'.$sp->id_sanpham)}}">Sửa</a></td>
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