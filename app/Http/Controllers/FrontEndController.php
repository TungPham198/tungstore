<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;
use App\danhmuc;
use App\binhluan;

class FrontEndController extends Controller
{
    public function getHome(){
    	$sanpham['spdacbiet'] = SanPham::where('dacbiet',1)->orderBy('id_sanpham','desc')->take(4)->get();
    	$sanpham['spmoi'] = SanPham::orderBy('id_sanpham','desc')->take(4)->get();
    	return view('layouts.home',$sanpham);
    }

    public function getChiTiet($id){
    	$sanpham = SanPham::find($id);
    	$binhluan = BinhLuan::where('sanpham_binhluan',$id)->get();
    	return view('layouts.chitietsanpham',['sanpham'=>$sanpham,'binhluan'=>$binhluan]);
    }

   	public function getDanhMuc($id){
   		$danhmuc = DanhMuc::find($id);
    	$sanpham = SanPham::where('danhmucsanpham',$id)->orderBy('id_sanpham','desc')->paginate(8);
    	return view('layouts.danhmuc',['danhmuc'=>$danhmuc,'sanpham'=>$sanpham]);
    }

    public function postBinhLuan(Request $request,$id){
   		$binhluan = new BinhLuan();
   		$binhluan->mail_binhluan = $request->mail;
   		$binhluan->ten_binhluan = $request->ten;
   		$binhluan->noidung_binhluan = $request->noidung;
   		$binhluan->sanpham_binhluan = $id;
   		$binhluan->save();
    	return back();	
    }

    public function getSeach(Request $requset){
    	$seach = $requset->text;
    	$tukhoa = $seach;
    	$seach = str_replace(' ', '%', $seach);
    	$item = SanPham::where('ten','like','%'.$seach.'%')->paginate(16);
    	return view('layouts.timkiem',['timkiem'=>$item,'tukhoa'=>$tukhoa]);
    }

    public function getAll(){
    	$sanpham = SanPham::paginate(16);
    	return view('layouts.tatcasanpham',['sanpham'=>$sanpham]);
    }
}
