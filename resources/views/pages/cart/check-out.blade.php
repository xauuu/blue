@extends('layout')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Thanh toán</h4>
            <div class="site-pagination">
                <a href="">Trang chủ</a> /
                <a href="">Giỏ hàng</a>/
                <a href="">Thanh toán</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->


    <!-- checkout section  -->
    <section class="checkout-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-2 order-lg-1">
                    <form method="post" action="{{ URL::to('/save-checkout') }}" class="checkout-form">
                        {{ csrf_field() }}
                        <div class="cf-title">Địa chỉ nhận hàng</div>
                        <div class="row address-inputs">
                            <div class="col-md-6">
                                <input type="text" placeholder="Họ" name="firstname" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Tên" name="lastname" required>
                            </div>
                            <div class="col-md-4">
                                <select name="city" id="city" class="choose" required>
                                    <option value="">Chọn tỉnh, thành phố</option>
                                    @foreach ($city as $item)
                                        <option value="{{ $item->matp }}">{{ $item->name_city }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="district" id="district" class="choose" required>
                                    <option value="">Chọn quận, huyện</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="wards" id="wards" required>
                                    <option value="">Chọn xã, phường</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <input type="text" placeholder="Địa chỉ" name="address" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" placeholder="Số điện thoại" name="phone" required>
                            </div>
                        </div>
                        <div class="cf-title">Phương thức thanh toán</div>
                        <div class="payment-list">
                            <div class="row radio mb-1">
                                <input id="sex-male" type="radio" name="payment" value="Thanh toán khi nhận hàng"
                                    checked="checked" />
                                <label for="sex-male">Thanh toán khi nhận hàng</label>
                            </div>
                            <div class="row radio">
                                <input id="sex-female" type="radio" name="payment" value="Thanh toán bằng thẻ tín dụng" />
                                <label for="sex-female">Thanh toán bằng thẻ tín dụng</label>
                            </div>
                        </div>
                        <button class="site-btn submit-order-btn">Đặt hàng</button>
                    </form>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                    <div class="checkout-cart">
                        <h3>Giỏ hàng của bạn</h3>
                        @php
                        $cart = Cart::content();
                        @endphp
                        <ul class="product-list">
                            @foreach ($cart as $item)
                                <li>
                                    <div class="pl-thumb"><img
                                            src="{{ URL::asset('uploads/product/' . $item->options->image) }}" alt=""></div>
                                    <h6>{{ $item->name }} x {{ $item->qty }}</h6>
                                    <p>{{ number_format($item->price * $item->qty) }} VND</p>
                                </li>
                            @endforeach

                        </ul>
                        <ul class="price-list">
                            <li>Tổng<span>{{ number_format(Cart::subtotal(0, '', '')) }} VND</span></li>
                            <li>Phí vận chuyển<span>free</span></li>
                            @if (session('coupon'))
                                @foreach (session('coupon') as $item => $cou)
                                    @if ($cou['coupon_feature'] == 1)
                                        @php
                                        $total_coupon = $cou['coupon_number']*Cart::subtotal(0, '', '')/100;
                                        @endphp
                                    @else
                                        @php
                                        $total_coupon = $cou['coupon_number'];
                                        @endphp
                                    @endif
                                    <li>Mã giảm giá<span>-{{ number_format($total_coupon) }} VND</span></li>
                                    <li class="total">Tổng
                                        cộng<span>{{ number_format(Cart::subtotal(0, '', '') - $total_coupon) }} VND</span>
                                    </li>
                                @endforeach
                            @else
                                <li class="total">Tổng cộng<span>{{ number_format(Cart::subtotal(0, '', '')) }} VND</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- checkout section end -->
@endsection
