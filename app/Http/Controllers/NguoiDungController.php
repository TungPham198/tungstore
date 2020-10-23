<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\nguoidung;
use Hash;

class NguoiDungController extends Controller
{
    //
    public function getDanhSach(){
    	$nguoidung = NguoiDung::all();
    	return view("admin.nguoidung.danhsachnguoidung",['nguoidung'=>$nguoidung]);
    }

    public function getThem(){
    	return view('admin.nguoidung.themnguoidung');
    }
    public function postThem(Request $request){
    	$nguoidung = new NguoiDung();
    	$this->validate($request
    		,[
    			'email'=>'required|unique:vp_users,email|min:3|max:100',
    			'password'=>'required|min:3|max:100',
    		]
    		,[
    			'email.required'=>'Bạn chưa nhập Email',
                'email.unique'=>'Email đã tồn tại',
                'email.min'=>'Email phải lớn hơn 3 kí tự',
                'email.max'=>'Email phải nhỏ hơn 100 kí tự',
                'password.required'=>'Bạn chưa nhập Password',
                'password.min'=>'Password phải lớn hơn 3 kí tự',
                'password.max'=>'Password phải nhỏ hơn 100 kí tự',
    		]);
    	$nguoidung->email = $request->email;
    	$nguoidung->password = bcrypt($request->password);
    	$nguoidung->level = $request->level;
    	$nguoidung->save();
    	return back()->with('themthanhcong','Thêm thành công người dùng');
    }

    public function getSua($id){
    	$nguoidung = NguoiDung::find($id);
    	return view('admin.nguoidung.suanguoidung',['nguoidung'=>$nguoidung]);
    }
    public function postSua(Request $request,$id){
    	$nguoidungcu = NguoiDung::find($id);
    	$nguoidungmoi = new NguoiDung();
    	$nguoidungmoi->id = $nguoidungcu->id;
    	$nguoidungmoi->email = $nguoidungcu->email;
    	$nguoidungmoi->password = $nguoidungcu->password;
    	$nguoidungmoi->level = $nguoidungcu->level;
    	$nguoidungcu->delete();
    	$this->validate($request
    		,[
    			'email'=>'required|unique:vp_users,email|min:3|max:100',
    			'password'=>'required|min:3|max:100',
    		]
    		,[
    			'email.required'=>'Bạn chưa nhập Email',
                'email.unique'=>'Email đã tồn tại',
                'email.min'=>'Email phải lớn hơn 3 kí tự',
                'email.max'=>'Email phải nhỏ hơn 100 kí tự',
                'password.required'=>'Bạn chưa nhập Password',
                'password.min'=>'Password phải lớn hơn 3 kí tự',
                'password.max'=>'Password phải nhỏ hơn 100 kí tự',
    		]);
    	$nguoidungmoi->email = $request->email;
    	if(bcrypt($request->password)==$nguoidungmoi->password)
    	{
    		$nguoidungmoi->password = $request->password;
    	}else
    	{
    		$nguoidungmoi->password = bcrypt($request->password);
    	}
    	$nguoidungmoi->level = $request->level;
    	$nguoidungmoi->save();
    	return redirect('admin/nguoidung/danhsach')->with('themthanhcong','Sửa thành công người dùng');
    }

    public function getXoa($id){
    	$nguoidung = NguoiDung::find($id)->delete();
    	return redirect('admin/nguoidung/danhsach');
    }


    public function getDoimk($id){
        $nguoidung = NguoiDung::find($id);
        return view('admin.nguoidung.doimk',['nguoidung'=>$nguoidung]);
    }
    public function postDoimk(Request $request,$id){
        $nguoidungcu = NguoiDung::find($id);
        $this->validate($request
            ,[
                'password'=>'required|min:3|max:100',
            ]
            ,[
                'password.required'=>'Bạn chưa nhập Password',
                'password.min'=>'Password phải lớn hơn 3 kí tự',
                'password.max'=>'Password phải nhỏ hơn 100 kí tự',
            ]);
        if(!hash::check($request->password,$nguoidungcu->password))
        {
            $nguoidungcu->password = bcrypt($request->password);
        }
        $nguoidungcu->save();
        return redirect('admin/nguoidung/danhsach')->with('themthanhcong','Sửa thành công người dùng');
    }
}
