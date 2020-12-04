@extends('layout')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Giỏ hàng</h4>
            <div class="site-pagination">
                <a href="{{ URL::to('/home') }}">Trang chủ</a> /
                <a href="">Giỏ hàng</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <form action="{{ URL::to('/update-cart') }}" method="post">
                        @csrf
                        <div class="cart-table">
                            <h3>Giỏ hàng của bạn</h3>
                            <div class="cart-table-warp">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-th">Sản phẩm</th>
                                            <th class="quy-th">Số lượng</th>
                                            <th class="total-th">Tổng tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $cart = Cart::content();
                                        @endphp
                                        @foreach ($cart as $item)
                                            <tr>
                                                <td class="product-col">
                                                    <img src="{{ URL::asset('uploads/product/' . $item->options->image) }}"
                                                        alt="">
                                                    <div class="pc-title">
                                                        <h4>{{ $item->name }}</h4>
                                                        <p>{{ number_format($item->price) }} VND</p>
                                                    </div>
                                                </td>
                                                <td class="quy-col">
                                                    <div class="quantity">
                                                        <div class="pro-qty">
                                                            <input name="qty[{{ $item->rowId }}]" type="text"
                                                                value="{{ $item->qty }}">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="total-col">
                                                    <h4>{{ number_format($item->price * $item->qty) }} VND</h4>
                                                </td>
                                                <td class="size-col"><a class="delete"
                                                        href="{{ URL::to('delete-item/' . $item->rowId) }}">×</a></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                            <div class="total-cost">
                                <h6>Tổng cộng <span>{{ number_format(Cart::subtotal(0, '', '')) }} VND</span></h6>
                            </div>
                        </div>
                        <div class="row justify-content-between mt-2">
                            <div class="col-lg-3 card-right">
                                <a href="{{ URL::to('/shop') }}" class="site-btn sb-dark">Tiếp tục mua hàng</a>
                            </div>
                            <div class="col-lg-3 card-right">
                                <button style="padding: 18px 47px 14px;" type="submit" class="site-btn sb-dark">Cập
                                    nhật</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (!$cart->isEmpty())
                <div class="row justify-content-between mt-3">
                    <div class="col-lg-4 card-right">
                        <h5 class="text-center mb-2">MÃ GIẢM GIÁ</h5>
                        <form action="{{ URL::to('/check-coupon') }}" class="promo-code-form" method="post">
                            @csrf
                            <input name="coupon_code" type="text" placeholder="Nhập mã giảm giá">
                            <button type="submit">Gửi</button>
                        </form>
                        @if (Session::has('success'))
                            <div class="alert alert-success">{!! Session::get('success') !!}</div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{!! Session::get('error') !!}</div>
                        @endif
                        @if (session('coupon'))
                            <div class="checkout-cart">
                                <ul class="price-list">
                                    <li class="font-weight-bold">Đang sử dụng</li>
                                    @foreach (session('coupon') as $item => $cou)
                                        <li>Mã giảm giá <span>{{ $cou['coupon_code'] }}</span></li>
                                        @if ($cou['coupon_feature'] == 1)
                                            <li>Giảm <span>{{ $cou['coupon_number'] }}%</span></li>
                                        @else
                                            <li>Giảm <span>{{ number_format($cou['coupon_number']) }} VND</span></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-5 card-right">
                        <div class="checkout-cart mb-3">
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
                                        <li>Giá giảm<span>-{{ number_format($total_coupon) }} VND</span></li>
                                        <li class="total">Tổng
                                            cộng<span>{{ number_format(Cart::subtotal(0, '', '') - $total_coupon) }}
                                                VND</span>
                                        </li>
                                    @endforeach
                                @else
                                    <li class="total">Tổng cộng<span>{{ number_format(Cart::subtotal(0, '', '')) }}
                                            VND</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <a href="{{ URL::to('/check-out') }}" class="site-btn">Thanh toán</a>
                    </div>
                </div>
            @endif

        </div>
    </section>
    <!-- cart section end -->

@endsection
