
@extends('admin.layout.index')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
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
                        <th>Email</th>
                        <th>Level</th>
                        <th>Password</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nguoidung as $nd)
                    <tr class="odd gradeX" align="center">
                        <td>{{$nd->id}}</td>
                        <td>{{$nd->email}}</td>
                        <td>{{$nd->level}}</td>
                        <td>{{$nd->password}}</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{asset('admin/nguoidung/xoa/'.$nd->id)}}"> Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{asset('admin/nguoidung/sua/'.$nd->id)}}">Edit</a></td>
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