<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\sanpham;
use Mail;
use App\donhang;
use App\chitiet;

class GioHangController extends Controller
{
    public function getThem($id){
    	$sanpham = SanPham::find($id);
        $trangthai = 2;
        if($sanpham->soluong>0){
            $trangthai = 1;
        }
    	Cart::add(['id'=>$sanpham->id_sanpham,'name'=>$sanpham->ten,'price'=>$sanpham->gia,'quantity'=>1,'attributes'=>['img'=>$sanpham->anh,'trangthai'=>$trangthai]]);
    	return redirect('GioHang/HienThi.html');
    }

    public function getHienThi(){
    	$data['tongtien'] = Cart::getTotal();
    	$data['sanphams'] = Cart::getContent();
        //dd($data['sanphams']);
    	return view('layouts.giohang',$data);
    }

    public function getXoa($id){
    	if($id=='All'){
    		Cart::clear();
    		return back();
    	}else{
    		Cart::remove($id);
    		return back();
    	}
    }

    public function getCapNhat(Request $request){
    	Cart::update($request->id, array(
		  'quantity' => array(
		      'relative' => false,
		      'value' => $request->qty),
		));
    }

    // public function postMail(Request $request){
    // 	$data['info'] = $request->all();
    // 	$mail = $request->mail;
    // 	$data['giohang'] = Cart::getContent();
    // 	$data['tongtien'] = Cart::getTotal();
    // 	Mail::send('layouts.mail',$data, function($message) use($mail){
    // 		$message->from('tungtuong98@gmail.com','Phạm Đình Tùng');
    // 		$message ->to($mail,$mail);
    // 		$message->cc('tungtuong98@gmail.com','Phạm Đình Tùng');
    // 		$message->subject('Xác nhận đơn hàng Tùng shop');
    // 	});
    // 	Cart::clear();
    // 	return redirect('hoanthanh');
    // }
    // 
    
    public function postMail(Request $request){
        $giohang = Cart::getContent();
        if(count($giohang)==0){
            return back()->with("khongsanpham","Vui lòng chọn sản phẩm truơcs khi đặt hàng");
        }
        foreach ($giohang as $gh) {
            $sp=SanPham::find($gh->id);
            if($gh->attributes->trangthai =='2' || $sp->soluong < $gh->quantity){
                return back()->with("hethang","Sản phẩm ".$gh->name." hiện không đủ số lượng theo yêu cầu của quý khách, quý khách vui lòng đặt hàng sau");
            }
        }
        $donhang = new DonHang();
        $donhang->ten = $request->ten;
        $donhang->sdt = $request->sdt;
        $donhang->mail = $request->mail;
        $donhang->diachi = $request->diachi;
        $donhang->tongtien = Cart::getSubTotal();
        $donhang->trangthai = 0;
        $donhang->save();
        foreach ($giohang as $gh) {
            $chitiet = new ChiTiet();
            $chitiet->madonhang = $donhang->id_donhang;
            $chitiet->masanpham = $gh->id;
            $chitiet->soluong = $gh->quantity;
            $chitiet->save();
        }
        Cart::clear();
        return redirect('hoanthanh');
    }

    public function hoanthanh(){
    	return view('layouts.hoanthanh');
    }
}
