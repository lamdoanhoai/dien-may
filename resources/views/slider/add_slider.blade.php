@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           thêm thương hiệu sản phẩm
                        </header>
                        <div class="panel-body">
                        	<?php
							   $message = Session::get('message');
							   if ($message) {
							      echo '<span class="text-alert">',$message.'</span>';
							      Session::put('message',null);
							   }
							   ?>
                            <div class="position-center">
                                <form role="form"action="{{URL::to('/insert-slider')}}"method="post" enctype="multipart/form-data">
                                	{{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slie</label>
                                    <input type="text" name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="slide">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="slider_desc" id="ckeditor" placeholder="Mô tả slider">
                                </textarea>
                            </div>

                                <div class="form-group">
                                	 <label for="exampleInputPassword1">Hiển thị</label>
	                                     <select name="slider_status" class="form-control input-sm m-bot15">
	                                <option value="1">ẩn</option>
	                                <option value="0">Hiển thị</option>
	                            		</select>

                                </div>
                                
                                <button type="submit" name="add_slider" class="btn btn.info">thêm slider</button>
                        </div>
                    </section>

            </div>
@endsection