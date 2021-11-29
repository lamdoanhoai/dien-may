@extends('layout1')
@section('content')
@foreach($product_details as $key => $value)
<div class="product-details"><!--product-details-->
	<style type="text/css">
		.LSSLideOuter .ISPager . ISGAllery img{
			display: block;
			height: 120px;
			max-width: 100%;
		}

	</style>
						<div class="col-sm-5">
								<ul id="imageGallery">
									@foreach($gallery as $key => $gal)
									  <li data-thumb="{{URL::to('/public/uploads/gallery/'.$gal->gallery_images)}}" data-src="{{URL::to('/public/uploads/gallery/'.$gal->gallery_images)}}">
									    <img width="100%" src="{{URL::to('/public/uploads/gallery/'.$gal->gallery_images)}}" />
									  </li>
									  @endforeach
									</ul>
							</div>

						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2>{{$value->product_name}}</h2>
								<p>Mã sản phẩm: {{$value->product_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('/save-cart')}}" method="POST">
									{{csrf_field()}}
								<span>
									<span>{{number_format($value->product_price).'VNĐ'}}</span>
									<label>Quantity:</label>
									<input name="qty" type="number"min="1"  value="1" />
									<input name="productid_hidden" type="hidden" value="{{$value->product_id}}" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm Giỏ Hàng
									</button>
								</span>
								</form>
								<p><b>Tình trạng:</b> còn hàng</p>
								<p><b>điều kiện:</b> hàng mới</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh Mục:</b> {{$value->category_name}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
								<li><a href="#reviews" data-toggle="tab">Dánh Giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade  active in" id="details" >
								<p>{!!$value->product_desc!!}</p>

							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
								</div>					
							<div class="tab-pane fade" id="reviews" >
								<div class="col-sm-12">
									<ul>
									</ul>
									<p>Mời ban nhập phiếu đánh giá</p>
									<p><b>Nhập thông tin</b></p>
									
									<form action="#">
										<span>
											<input type="text" placeholder="Họ Tên"/>
											<input type="email" placeholder="Email"/>
										</span>
										<textarea name="" ></textarea>
										<b> </b> <img src="images/product-details/rating.png" alt="" />
										<button type="button" class="btn btn-default pull-right">
											Gửi
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div>
					<!--/category-tab-->
										@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->product_id)}}">
											 <div class="single-products">
		                                        <div class="productinfo text-center">
		                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_images)}}" alt="" />
		                                            <h2>{{number_format($lienquan->product_price).' '.'VNĐ'}}</h2>
		                                            <p>{{$lienquan->product_name}}</p>
		                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
		                                        </div>
		                                      
                                			</div>
										</div>
									</div>
							@endforeach		
								</div>
							</div>			
						</div>
					</div><!--/recommended_items-->
@endsection