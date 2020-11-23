@extends('admin-layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Đơn hàng chờ xác nhận</h2>
            {{-- @if (session('success'))
                <div class="alert alert-primary alert-dismissible col-6" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{ session('success') }}
                    </div>
                </div>
            @endif --}}
            <div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">Tên người đặt</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_order as $item)
                        <tr>
                            <td>{{ $item->customer_name }}</td>
                            <td><a href="{{ URL::to('admin/order/detail-order/'.$item->order_id) }}">
                                    <i class="align-middle mr-3" data-feather="eye"></i>
                                </a>
                            </td>
                            <td>{!! number_format($item->order_total) !!} VND</td>
                            <td>{{ $item->order_status }} </td>
                            <td>
                                <a onclick="return confirm('Xoá đơn hàng này')"
                                    href="{{ URL::to('/admin/order/delete-order/' . $item->order_id) }}">
                                    <i class="align-middle mr-3" data-feather="trash-2"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-right mt-2">
                {{-- {!! $product->render('vendor.pagination.custom') !!}
                --}}
            </div>
        </div>
    </div>
@endsection