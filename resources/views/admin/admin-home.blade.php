@extends('admin-layout')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>Thống kê</strong></h3>
                </div>

                {{-- <div class="col-auto ml-auto text-right mt-n1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                            <li class="breadcrumb-item"><a href="#">AdminXau</a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Analytics</li>
                        </ol>
                    </nav>
                </div> --}}
            </div>
            <div class="row">
                <div class="col-xl-6 col-xxl-5 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Bán hàng</h5>
                                        <h1 class="mt-1 mb-3">2.382</h1>
                                        <div class="mb-1">
                                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Lượng truy cập</h5>
                                        <h1 class="mt-1 mb-3">14.212</h1>
                                        <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Thu nhập</h5>
                                        <h1 class="mt-1 mb-3">$21.300</h1>
                                        <div class="mb-1">
                                            <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Đơn hàng</h5>
                                        <h1 class="mt-1 mb-3">64</h1>
                                        <div class="mb-1">
                                            <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25%
                                            </span>
                                            <span class="text-muted">so với tuần trước</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-xxl-7">
                    <div class="card flex-fill w-100">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Recent Movement</h5>
                        </div>
                        <div class="card-body py-3">
                            <div class="chart chart-sm">
                                <canvas id="chartjs-dashboard-line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
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