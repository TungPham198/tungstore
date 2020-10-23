
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh sách đơn hàng</h1>
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
                        <th>Tên</th>
                        <th>SDT</th>
                        <th>Mail</th>
                        <th>Địa Chỉ</th>
                        <th>Trạng Thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dsdonhang as $dh)
                    <tr class="odd gradeX" align="center">
                        <td><a href="{{asset('admin/donhang/chitiet/'.$dh->id_donhang.'.html')}}">{{$dh->id_donhang}}</a></td>
                        <td>{{$dh->ten}}</td>
                        <td>{{$dh->sdt}}</td>
                        <td>{{$dh->mail}}</td>
                        <td>{{$dh->diachi}}</td>
                        <td>
                            <a href="{{asset('admin/donhang/chitiet/'.$dh->id_donhang.'.html')}}">
                                @if($dh->trangthai==0)Chưa chốt đơn
                                @elseif($dh->trangthai==1)Đã chốt đơn
                                @else Đã huỷ
                                @endif
                            </a>
                        </td>
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