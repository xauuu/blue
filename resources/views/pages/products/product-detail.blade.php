@extends('layout')
@section('content')
    <!-- Page info -->
    <div class="page-top-info">
        <div class="container">
            <h4>Category PAge</h4>
            <div class="site-pagination">
                <a href="">Home</a> /
                <a href="">Shop</a>
            </div>
        </div>
    </div>
    <!-- Page info end -->

    <input type="hidden" name="product_id" value="{{ $detail->product_id }}">
    <!-- product section -->
    <section class="product-section">
        <div class="container">
            <div class="back-link">
                <a href="./category.html"> &lt;&lt; Trở lại danh mục</a>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-pic-zoom">
                        <img class="product-big-img" src="{{ asset('uploads/product/' . $detail->product_img) }}" alt="">
                    </div>
                    <div class="product-thumbs" tabindex="1" style="overflow: hidden; outline: none;">
                        <div class="product-thumbs-track">
                            <div class="pt active" data-imgbigurl="{{ asset('uploads/product/' . $detail->product_img) }}">
                                <img src="{{ asset('uploads/product/' . $detail->product_img) }}" alt="">
                            </div>
                            @foreach ($detail->gallery as $item)
                                <div class="pt"
                                    data-imgbigurl="{{ asset('uploads/product/gallery/' . $item->gallery_img) }}"><img
                                        src="{{ asset('uploads/product/gallery/' . $item->gallery_img) }}" alt=""></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 product-details">
                    <h2 class="p-title">{{ $detail->product_name }}</h2>
                    <h3 class="p-price">{{ number_format($detail->product_discount) }} VND</h3>
                    <h4 class="p-stock">Có sẵn: <span>{{ $detail->product_quantity }} sản phẩm</span></h4>
                    <div class="p-rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o fa-fade"></i>
                    </div>
                    <div class="p-review">
                        <a href="">3 nhận xét</a>|<a href="">Thêm nhận xét của bạn</a>
                    </div>
                    <div class="fw-size-choose">
                        <p>Size</p>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xs-size">
                            <label for="xs-size">32</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="s-size">
                            <label for="s-size">34</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="m-size" checked="">
                            <label for="m-size">36</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="l-size">
                            <label for="l-size">38</label>
                        </div>
                        <div class="sc-item disable">
                            <input type="radio" name="sc" id="xl-size" disabled>
                            <label for="xl-size">40</label>
                        </div>
                        <div class="sc-item">
                            <input type="radio" name="sc" id="xxl-size">
                            <label for="xxl-size">42</label>
                        </div>
                    </div>
                    <div class="quantity">
                        <p>Số lượng</p>
                        <div class="pro-qty"><input type="text" value="1"></div>
                    </div>
                    <a href="#" class="site-btn">MUA NGAY</a>
                    <div id="accordion" class="accordion-area">
                        <div class="panel">
                            <div class="panel-header" id="headingOne">
                                <button class="panel-link active" data-toggle="collapse" data-target="#collapse1"
                                    aria-expanded="true" aria-controls="collapse1">Mô tả</button>
                            </div>
                            <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="panel-body">
                                    {!! $detail->product_desc !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingTwo">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse2"
                                    aria-expanded="false" aria-controls="collapse2">Chi tiết </button>
                            </div>
                            <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="panel-body">
                                    {!! $detail->product_detail !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-header" id="headingThree">
                                <button class="panel-link" data-toggle="collapse" data-target="#collapse3"
                                    aria-expanded="false" aria-controls="collapse3">Vận chuyển và trả hàng</button>
                            </div>
                            <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="panel-body">
                                    <h4>Trả hàng trong 7 ngày</h4>
                                    <p>Giao hàng tận nhà <span>3 - 4 ngày </span></p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so
                                        dales. Phasellus sagittis auctor gravida. Integer bibendum sodales arcu id te mpus.
                                        Ut consectetur lacus leo, non scelerisque nulla euismod nec.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="social-sharing">
                        <a href=""><i class="fa fa-google-plus"></i></a>
                        <a href=""><i class="fa fa-pinterest"></i></a>
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product section end -->

    <section class="comment">
        <div class="container">
            <div class="col-md-10 mb-5">
                <div class="blog__details__comment">
                    <h4 class="mb-4">BÌNH LUẬN</h4>
                    <a href="#cmt" class="leave-btn">Để lại bình luận</a>
                    @foreach ($comment as $item => $cmt)
                        @if ($cmt->reply_id == 0)
                            <div class="blog__comment__item">
                                <div class="blog__comment__item__pic">
                                    <div class="cmt-avt">{{ $cmt->customer_name[0] }}</div>
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>{{ $cmt->customer_name }}</h6>
                                    <p>{{ $cmt->comment_content }}</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> {{ $cmt->comment_time }}</li>
                                        <li><button class="reply" data-toggle="collapse"
                                                data-target="#cmt{{ $cmt->comment_id }}"><i class="fa fa-share"></i>
                                                Trả lời</button></li>
                                    </ul>
                                    <div class="mt-3" id="reply-comment{{ $cmt->comment_id }}">
                                        @foreach ($comment as $item => $reply)
                                            @if ($cmt->comment_id == $reply->reply_id)
                                                <div class="blog__comment__item__text mt-4">
                                                    <div class="blog__comment__item__pic">
                                                        <div class="reply-avt">{{ $reply->customer_name[0] }}</div>
                                                    </div>
                                                    <div class="blog__comment__item__text">
                                                        <h6>{{ $reply->customer_name }}</h6>
                                                        <p>{{ $reply->comment_content }}</p>
                                                        <ul>
                                                            <li><i class="fa fa-clock-o"></i> {{ $reply->comment_time }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach

                                    </div>

                                    <div id="cmt{{ $cmt->comment_id }}" class="collapse mt-3">
                                        <form>
                                            @csrf
                                            <input type="text" id="reply{{ $cmt->comment_id }}" class="form-control"
                                                placeholder="Nhập phản hồi của bạn">
                                            <button data-cmt_id="{{ $cmt->comment_id }}" class="btn mt-1 btn-reply"
                                                type="button">Trả lời</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                    {{-- <div class="blog__comment__item blog__comment__item--reply">
                        <div class="blog__comment__item__pic">
                            <img width="90" src="{{ URL::asset('uploads/xau.jpg') }}" alt="">
                        </div>
                        <div class="blog__comment__item__text">
                            <h6>Brandon Kelley</h6>
                            <p>Consequat consetetur dissentiet, ceteros commune perpetua mei et. Simul viderer
                                facilisis egimus ulla mcorper.</p>
                            <ul>
                                <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                @if (session('customer_id'))
                    <div class="mt-5">
                        <form>
                            @csrf
                            <textarea id="cmt" rows="3" placeholder="Viết bình luận ...."></textarea>
                            <button type="button" data-product_id="{{ $detail->product_id }}" class="btn btn-cmt">Gửi bình
                                luận</button>
                        </form>
                    </div>
                @else
                    <div>Bạn cần đăng nhập để bình luận sản phẩm này</div>
                @endif

            </div>
        </div>
    </section>
    <!-- RELATED PRODUCTS section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="product-slider owl-carousel">
                @foreach ($related as $item => $pro)
                    <form>
                        {{ csrf_field() }}
                        <div class="product-item">
                            <div class="pi-pic">
                                <a href="{{ URL::to('product-detail/' . $pro->product_id) }}">
                                    <img src="{{ asset('uploads/product/' . $pro->product_img) }}" alt="">
                                </a>
                                <div class="pi-links">
                                    <button data-id="{{ $pro->product_id }}" type="button" name="add-cart" class="add-card">
                                        <i class="flaticon-bag"></i><span>Add to cart</span>
                                    </button>
                                    <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                                </div>
                            </div>
                            <div class="pi-text">
                                <h6>{{ number_format($pro->product_discount) }} VND</h6>
                                <a href="{{ URL::to('product-detail/' . $pro->product_id) }}">
                                    <p>{{ $pro->product_name }}</p>
                                </a>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </section>
    <!-- RELATED PRODUCTS section end -->
@endsection
