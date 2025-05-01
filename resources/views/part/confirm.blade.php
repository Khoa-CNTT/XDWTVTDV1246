
<section class="oder-confirm p-to-top">
    <div class="container">
        <div class="row-flex row-flex-product-detail">
            <p class="heading-text">
                Xác Nhận Đơn Hàng: 
                <span style="font-weight: bold;" id="user-order">
                    {{ $name }} #{{ $vnp_TxnRef }}
                </span>
            </p>
            {{-- <p>                
                <br>
                <span>
                    {{$Product->Name }}
                </span>
            </p> --}}
        </div> 
        <div class="row-flex">
            <div class="order-confirm-content">

                <p>Đơn hàng của bạn đà thành công, chúng tôi sẽ <span style="font-weight: bold;color: red">"không hoàn tiền lại"</span> nếu bạn hủy đơn hàng <br>
                    
                    <span style="font-size: small;" >Cảm ơn bạn đã tin tưởng vào sử dụng dịch vụ của chúng tôi</span></p>
                <br>
                <br>
                <a href="/dashboard" class="button">Quay Lại Trang Chủ</a>  
            </div>
        </div>
    </div> 
</section>

