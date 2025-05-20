@extends('order')
@section('content')
    <section class="oder-confirm p-to-top">
        <div class="container">
            <div class="row-flex">
                <div class="order-confirm-content">
                    <p>Giao dịch thanh toán <span style="font-weight: bold;color: red">Thất bại!</span>! <br>
                        <p>Thanh toán thất bại, có vẻ như đã sảy ra lỗi trong khi thanh toán</p>
                        <p>Quý khách vui lòng thử lại</p>
                        <p>Cảm ơn vì đã tin tưởng và sử dụng dịch vụ của chúng thôi, nếu có thắc mắt hay vấn đề cần hổ trợ vui lòng liên hệ với chúng tôi qua số điện thoại <span style="font-weight: bold;color: red">"0707463127"</span> hoặc email <span style="font-weight: bold;color: red">"vietchymte@gmail.com"
                        </p>
                    <br>
                   <a href="/cart" class="button">Quay lại giỏ hàng</a>
                </div>
            </div>
        </div> 
    </section>
@endsection