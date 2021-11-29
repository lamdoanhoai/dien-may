<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Session;
use App\Models\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request){
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        $productId = $request->productid_hidden;
        $quantity=$request->qty;
        $product_info = DB::table('tbl_product')->where('product_id',$productId)->first(); 
         
        $data['id']=$product_info->product_id;
        $data['qty']=$quantity;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['weight']=$product_info->product_price;
        $data['options']['images']=$product_info->product_images;
        Cart::add($data);
        Cart::setGlobalTax(0);
        return Redirect::to('/show_cart');
    }
    public function show_cart(){
       $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','0')->take(4)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get(); 
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get(); 
        return view('pages.cart.show_cart')->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
    }
    public function delete_to_cart($rowId){
        Cart:: update($rowId,0);
         return Redirect::to('/show_cart');
    }
    public function update_cart_quantity(Request $request){
        $rowId=$request->rowId_cart;
        $qty = $request ->cart_quantity;
        cart::update($rowId,$qty);
         return Redirect::to('/show_cart');
    }
}