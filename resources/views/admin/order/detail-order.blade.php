@extends('admin-layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Chi tiết đơn hàng</h2>
        </div>
        <div class="table-responsive">
            <h3 class="ml-3">Thông tin người đặt</h3>
            <table class="table mb-3">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">Tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $detail_order->shipping->shipping_name }}</td>
                        <td>0{{ $detail_order->shipping->shipping_phone }}</td>
                        <td>{{ $detail_order->shipping->shipping_email }}</td>
                        <td>{{ $detail_order->shipping->shipping_address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="table-responsive">
            <h3 class="ml-3 mt-2">Chi tiết</h3>
            <table class="table mb-3">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail_order->order_detail as $item)
                        <tr>
                            <td>{{ $item->product->product_name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->product_price) }} VND</td>
                            <td>{{ number_format($item->product_price*$item->quantity) }} VND</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
