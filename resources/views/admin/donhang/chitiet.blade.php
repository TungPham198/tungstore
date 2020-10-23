
@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="border border-primary ">
            <div class=" bg-info">
                <div class="col-lg-12 text text-center">
                    <h1 class="">Thông tin khách hàng</h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-bordered table-borderless bg-success">
                    <tr align="center" >
                        <th class="text text-center">ID</th>
                        <th class="text text-center">Tên</th>
                        <th class="text text-center">SDT</th>
                        <th class="text text-center">Mail</th>
                        <th class="text text-center">Địa Chỉ</th>
                        <th class="text text-center">Tổng tiền</th>
                    </tr>
                    <tr class="odd gradeX" align="center">
                        <td>{{$donhang->id_donhang}}</td>
                        <td>{{$donhang->ten}}</td>
                        <td>{{$donhang->sdt}}</td>
                        <td>{{$donhang->mail}}</td>
                        <td>{{$donhang->diachi}}</td>
                        <td>{{number_format($donhang->tongtien,0,',','.')}}</td>
                    </tr>
                </table>
            </div>

            <div class="bg-info">
                <div class="col-lg-12">
                    <h1 class="text text-center">Thông tin đơn hàng</h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-bordered table-striped table-borderless table-hover bg-success">
                    <tr align="center">
                        <th class="text text-center">Ảnh</th>
                        <th class="text text-center">Tên sản phẩm</th>
                        <th class="text text-center">Giá</th>
                        <th class="text text-center">Phụ kiện</th>
                        <th class="text text-center">Bảo hành</th>
                        <th class="text text-center">Số Lượng</th>
                    </tr>
                    @foreach($chitiet as $ct)
                        @foreach($sanpham as $sp)
                            @if($ct->masanpham==$sp->id_sanpham)
                                <tr class="odd gradeX" align="center">
                                    <td><img width="40rem" src="{{asset('upload/sanpham/'.$sp->anh)}}"></td>
                                    <td>{{$sp->ten}}</td>
                                    <td>{{number_format($sp->gia,0,',','.')}}</td>
                                    <td>{{$sp->phukien}}</td>
                                    <td>{{$sp->baohanh}}</td>
                                    <td>{{$ct->soluong}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                </table>
            </div>
            <div class="text-center">
                <a href="{{asset('admin/donhang/mail/'.$donhang->id_donhang)}}"><button class="btn btn-info">Giao Hàng</button></a>
                <a href="{{asset('admin/donhang/huy/'.$donhang->id_donhang).'.html'}}"><button class="btn btn-danger">Huỷ Đơn Hàng</button></a>
            </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection