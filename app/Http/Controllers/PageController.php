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

}
