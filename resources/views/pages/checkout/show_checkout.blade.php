@extends('layout')
@section('content')
<section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                  <li><a href="#">Trang chủ</a></li>
                  <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div><!--/breadcrums-->
            <div class="register-req">
                <p>Làm ơn đăng ký hoặc đăng nhập để xem lại lịch sử mua bán</p>
            </div><!--/register-req-->

                    <div class="col-sm-12 clearfix">
                        <div class="bill-to">
                            <p>Điền thông tin</p>
                            <div class="form-one">
                                <form   action="{{URL::to('/save-checkout-customer')}}" method="post">
                                    {{csrf_field()}}
                                    <input type="text" name="shipping_email" placeholder="Email:">
                                    <input type="text" name="shipping_name" placeholder="Họ và tên:">
                                    <input type="text" name="shipping_address" placeholder="Địa chỉ :">
                                    <input type="text" name="shipping_phone" placeholder="Số điện thoại: ">
                                     <textarea name="shipping_notes"  placeholder="ghi chú đơn hàng" rows="16"></textarea>
                                    <input type="submit" value="Thanh toán" name="send_oder" class="btn btn-primary btn-sm">
                                </form>
                            </div>
                           
                        </div>
                    </div>  
            </div>
            
    </section> <!--/#cart_items-->
@endsection