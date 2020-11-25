@extends('layout')
@section('content')
    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="blog__details__content">
                        <div class="blog__details__item">
                            <img src="img/blog/details/blog-details.jpg" alt="">
                            <div class="blog__details__item__title">
                                <span class="tip">{{ $post_detail->category->category_post_name }}</span>
                                <h4>{{ $post_detail->post_title }}</h4>
                                <ul>
                                    <li>by <span>Xau</span></li>
                                    <li>{{ date('d F, Y', strtotime($post_detail->created_at)) }}</li>
                                    <li>39 Comments</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog__details__quote">
                            <div class="icon"><i class="fa fa-quote-left"></i></div>
                            <p>{{ $post_detail->post_desc }}</p>
                        </div>
                        <div class="blog__details__desc">
                            {!! $post_detail->post_detail !!}
                        </div>
                        <div class="blog__details__tags">
                            <a href="#">Fashion</a>
                            <a href="#">Street style</a>
                            <a href="#">Diversity</a>
                            <a href="#">Beauty</a>
                        </div>
                        <div class="blog__details__btns">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__btn__item">
                                        @isset($post_detail->prev)
                                        <h6><a href="{{ URL::to('/blog-detail/' . $post_detail->prev->post_slug) }}"><i class="fa fa-angle-left"></i> Previous posts</a></h6>
                                        @endisset

                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="blog__details__btn__item blog__details__btn__item--next">
                                        @isset($post_detail->next)
                                            <h6><a href="{{ URL::to('/blog-detail/' . $post_detail->next->post_slug) }}">Next
                                                    posts <i class="fa fa-angle-right"></i></a></h6>
                                        @endisset

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment">
                            <h5>3 Comment</h5>
                            <a href="#" class="leave-btn">Leave a comment</a>
                            <div class="blog__comment__item">
                                <div class="blog__comment__item__pic">
                                    <img width="90" src="{{ URL::asset('uploads/xau.jpg') }}" alt="">
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>Brandon Kelley</h6>
                                    <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua
                                        mei et. Simul viderer facilisis egimus tractatos splendi.</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                                        <li><i class="fa fa-heart-o"></i> 12</li>
                                        <li><i class="fa fa-share"></i> 1</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog__comment__item blog__comment__item--reply">
                                <div class="blog__comment__item__pic">
                                    <img width="90" src="{{ URL::asset('uploads/xau.jpg') }}" alt="">
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>Brandon Kelley</h6>
                                    <p>Consequat consetetur dissentiet, ceteros commune perpetua mei et. Simul viderer
                                        facilisis egimus ulla mcorper.</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                                        <li><i class="fa fa-heart-o"></i> 12</li>
                                        <li><i class="fa fa-share"></i> 1</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="blog__comment__item">
                                <div class="blog__comment__item__pic">
                                    <img width="90" src="{{ URL::asset('uploads/xau.jpg') }}" alt="">
                                </div>
                                <div class="blog__comment__item__text">
                                    <h6>Brandon Kelley</h6>
                                    <p>Duis voluptatum. Id vis consequat consetetur dissentiet, ceteros commune perpetua
                                        mei et. Simul viderer facilisis egimus tractatos splendi.</p>
                                    <ul>
                                        <li><i class="fa fa-clock-o"></i> Seb 17, 2019</li>
                                        <li><i class="fa fa-heart-o"></i> 12</li>
                                        <li><i class="fa fa-share"></i> 1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Danh mục bài viết</h4>
                            </div>
                            <ul>
                                @foreach ($category_post as $item)
                                    <li><a href="#">{{ $item->category_post_name }}
                                            <span>({{ count($item->count_post) }})</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Bài viết mới nhất</h4>
                            </div>
                            @foreach ($recent_post as $item)
                                <a href="{{ URL::to('/blog-detail/' . $item->post_slug) }}" class="blog__feature__item"
                                    title="{{ $item->post_title }}">
                                    <div class="blog__feature__item__pic">
                                        <img src="{{ URL::asset('uploads/post-img/' . $item->post_img) }}" width="80"
                                            alt="">
                                    </div>
                                    <div class="blog__feature__item__text">
                                        <h6 style="white-space: nowrap;
                                            width: 200px;
                                            overflow: hidden;
                                            text-overflow: ellipsis;">{{ $item->post_title }}</h6>
                                        <span>{{ date('d F, Y', strtotime($item->created_at)) }}</span>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                        <div class="blog__sidebar__item">
                            <div class="section-title">
                                <h4>Tags cloud</h4>
                            </div>
                            <div class="blog__sidebar__tags">
                                <a href="#">Fashion</a>
                                <a href="#">Street style</a>
                                <a href="#">Diversity</a>
                                <a href="#">Beauty</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection
