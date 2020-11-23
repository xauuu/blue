@extends('admin-layout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="mt-3">Danh sách sản phẩm</h2>
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible col-6" role="alert">
                    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    <div class="alert-icon">
                        <i class="far fa-fw fa-bell"></i>
                    </div>
                    <div class="alert-message">
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div>

            </div>
        </div>

        <div class="table-responsive">
            <table class="table mb-0 ml-2">
                <thead>
                    <tr class="text-nowrap">
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Gallery</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Bình luận</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item => $value1)
                        <tr>
                            <td>{{ $value1->product_name }}</td>
                            <td><img width="150" src="{{ URL::to('uploads/product/' . $value1->product_img) }}"
                                    alt="{{ $value1->product_name }}"></td>
                            <td>
                                <a href="{{ URL::to('admin/product/gallery/'.$value1->product_id) }}">
                                    <i class="align-middle" data-feather="image"></i>
                                </a>
                            </td>
                            <td> {!! $value1->product_desc !!} </td>
                            <td>{{ number_format($value1->product_discount) }} VND</td>
                            <td>
                                @if ($value1->product_status == 0)
                                    <a href="{{ URL::to('admin/product/product_status/' . $value1->product_id) }}">Ẩn</a>
                                @else
                                    <a href="{{ URL::to('admin/product/product_status/' . $value1->product_id) }}">Hiển
                                        thị</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ URL::to('admin/product/comment/'.$value1->product_id) }}">
                                    <i class="align-middle" data-feather="message-square"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#sanpham{{ $value1->product_id }}">
                                    Xem
                                </button>
                                <div class="modal fade" id="sanpham{{ $value1->product_id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Chi tiết sản phẩm: {{ $value1->product_name }}</h4>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <p class="mb-0">{!! $value1->product_detail !!}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Đóng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a onclick="return confirm('Xoá sản phẩm này')"
                                    href="{{ URL::to('/admin/product/delete-product/' . $value1->product_id) }}">
                                    <i class="align-middle mr-3" data-feather="trash-2"></i></a>
                                <a href="{{ URL::to('/admin/product/edit-product/' . $value1->product_id) }}">
                                    <i class="align-middle" data-feather="edit"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="float-right mt-2">
                {!! $product->render('vendor.pagination.custom') !!}
            </div>
        </div>
    </div>
@endsection
