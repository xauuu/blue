@extends('admin-layout')
@section('content')
    <div class="row">
        <div class="col-xl-8 mx-auto">
            <div class="card mt-1">
                <div class="card-header">
                    <h2 class="mt-3">Thêm Sale</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ URL::to('/admin/sale/save-sale') }}">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label class="form-label">Tên sale</label>
                            <input type="text" class="form-control" name="sale_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sản phẩm</label>
                            <select name="product_id" class="form-control" required>
                                <option value>--- Chọn sản phẩm ---</option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->product_id }}">{{ $item->product_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phần trăm giảm</label>
                            <input type="text" class="form-control" name="sale_percent" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Thời gian kết thúc</label>
                            <input id="datepicker" class="form-control" name="sale_time" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm sale</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $.datepicker.regional["vi-VN"] = {
            closeText: "Đóng",
            prevText: "Trước",
            nextText: "Sau",
            currentText: "Hôm nay",
            monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy",
                "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"
            ],
            monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một",
                "Mười hai"
            ],
            dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
            dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
            dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
            weekHeader: "Tuần",
            dateFormat: "dd/mm/yy",
            firstDay: 1,
            isRTL: false,
            showMonthAfterYear: false,
            yearSuffix: ""
        };
        $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
        $("#datepicker").datepicker({
            dateFormat: "yy/mm/dd",
        });

    </script>
@endpush
