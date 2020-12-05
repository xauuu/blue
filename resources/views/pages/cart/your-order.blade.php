@extends('layout')
@section('content')
    <div class="page-top-info">
        <div class="container">
            <h4>Đơn hàng của bạn</h4>
            <div class="site-pagination">
                <a href="">Trang chủ</a> /
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                @foreach ($order as $item => $order)
                    <div class="your_order">
                        <div class="your_order_header">
                            <div>Ngày đặt: {{ $order->created_at }}</div>
                            <div>Trạng thái:
                                <span>
                                    @if ($order->order_status == 0)
                                        Đang chờ xác nhận
                                    @elseif($order->order_status == 1)
                                        Đã xác nhận
                                    @else
                                        Đã huỷ
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="your_order_content">
                            @foreach ($order->order_detail as $item => $pro)
                                <div class="your_order_product">
                                    <div class="your_order_product_img">
                                        <img src="{{ URL::to('uploads/product/'.$pro->product->product_img) }}" alt="">
                                    </div>
                                    <div class="your_order_product_detail">
                                        <div class="your_order_product_name">
                                            {{ $pro->product->product_name }}
                                        </div>
                                        <div class="your_order_product_price">
                                            {{ number_format($pro->product_price) }} VND
                                        </div>
                                        <div class="your_order_product_qty">
                                            x{{ $pro->quantity }}
                                        </div>
                                    </div>
                                    <div class="your_order_product_total">
                                        {{ number_format($pro->product_price*$pro->quantity) }} VND
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        <div class="your_order_footer">
                            <div>Tổng số tiền: <span>{{ number_format($order->order_total) }} VND  </span></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
