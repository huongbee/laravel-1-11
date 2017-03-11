<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Session;
use Schema;

class PageController extends Controller
{
	/*buổi 2*/
		public function getData(){
			echo 23323;
		}

		public function getTen($ten){
			return 'Ten cua ban la: '.$ten;
		}

		public function testRoute(){
			return redirect()->route('route1','Huong');
		}

	    public function testRoute2(Request $request){
	    	return $request->path();
	    }

	    public function testRoute3(Request $request){
	    	if($request->isMethod('get')){
	    		echo 'Day la phuong thuc get';
	    	}
	    	else{
	    		echo 'ko phai phuong thuc get';
	    	}
	    }

	    public function getForm(){
	    	return view('form');
	    }

	    public function postForm(Request $req){
	    	return $req->all();
	    }

	    public function setCookie(){
	    	 $response = new Response;
	    	 $response->withCookie('hoten', 'Laravel Khoa Pham',1 );
	    	 return $response;
	    }

	    public function getCookie(Request $req){
	    	return $req->cookie('hoten');
	    }
	//end buổi 2

	    public function getFormUpload(){
	    	return view('upload.upload_file');
	    }

	    public function postFormUpload(Request $req){
	    	if($req->hasFile('file')){
	    		//echo 'bạn đã chọn file';
	    		$image = $req->file;

	    		if($image->getSize() > 1024*700){
	    			echo 'file quá lớn';
	    		}
	    		else{
	    			$filename = $image->getClientOriginalName();
	    			$name = explode('.',$filename);
	    			//print_r($name);
	    			$filename = $name[0].time().'.'.$image->getClientOriginalExtension();
	    			$check = 1;
	    			$check2 = 1;
	    			$file_type = array('jpg','png');
	    			$type = $image->getClientOriginalExtension();
	    			foreach($file_type as $t){
	    				if($type == $t){
	    					$check = $check+1;
	    				}
	    			}
	    			if($check > $check2){
	    				$image->move('./images/',$filename);
	    				echo 'upload thành công';
	    			}
	    			else{
	    				echo 'file ko đúng định dạng';
	    			}

	    		}
	    	}
	    	else{
	    		echo 'bạn chưa chọn file';
	    	}
	    }

	public function getSentData(){
		$monhoc = array('PHP', 'IOS', 'Android');
		return view('upload.sent_data',['monhoc'=>$monhoc]);
	}

	public function getFormMiddleware(){
		return view('middleware.kiemtra');
	}

	public function kiemtraMiddleware(){
		return view('upload.upload_file');
	}

	public function createSession(){
		Session::put(['khoahoc'=>'Laravel','giangvien'=>'Khoa Phạm']);
		if(Session::has('khoahoc')){
			echo Session::get('khoahoc');
			echo '<br>';
			echo Session::get('giangvien');
		}
		else{
			echo 'chưa có session';
		}
	}

	public function delSession(){
		if(Session::has('khoahoc')){
			Session::forget('khoahoc');
			echo 'đã xóa sesion khoahoc';
			echo Session::get('khoahoc');
			echo '<br>';
			echo Session::get('giangvien');
		}
	}


	public function getTaoBang(){
		Schema::table('loaisanpham',function($table){
			$table->dropColumn('name');
		});
		echo 'xóa cột thành công';
	}

	public function getThemCot(){
		Schema::table('loaisanpham',function($table){
			//$table->rememberToken();
			$table->timestamps();
		});
		echo 'thêm cột  thành công';
	}

	public function getSuaTen(){
		Schema::rename('loaisanpham', 'product_type');
		echo 'sửa tên thành công';
	}


	public function getDataUser(){
		//$users = \DB::table('users')->orderBy('id','desc')->first();
		$users = \DB::table('users')->select('id','name');
		$users2 = $users->addSelect('email')->where('id',9)
																				->orWhere('name','Hương')->get();
		dd($users2);
	}

}
