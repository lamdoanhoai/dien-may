<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class SliderController extends Controller
{
        public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return redirect::to('dashboard');
        }else{
            return redirect::to('admin')->send();
        }
    }
    public function manage_slider(){
        $all_slide = Slider::orderBy('slider_id','DESC')->get();
        return view ('slider.list_slider')->with(compact('all_slide'));
    }
    public function add_slider(){

        return view ('slider.add_slider');
    }
     public function insert_slider(Request $request){
        $this ->AuthLogin();
        $data = $request->all();
        
                $get_image = request('slider_image');
                if ($get_image) {
                    $get_name_image=$get_image->getClientOriginalName();
                    $name_image=current(explode('.',$get_name_image));
                    $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/slider',$new_image);  
                    $slider = new Slider();
                    $slider->slider_name = $data['slider_name'];
                    $slider->slider_image = $new_image;
                    $slider->slider_status = $data['slider_status'];
                    $slider->slider_desc = $data['slider_desc'];
                    $slider->save();
                    Session::put('message','thêm slider thành công');
                    return Redirect::to('add-slider'); 
                }else{
                Session::put('message','bạn chưa có ảnh');
                return Redirect::to('add-slider');
                }


     }
     public function unactive_slider($slider_id){
        $this ->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>1]);
        Session::put('message',' ẩn banner thành công');
        return Redirect::to('manage-slider');
    }
    public function active_slider($slider_id){
        $this ->AuthLogin();
        DB::table('tbl_slider')->where('slider_id',$slider_id)->update(['slider_status'=>0]);
        Session::put('message',' hiện banner thành công');
        return Redirect::to('manage-slider');

    }
       public function delete_slider(Request $request, $slide_id){
        $slider = Slider::find($slide_id);
        $slider->delete();
        Session::put('message','Xóa slider thành công');
        return redirect()->back();

    }
}
