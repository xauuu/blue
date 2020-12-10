<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>XAU - Dashboard</title>
    <link href="{{ asset('/backend/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/css/daterangepicker.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="{{ URL::to('/admin/dashboard') }}">
                    <span class="align-middle">Xau</span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Dashboard
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ URL::to('/admin/dashboard') }}">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/statistic') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ URL::to('/admin/statistic') }}">
                            <i class="align-middle" data-feather="trending-up"></i> <span
                                class="align-middle">Thống kê</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Quản lí
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/user') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ URL::to('/admin/user') }}">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Tài
                                khoản</span>
                        </a>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/category/*') ? 'active' : '' }}">
                        <a data-target="#cate" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Danh
                                mục</span>
                        </a>
                        <ul id="cate" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/category/add-category') }}">Thêm danh mục</a></li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/category/all-category') }}">Xem danh mục</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/brand/*') ? 'active' : '' }}">
                        <a data-target="#bra" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Thương
                                hiệu</span>
                        </a>
                        <ul id="bra" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/brand/add-brand') }}">Thêm thương hiệu</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/brand/all-brand') }}">Xem thương hiệu</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/product/*') ? 'active' : '' }}">
                        <a data-target="#pro" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="send"></i> <span class="align-middle">Sản phẩm</span>
                        </a>
                        <ul id="pro" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/product/add-product') }}">Thêm sản phẩm</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/product/all-product') }}">Xem sản phẩm</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/order/*') ? 'active' : '' }}">
                        <a data-target="#order" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Đơn
                                hàng</span>
                        </a>
                        <ul id="order" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/order/confirm-order') }}">Xác nhận đơn hàng</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                href="{{ URL::to('/admin/order/success-order') }}">Đơn hàng đã xác nhận</a>
                        </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/order/cancel-order') }}">Đơn hàng đã huỷ</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/order/all-order') }}">Xem tất cả đơn hàng</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/coupon/*') ? 'active' : '' }}">
                        <a data-target="#coupon" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="slack"></i> <span class="align-middle">Mã giảm
                                giá</span>
                        </a>
                        <ul id="coupon" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/coupon/add-coupon') }}">Thêm mã giảm giá</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/coupon/all-coupon') }}">Xem mã giảm giá</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item {{ Request::is('admin/comment/*') ? 'active' : '' }}">
                        <a class="sidebar-link" href="{{ URL::to('/admin/comment/show-comment') }}">
                            <i class="align-middle" data-feather="message-square"></i> <span class="align-middle">Bình luận</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Bài viết
                    </li>
                    <li class="sidebar-item">
                        <a data-target="#catepost" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="list"></i> <span class="align-middle">Danh
                                mục bài viết</span>
                        </a>
                        <ul id="catepost" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/post/add-category-post') }}">Thêm danh mục bài viết</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/post/all-category-post') }}">Xem
                                    danh mục bài viết</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item {{ Request::is('admin/category-post/*') ? 'active' : '' }}">
                        <a data-target="#post" data-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="file-text"></i> <span class="align-middle">Bài
                                viết</span>
                        </a>
                        <ul id="post" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/post/add-post') }}">Thêm bài viết</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link"
                                    href="{{ URL::to('/admin/post/all-post') }}">Xem bài viết</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg sticky-top">
                <a class="sidebar-toggle d-flex">
                    <i class="hamburger align-self-center"></i>
                </a>

                <form class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                        <button class="btn" type="button">
                            <i class="align-middle" data-feather="search"></i>
                        </button>
                    </div>
                </form>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="bell"></i>
                                    <span class="indicator">4</span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0"
                                aria-labelledby="alertsDropdown">
                                <div class="dropdown-menu-header">
                                    4 New Notifications
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-danger" data-feather="alert-circle"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Update completed</div>
                                                <div class="text-muted small mt-1">Restart server 12 to complete the
                                                    update.</div>
                                                <div class="text-muted small mt-1">30m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-warning" data-feather="bell"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Lorem ipsum</div>
                                                <div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
                                                    hendrerit et.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-primary" data-feather="home"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">Login from 192.186.1.8</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <i class="text-success" data-feather="user-plus"></i>
                                            </div>
                                            <div class="col-10">
                                                <div class="text-dark">New connection</div>
                                                <div class="text-muted small mt-1">Christina accepted your request.
                                                </div>
                                                <div class="text-muted small mt-1">14h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all notifications</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="message-square"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0"
                                aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        4 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-5.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">Vanessa Tucker</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu
                                                    tortor.</div>
                                                <div class="text-muted small mt-1">15m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-2.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="William Harris">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">William Harris</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod
                                                    vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-4.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">Christina Mason</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
                                                </div>
                                                <div class="text-muted small mt-1">4h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-3.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                            </div>
                                            <div class="col-10 pl-2">
                                                <div class="text-dark">Sharon Lessman</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
                                                    posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>
                            @php
                            $id = Session::get('admin_id');
                            $name = Session::get('admin_name');
                            $avatar = Session::get('admin_avt');
                            @endphp
                            @if ($id)
                                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
                                    data-toggle="dropdown">
                                    <img src="{{ asset('uploads/' . $avatar) }}" class="avatar img-fluid rounded mr-1"
                                        alt="{{ $name }}" />
                                    <span class="text-dark">{{ $name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="pages-profile.html"><i class="align-middle mr-1"
                                            data-feather="user"></i> Thông tin</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pages-settings.html"><i class="align-middle mr-1"
                                            data-feather="settings"></i> Cài đặt</a>
                                    <a class="dropdown-item" href="#"><i class="align-middle mr-1"
                                            data-feather="help-circle"></i> Trợ giúp</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ URL::to('admin/logout') }}">Đăng xuất</a>
                                </div>
                            @else
                                <a class="nav-link d-none d-sm-inline-block" href="{{ URL::to('admin/login') }}">Đăng
                                    nhập</a>
                            @endif

                            {{--
                            --}}
                        </li>
                    </ul>
                </div>
            </nav>

            @yield('content')

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-left">
                            <p class="mb-0">
                                <a href="index.html" class="text-muted"><strong>XAU</strong></a> &copy;
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @csrf
    <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('backend/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('backend/js/validate.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <script src="{{ asset('backend/js/daterangepicker.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <script>
        $('#picker').daterangepicker({
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            ranges: {
            '7 ngày trước': [moment().subtract(6, 'days'), moment()],
            'Tuần này': [moment().startOf('isoWeek'), moment().endOf('isoWeek')],
            'Tuần trước': [moment().subtract(1, 'week').startOf('isoWeek'), moment().subtract(1, 'week').endOf('isoWeek')],
            '30 ngày trước': [moment().subtract(29, 'days'), moment()],
            'Tháng này': [moment().startOf('month'), moment().endOf('month')],
            'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        },
        function (start, end){
            $('#datepicker').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
            var start = start.format('YYYY-MM-DD');
            var end = end.format('YYYY-MM-DD');
            var _token = $('input[name=_token]').val();
            $.ajax({
                type: "post",
                url: "{{ url('/load-statistic') }}",
                data:{
                    start: start,
                    end: end,
                    _token: _token
                },
                dataType: "json",
                success: function (data) {
                    var labels = [];
                    var dat = [];
                    var order = [];
                    $.each(data, function (key, value) {
                    labels.push(value.order_date);
                    dat.push(value.profit);
                    order.push(value.order);
                    })
                    chart.data.labels = labels;
                    chart.data.datasets[0].data = dat;
                    chart.data.datasets[1].data = order;
                    chart.update();
                }
            });
        });
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(255, 217, 112, 1)");
        gradient.addColorStop(1, "rgba(255, 217, 112, 0)");
        var gradient1 = ctx.createLinearGradient(0, 0, 0, 225);
        gradient1.addColorStop(0, "rgba(133, 146, 219, 1)");
        gradient1.addColorStop(1, "rgba(133, 146, 219, 0)");
        var chart = new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: [],
                    datasets: [{
                        label: "Thu nhập",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.warning,
                        data: []
                    }, {
                        label: "Đơn hàng",
                        fill: true,
                        backgroundColor: gradient1,
                        borderColor: window.theme.primary,
                        data: []
                    }]
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: true
                    },
                    tooltips: {
                        intersect: false,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' đ'
                                return label;
                            }
                        }
                    },
                    hover: {
                        intersect: true
                    },
                    plugins: {
                        filler: {
                            propagate: false
                        }
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                stepSize: 2000000,
                                callback: function(value, index, values) {
                                    if(parseInt(value) >= 1000){
                                        return  value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+' đ';
                                    } else {
                                        return value;
                                    }
                                }
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)"
                            }
                        }]
                    }
                }
            });
            function load_data(){
                var _token = $('input[name=_token]').val();
                $.ajax({
                    type: "post",
                    url: "{{ url('/load-chart') }}",
                    data:{
                        _token: _token
                    },
                    dataType: "json",
                    success: function (data) {
                        var labels = [];
                        var dat = [];
                        var order = [];
                        $.each(data, function (key, value) {
                        labels.push(value.order_date);
                        dat.push(value.profit);
                        order.push(value.order);
                        })
                        chart.data.labels = labels;
                        chart.data.datasets[0].data = dat;
                        chart.data.datasets[1].data = order;
                        chart.update();
                    }
                });
            }
            load_data();
    </script>
    <script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var markers = [{
                    coords: [31.230391, 121.473701],
                    name: "Shanghai"
                },
                {
                    coords: [37.532600, 127.024612],
                    name: "Seoul"
                },
                {
                    coords: [55.751244, 37.618423],
                    name: "Moscow"
                },
                {
                    coords: [35.689487, 139.691711],
                    name: "Tokyo"
                },
                {
                    coords: [17.483, 106.600],
                    name: "Quang Binh"
                },
                {
                    coords: [40.7127837, -74.0059413],
                    name: "New York"
                },
                {
                    coords: [34.052235, -118.243683],
                    name: "Los Angeles"
                },
                {
                    coords: [41.878113, -87.629799],
                    name: "Chicago"
                },
                {
                    coords: [51.507351, -0.127758],
                    name: "London"
                },
                {
                    coords: [40.416775, -3.703790],
                    name: "Madrid "
                }
            ];
            var map = new JsVectorMap({
                map: "world",
                selector: "#world_map",
                zoomButtons: true,
                markers: markers,
                markerStyle: {
                    initial: {
                        r: 9,
                        strokeWidth: 7,
                        stokeOpacity: .4,
                        fill: window.theme.primary
                    },
                    hover: {
                        fill: window.theme.primary,
                        stroke: window.theme.primary
                    }
                }
            });
            window.addEventListener("resize", () => {
                map.updateSize();
            });
        });

    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("datetimepicker-dashboard").flatpickr({
                inline: true,
                prevArrow: "<span class=\"fas fa-chevron-left\" title=\"Previous month\"></span>",
                nextArrow: "<span class=\"fas fa-chevron-right\" title=\"Next month\"></span>",
            });
        });

    </script>
    <script>
        CKEDITOR.replace('xau');
        CKEDITOR.replace('xau1', {
            filebrowserBrowseUrl: '{{ asset('ckeditor/ckfinder/ckfinder.html') }}',
            filebrowserImageBrowseUrl: '{{ asset('ckeditor/ckfinder/ckfinder.html?type=Images') }}',
            filebrowserFlashBrowseUrl : '{{ asset('ckeditor/ckfinder/ckfinder.html?type=Flash') }}',
            filebrowserUploadUrl : '{{ asset('ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
            filebrowserImageUploadUrl : '{{ asset('ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
            filebrowserFlashUploadUrl : '{{ asset('ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
        });
    </script>
</body>

</html>
