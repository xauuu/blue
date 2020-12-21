@extends('layout')
@section('content')
    <div class="container">
        <div class="accordion accordion-solid accordion-panel accordion-svg-toggle mb-10 mt-10" id="faq">
            <!--begin::Item-->
            <div class="card p-6">
                <!--begin::Header-->
                <div class="card-header" id="faqHeading1">
                    <div class="card-title font-size-h4 text-dark" data-toggle="collapse" data-target="#faq1"
                        aria-expanded="true" aria-controls="faq1" role="button">
                        <div class="card-label">How does it work?</div>
                        <span class="svg-icon svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero" />
                                    <path
                                        d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999)" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div id="faq1" class="collapse show" aria-labelledby="faqHeading1" data-parent="#faq">
                    <div class="card-body pt-3 font-size-h6 font-weight-normal text-dark-50">Anim pariatur cliche
                        reprehenderit,
                        enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                        skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                        aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim
                        keffiyeh
                        helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                        butcher
                        vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                        probably
                        haven't heard of them accusamus labore sustainable VHS.</div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Item-->
        </div>
    </div>

@endsection
