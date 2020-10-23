<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\danhmuc;
use App\sanpham;
use App\donhang;
use DB;

class SanPhamController extends Controller
{
    //
    public function getDanhSach(){
    	$sanpham = SanPham::all();
    	$danhmuc = DanhMuc::all();
    	return view('admin.sanpham.danhsachsanpham',['sanpham'=>$sanpham,'danhmuc'=>$danhmuc]);
    }

    public function getThem(){
    	$danhmuc = DanhMuc::all();
    	return view('admin.sanpham.themsanpham',['danhmuc'=>$danhmuc]);
    }
    public function postThem(Request $request){
    	$this->validate($request,
    		[
    			'ten'=>'required|unique:vp_danhmuc,ten|min:3|max:100',
    			'gia'=>'required',
    			'tinhtrang'=>'required',
    			'danhmuc'=>'required',
    // 			'anh'=>'required',
                'soluong'=>'required'
    		],
    		[
    			'ten.required'=>'Bạn chưa nhập tên',
                'ten.unique'=>'Tên danh mục đã tồn tại',
                'ten.min'=>'Tên danh mục phải lớn hơn 3 kí tự',
                'ten.max'=>'Tên danh mục phải nhỏ hơn 100 kí tự',
                'gia.required'=>'Bạn chưa nhập giá',
                'tinhtrang.required'=>'Bạn chưa điền tình trạng hàng',
                'danhmuc.required'=>'Bạn chưa chọn danh mục sản phẩm',
                'anh.required'=>'Bạn chưa chọn ảnh',
                'soluong.required'=>'Bạn chưa nhập số lượng'
    		]);
    	 
    	$sp = new SanPham();
    	if($request->hasFile('anh')){
    		$file = $request->file('anh');
    		//$duoi = $file->getClientOriginalExtension();
    // 		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg' && $duoi != 'JPG' && $duoi != 'JPEG' && $duoi != 'PNG'){
    // 			return back()->with('loianh','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
    // 		}
    		$name = $file->getClientOriginalName();
    		$hinh = str::random(4)."_".$name;
    		while(file_exists("public_html/upload/sanpham/".$hinh)){
    			$hinh = str::random(4)."_".$name;
    		}
    		
    		$file->move("upload/sanpham",$hinh);
    		$sp->anh = $hinh;
    	}else{
    		$sp->anh = "";
    	}
    	$sp->ten = $request->ten;
    	$sp->tenkhongdau = str::slug($request->ten);
    	$sp->gia = str_replace('.','',$request->gia);
    	$sp->baohanh = $request->baohanh;
    	$sp->phukien = $request->phukien;
    	$sp->tinhtrang = $request->tinhtrang;
    	$sp->khuyenmai = $request->khuyenmai;
    	$sp->mieuta = $request->mieuta;
    	$sp->dacbiet = $request->dacbiet;
    	$sp->danhmucsanpham = $request->danhmuc;
        $sp->soluong = $request->soluong;
    	$sp->save();
    	return back()->with('themthanhcong','Thêm thành công');
    }

    public function getSua($id){
    	$sanpham = SanPham::find($id);
    	$danhmuccu = DanhMuc::find($sanpham->danhmucsanpham);
    	$danhmuc = DanhMuc::all();
    	return view('admin.sanpham.suasanpham',['sanpham'=>$sanpham,'danhmuc'=>$danhmuc,'danhmuccu'=>$danhmuccu]);
    }
    public function postSua($id,Request $request){
    	$this->validate($request,
    		[
    			'ten'=>'required|unique:vp_danhmuc,ten|min:3|max:100',
    			'gia'=>'required',
    			'tinhtrang'=>'required',
    			'danhmuc'=>'required',
    		],
    		[
    			'ten.required'=>'Bạn chưa nhập tên',
                'ten.unique'=>'Tên danh mục đã tồn tại',
                'ten.min'=>'Tên danh mục phải lớn hơn 3 kí tự',
                'ten.max'=>'Tên danh mục phải nhỏ hơn 100 kí tự',
                'gia.required'=>'Bạn chưa nhập giá',
                'tinhtrang.required'=>'Bạn chưa điền tình trạng hàng',
                'danhmuc.required'=>'Bạn chưa chọn danh mục sản phẩm',
    		]);
    	$sp = SanPham::find($id);
    	if($request->hasFile('anh')){
    		$file = $request->file('anh');
    		$duoi = $file->getClientOriginalExtension();
    		if($duoi != 'jpg' && $duoi !='png' && $duoi !='jpeg'){
    			return back()->with('loianh','Bạn chỉ được chọn file đuôi jpg, png, jpeg');
    		}
    		$name = $file->getClientOriginalName();
    		$hinh = str::random(4)."_".$name;
    		while(file_exists("upload/sanpham/".$hinh)){
    			$hinh = str::random(4)."_".$name;
    		}
    		$file->move("upload/sanpham/",$hinh);
    		unlink('upload/sanpham/'.$sp->anh);
    		$sp->anh = $hinh;
    	}

    	$sp->ten = $request->ten;
    	$sp->tenkhongdau = str::slug($request->ten);
    	$sp->gia = $request->gia;
    	$sp->baohanh = $request->baohanh;
    	$sp->phukien = $request->phukien;
    	$sp->tinhtrang = $request->tinhtrang;
    	$sp->khuyenmai = $request->khuyenmai;
    	$sp->soluong = $request->soluong;
    	$sp->mieuta = $request->mieuta;
    	$sp->dacbiet = $request->dacbiet;
    	$sp->danhmucsanpham = $request->danhmuc;
    	$sp->save();
    	return redirect('admin/sanpham/danhsach')->with('suathanhcong','Sửa thành công');
    }

    public function getXoa($id){
    // 	$sp = sanpham::find($id);
    // 	if(file_exists('upload/sanpham/'.$sp->anh)){
    // 		unlink('upload/sanpham/'.$sp->anh);
    // 	}
    //     $sp->delete();
    //     return back();
    $ctdh = DB::table('vp_chitietdonhang')->where('masanpham',$id)->count();
        if($ctdh==0){
            $sp = sanpham::find($id);
            // if(file_exists('upload/sanpham/'.$sp->anh)){
            //     unlink('upload/sanpham/'.$sp->anh);
            // }
            $sp->delete();
        }else{
            $ctdh1 = DB::table('vp_chitietdonhang')->where('masanpham',$id)->get();
            //dd($ctdh1);
            foreach ($ctdh1 as $key) {
                DB::table('vp_chitietdonhang')->where('masanpham',$id)->delete();
                $dh = DB::table('vp_donhang')->where('id_donhang',$key->madonhang)->get();
                foreach ($dh as $key1) {
                    DB::table('vp_chitietdonhang')->where('madonhang',$key1->id_donhang)->delete();
                }
                DB::table('vp_donhang')->where('id_donhang',$key->madonhang)->delete();
                # code...
            }
        	$sp = sanpham::find($id);
        	if(file_exists('upload/sanpham/'.$sp->anh)){
        		unlink('upload/sanpham/'.$sp->anh);
        	}
            $sp->delete();
        }
        return back();
    }

    public function soluong(){
        $sanpham = SanPham::all();
        foreach ($sanpham as $sp) {
            $sp->soluong = 0;
            $sp->save();
        }
    }
}
