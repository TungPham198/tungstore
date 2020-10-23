<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donhang;
use App\chitiet;
use App\sanpham;
use Mail;

class DonHangController extends Controller
{
    public function getDanhSach(){
    	$data['dsdonhang'] = DonHang::all();
    	return view('admin.donhang.danhsachdonhang',$data);
    }

    public function getChiTiet($id){
    	$donhang = DonHang::find($id);
    	$chitiet = ChiTiet::where('madonhang', $donhang->id_donhang)->get();
    	$sanpham = SanPham::all();
    	return view('admin.donhang.chitiet',['donhang'=>$donhang,'chitiet'=>$chitiet,'sanpham'=>$sanpham]);
    }

    public function Huy($id){
        $donhang = DonHang::find($id);
        // $chitiet = ChiTiet::all();
        // foreach ($chitiet as $ct) {
        //     if ($ct->madonhang==$donhang->id_donhang) {
        //         $ct->delete();
        //     }
        // }
        $donhang->trangthai=3;
        $donhang->save();
        return redirect('admin\donhang\danhsach');
    }

    public function Mail($id){
    	$data['info'] = DonHang::find($id);
    	$data['chitiet'] = ChiTiet::where('madonhang', $data['info']->id_donhang)->get();
        $soluong = ChiTiet::where('madonhang', $data['info']->id_donhang)->value('soluong');
    	$data['sanpham'] = SanPham::all();

    	$mail = $data['info']->mail;
    	// $data['giohang'] = $sanpham;
    	//return view('layouts.mail',$data);
    	Mail::send('layouts.mail',$data, function($message) use($mail){
    		$message->from('tungtuong98@gmail.com','Phạm Đình Tùng');
    		$message ->to($mail,$mail);
    		$message->cc('tungtuong98@gmail.com','Phạm Đình Tùng');
    		$message->subject('Xác nhận đơn hàng Tùng shop');
    	});
    	$donhang = DonHang::find($id);
        foreach ($data['chitiet'] as $ct) {
            $sanpham = SanPham::find($ct->masanpham);
            $sanpham->soluong = $sanpham->soluong - $soluong;
            $sanpham->save();
        }
    	$donhang->trangthai = 1;
    	$donhang->save();
    	return redirect('admin\donhang\danhsach');

    }

}
