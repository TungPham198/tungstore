<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\danhmuc;
class DanhMucController extends Controller
{
    //
    public function getDanhSach(){
    	$data['dsdanhmuc'] = danhmuc::all();
    	return view('admin.danhmuc.danhsachdanhmuc',$data);
    }

    public function getThem(){
    	return view('admin.danhmuc.themdanhmuc');
    }
    public function postThem(Request $requset){
        $this->validate($requset,
            [
                'ten'=>'required|unique:vp_danhmuc,ten|min:3|max:100'
            ],
            [
                'ten.required'=>'Bạn chưa nhập tên danh mục',
                'ten.unique'=>'Tên danh mục đã tồn tại',
                'ten.min'=>'Tên danh mục phải lớn hơn 3 kí tự',
                'ten.max'=>'Tên danh mục phải nhỏ hơn 100 kí tự'

            ]);
        $ten = $requset->ten;
        $tenkhongdau = str::slug($requset->ten);
        $danhmuc = new DanhMuc();
        $danhmuc->ten = $ten;
        $danhmuc->tenkhongdau = $tenkhongdau;
        $danhmuc->save();
        return redirect('admin/danhmuc/danhsach')->with('themthanhcong','Thêm Thành Công');
    }

    public function getSua($id){
        $dm = danhmuc::find($id);
    	return view('admin.danhmuc.suadanhmuc',['dm'=>$dm]);
    }
    public function postSua(Request $request,$id){
        $dm = danhmuc::find($id);
        $this->validate($request,
            [
                'ten'=>'required|unique:vp_danhmuc,ten|min:3|max:100'
            ],
            [
                'ten.required'=>'Bạn chưa nhập tên danh mục',
                'ten.unique'=>'Tên danh mục đã tồn tại',
                'ten.min'=>'Tên danh mục phải lớn hơn 3 kí tự',
                'ten.max'=>'Tên danh mục phải nhỏ hơn 100 kí tự'

            ]);
        $dm->ten = $request->ten;
        $dm->tenkhongdau = str::slug($request->ten);
        $dm->save();
        return redirect('admin/danhmuc/danhsach/')->with('suathanhcong','Sửa Thành Công');
    }

    public function getXoa($id){
        $dm = danhmuc::find($id);
        $dm->delete();
        return back();
    }
}
