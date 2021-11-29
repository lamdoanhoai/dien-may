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
                                <form role="form"action="{{URL::to('/save-brand-product')}}"method="post">
                                	{{csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                    <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Danh Mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô Tả Thương Hiệu</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_product_desc" id="ckeditor" placeholder="Mô tả danh mục">
                                </textarea>
                            </div>
                                <div class="form-group">
                                	 <label for="exampleInputPassword1">Hiển thị</label>
	                                     <select name="brand_product_status" class="form-control input-sm m-bot15">
	                                <option value="1">ẩn</option>
	                                <option value="0">Hiển thị</option>
	                            		</select>

                                </div>
                                
                                <button type="submit" name="add_brand_product" class="btn btn.info">thêm thương hiệu</button>
                        </div>
                    </section>

            </div>
@endsection