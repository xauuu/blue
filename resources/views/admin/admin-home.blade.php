@extends('admin-layout')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Thống kê hôm nay</strong></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-5">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Lượng truy cập</h5>
                                        <h3 class="mt-1 mb-3">14.212</h3>
                                        {{-- <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Đã bán</h5>
                                        <h3 class="mt-1 mb-3">
                                            @if ($statistic)
                                                {{ $statistic->quantity }}
                                            @else
                                                0
                                            @endif
                                            sản phẩm
                                        </h3>
                                        {{-- <div class="mb-1">
                                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Thu nhập</h5>
                                        <h3 class="mt-1 mb-3">
                                            @if ($statistic)
                                                {{ number_format($statistic->sales) }}
                                            @else
                                                0
                                            @endif VND
                                        </h3>
                                        {{-- <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Đơn hàng</h5>
                                        <h3 class="mt-1 mb-3">
                                            @if ($statistic)
                                                {{ $statistic->total_order }}
                                            @else
                                                0
                                            @endif
                                        </h3>
                                        {{-- <div class="mb-1">
                                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-xxl-7">
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <div class="picker">
                                <button class="btn btn-outline-primary" id="picker">
                                    <i class="fa fa-calendar"></i>&nbsp;Chọn ngày
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <span id="datepicker"></span>
                            </div>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="chartjs-dashboard-line" style="height: 368px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Browser Usage</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="py-3">
                                    <div class="chart chart-xs">
                                        <canvas id="chartjs-dashboard-pie"></canvas>
                                    </div>
                                </div>

                                <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td>Chrome</td>
                                            <td class="text-right">4306</td>
                                        </tr>
                                        <tr>
                                            <td>Firefox</td>
                                            <td class="text-right">3801</td>
                                        </tr>
                                        <tr>
                                            <td>IE</td>
                                            <td class="text-right">1689</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Real-Time</h5>
                        </div>
                        <div class="card-body px-4">
                            <div id="world_map" style="height:350px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Lịch</h5>
                        </div>
                        <div class="card-body d-flex">
                            <div class="align-self-center w-100">
                                <div class="chart">
                                    <div id="datetimepicker-dashboard"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
