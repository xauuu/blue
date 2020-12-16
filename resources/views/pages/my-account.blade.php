@extends('layout')
@section('content')
    <div class="container">
        <div>
            <h3>Thông tin tài khoản</h3>
        </div>
        <div class="row">
            <div class="col-lg-5">
                @if ($customer->customer_avatar)
                    <img width="100" src="{{ $customer->customer_avatar }}" alt="">
                @else
                    <img width="100" src="{{ asset('uploads/avatar/avatar-none.png') }}" alt="">
                @endif
            </div>
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header py-3">
                        <div class="card-title align-items-start flex-column">
                            <h3 class="card-label font-weight-bolder text-dark">Thông tin cá nhân</h3>
                            <span class="text-muted font-weight-bold font-size-sm mt-1">Cập nhật thông tin của bạn</span>
                        </div>
                    </div>
                    <form class="m-3" action="" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                            <div class="col-lg-9 col-xl-8">
                                @if ($customer->customer_avatar)
                                    <img id="img" width="100" src="{{ $customer->customer_avatar }}" alt="">
                                @else
                                    <img id="img" width="100" src="{{ asset('uploads/avatar/avatar-none.png') }}" alt="">
                                @endif
                                <label class="avatar-edit" for="avatar"><i class="flaticon-edit"></i></label>
                                <input id="avatar" class="mt-2 d-none" type="file" name="img" onchange="readURL(this);" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Tên người dùng</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="{{ $customer->customer_name }}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                            <div class="col-lg-9 col-xl-8">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="{{ $customer->customer_email }}" />
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <button type="submit" class="btn btn-success mr-2">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
