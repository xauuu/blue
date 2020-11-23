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
            <div class="row">
                <div class="col-lg-12">
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
                                            <img src="{{ URL::asset('uploads/product/'.$item->options->image) }}" alt="">
                                            <div class="pc-title">
                                                <h4>{{ $item->name }}</h4>
                                                <p>{{ number_format($item->price) }} VND</p>
                                            </div>
                                        </td>
                                        <td class="quy-col">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $item->qty }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-col">
                                            <h4>{{ number_format($item->price * $item->qty) }} VND</h4>
                                        </td>
                                        <td class="size-col"><a class="delete" href="{{ URL::to('delete-item/'.$item->rowId) }}">×</a></td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <div class="total-cost">
                            <h6>Tổng cộng <span>{{ number_format(Cart::subtotal(0,'','')) }} VND</span></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between mt-2">
                <div class="col-lg-4 card-right">
                    <a href="" class="site-btn sb-dark">Tiếp tục mua hàng</a>
                </div>
                <div class="col-lg-4 card-right">
                    <form class="promo-code-form">
                        <input type="text" placeholder="Nhập Voucher">
                        <button>Gửi</button>
                    </form>
                    <a href="{{ URL::to('/check-out') }}" class="site-btn">Thanh toán</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->

@endsection
