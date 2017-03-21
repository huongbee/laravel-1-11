<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\Response;
use Session;
use Schema;
use App\Product;
use App\Slide;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Cart;
use App\TypeProducts;
use App\Customer;
use App\Bill;
use App\BillDetail;

class PageController extends Controller
{

	protected $limit = 25;

	public  function getIndex(){
		$slide = Slide::all();
		$product = Product::limit(25)->orderBy('id','DESC')->get()->toArray();

		$currentPage = LengthAwarePaginator::resolveCurrentPage();

	    //Create a new Laravel collection from the array data
	    $collection = new Collection($product);

	    //Define how many items we want to be visible in each page
	    $perPage = 8;

	    //Slice the collection to get the items to display in current page
	    $currentPageSearchResults = $collection->slice(($currentPage-1) * $perPage, $perPage)->all();

	    //Create our paginator and pass it to the view
	    $new_products= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
	    $new_products->setPath(route('index'));
	   // $products = $new_products;

	   //	dd($new_products);
		return view('page.trangchu',compact('slide','new_products'));
	}
	public function getLoai(){
		return view('page.loaisp');
	}

	public function getChitiet(){
		return view('page.chitiet');
	}

	public function getAddToCart(Request $req, $id){
		$product = Product::find($id);
		$oldCart = Session('cart') ? Session('cart') : null;
		$cart = new Cart($oldCart);
		$cart->add($product, $product->id);

	  	$req->session()->put('cart', $cart);
	  	return redirect()->back();
	}


	public function getDelItemCart($id){
		$oldCart = Session('cart')?Session::get('cart'):null;
		$cart = new Cart($oldCart);
		$cart->removeItem($id);
		if(count($cart->items>0)){
			Session::put('cart',$cart);	
		}
		else{
			Session::forget('cart');
		}
			
	}

	public function getCheckout(){
		if(Session::has('cart')){
            $oldCart = Session::get('cart');
    	    $cart = new Cart($oldCart);
    	    //dd($cart);
            return view('page.dat_hang',['product_cart'=>$cart->items,'totalPrice'=> $cart->totalPrice,'totalQty'=> $cart->totalQty]);
        }
        else{
        	return view('page.dat_hang');
        }
	}

	public function postCheckout(Request $req){
		$cart = Session::get('cart');

		$customer = new Customer;
		$customer->name = $req->full_name;
		$customer->gender = $req->gender;
		$customer->email = $req->email;
		$customer->address = $req->address;
		$customer->phone_number = $req->phone;
		$customer->note = $req->notes;
		$customer->save();

		$bill = new Bill;
		$bill->id_customer = $customer->id;
		$bill->date_order = date('Y-m-d');
		$bill->total = $cart->totalPrice;
		$bill->payment = $req->payment_method;
		$bill->note = $req->notes;
		$bill->save();

		foreach($cart->items as $key=>$value){
			$bill_detail = new BillDetail;
			$bill_detail->id_bill = $bill->id;
			$bill_detail->id_product = $key;//$value['item']['id'];
			$bill_detail->quantity = $value['qty'];
			$bill_detail->unit_price = $value['price']/$value['qty'];
			$bill_detail->save();
		}
		
		Session::forget('cart');
		return redirect()->back()->with('thongbao','Đặt hàng thành công');
	}

}
