@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'name' => $setting['homepage_seo_title'] ?? 'Paradise IT Solutions',
        'title' => $setting['homepage_seo_title'] ?? 'Paradise IT Solutions',
        'description' => $setting['homepage_seo_description'] ?? '',
        'keyword' => $setting['homepage_seo_keywords'] ?? '',
        'schema' => $setting['homepage_seo_schema'] ?? '',
        'seoimage' => $setting['homepage_image'] ?? '',
        'created_at' => '2023-11-10T08:09:15+00:00',
        'updated_at' => '2023-11-10T10:54:15+00:00',
    ])
@endsection

@section('content')
    @php
        $services = getServiceByID($setting['services']);
        $projects = getProjectByID($setting['projects']);
        $reviews = getReviewByID($setting['reviews']);
    @endphp
    @if ($sliders)
        <div class="banner-five-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="banner-five-content">
                            <span>{{ $sliders->name ?? '' }}</span>
                            {!! $sliders->description ?? '' !!}
                            @if ($sliders->link)
                                <a class="default-btn btn-bg-two border-radius-50" href="{{ $sliders->link ?? '' }}">Learn
                                    More</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-five-img">
                            {!! get_image($sliders->image) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($progress->isNotEmpty())
        <section class="work-process-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">{{ $setting['progress_title'] ?? 'Our Working Process' }}</span>
                    {!! $setting['progress_description'] ?? '' !!}
                </div>
                <div class="row pt-45">
                    @foreach ($progress as $key => $pg)
                        <div class="col-lg-3 col-sm-6">
                            <div class="work-process-card-three">
                                <div class="number-title">{{ $key + 1 > 9 ? $key + 1 : '0' . $key + 1 }}.</div>
                                <h3>{{ $pg->name ?? '' }}</h3>
                                {!! $pg->description ?? '' !!}
                                <i class="{{ $pg->icon ?? '' }}"></i>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <div class="about-area about-bg2 pt-100 pb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-4">
                        {!! get_image($setting['homepage_image']) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content-3 ml-20">
                        <div class="section-title">
                            <span class="sp-color2">{{ $setting['homepage_title'] ?? 'About Us' }}</span>
                        </div>
                        {!! $setting['homepage_description'] ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($services)
        <section class="services-area-four pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="services-left">
                            <div class="section-title">
                                <span class="sp-color2">{{ $setting['service_title'] ?? 'Our Services' }}</span>
                                {!! $setting['service_description'] ?? '' !!}
                            </div>
                            <a class="default-btn btn-bg-two border-radius-50 text-center" href="/services">View All
                                Services</a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($services as $srvs)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="services-card services-card-color-bg">
                                        {!! get_image($srvs->icon) !!}
                                        <h3><a href="{{ route('servicesingle', $srvs->slug) }}">{{ $srvs->name ?? '' }}</a>
                                        </h3>
                                        <p>{{ stripLetters($srvs->description, 135, '...') }}
                                        </p>
                                        <a class="learn-btn" href="{{ route('servicesingle', $srvs->slug) }}">Learn More <i
                                                class="bx bx-chevron-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($reviews)
        <section class="clients-area pt-100">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">
                        {{ $setting['review_title'] ?? 'Our Clients' }}</span>
                    {!! $setting['review_description'] ?? '<h2>Our Clients Feedback</h2>' !!}
                </div>
                <div class="clients-slider owl-carousel owl-theme pt-45">
                    @foreach ($reviews as $rev)
                        <div class="clients-content">
                            <div class="content">
                                {!! get_image($rev->image, '', 'home-review') !!}
                                <i class="bx bxs-quote-alt-left"></i>
                                <h3>{{ $rev->name ?? '' }}</h3>
                                <span>{{ $rev->position ?? '' }}</span>
                            </div>
                            {!! $rev->description ?? '' !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($counters->isNotEmpty())
        <div class="counter-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">{{ $setting['counter_title'] ?? 'Numbers Are Talking' }}</span>
                    {!! $setting['counter_description'] ?? '' !!}
                </div>
                <div class="row pt-45">
                    @foreach ($counters as $count)
                        <div class="col-lg-3 col-6 col-md-3">
                            <div class="counter-another-content">
                                <i class="{{ $count->icon ?? '' }}"></i>
                                <h3>{{ $count->count_num ?? '' }}{{ $count->num_postfix ?? '+' }}</h3>
                                <span>{{ $count->name ?? '' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="counter-shape">
                <div class="shape1">
                    <img src="{{ asset('frontend') }}/assets/images/shape/shape1.png" alt="Images">
                </div>
                <div class="shape2">
                    <img src="{{ asset('frontend') }}/assets/images/shape/shape2.png" alt="Images">
                </div>
            </div>
        </div>
    @endif

    @if ($projects)
        <div class="case-study-area-two pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">{{ $setting['project_title'] ?? 'Our Projects' }}</span>
                    {!! $setting['project_description'] ?? '' !!}
                </div>
                <div class="row justify-content-center pt-45">
                    @foreach ($projects as $key => $prj)
                        <div class="col-lg-4 col-sm-6">
                            <div class="case-study-item">
                                <div class="case-study-item">
                                    <a href="{{ route('projectsingle', $prj->slug) }}">
                                        {!! get_image($prj->image, '', 'home-project') !!}
                                    </a>
                                    <div class="content">
                                        <h3><a href="{{ route('projectsingle', $prj->slug) }}">{{ $prj->name ?? '' }}</a>
                                        </h3>
                                        <a class="more-btn" href="{{ route('projectsingle', $prj->slug) }}"><i
                                                class="bx bx-right-arrow-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($whowe)
        <div class="choose-area pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="choose-content mr-20">
                            <div class="section-title">
                                <span class="sp-color1">{{ $whowe->name ?? '' }}</span>
                                {!! $whowe->description ?? '' !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="choose-img">
                            {!! get_image($whowe->image) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($blogs->isNotEmpty())
        <div class="blog-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">{{ $setting['blog_title'] ?? 'Latest News' }}</span>
                    {!! $setting['blog_description'] ?? '<h2>Let’s Check Some Latest Blog</h2>' !!}
                </div>
                <div class="row pt-45">
                    @foreach ($blogs as $blog)
                        <div class="col-lg-4 col-md-6">
                            <div class="blog-card">
                                <div class="blog-img">
                                    <a href="{{ route('blogsingle', $blog->slug) }}">
                                        {!! get_image($blog->image, '', 'home-blog') !!}
                                    </a>
                                    <div class="blog-tag">
                                        <h3>{{ date('d', strtotime($blog->created_at)) }}</h3>
                                        <span>{{ date('M', strtotime($blog->created_at)) }}</span>
                                    </div>
                                </div>
                                <div class="content">
                                    <h3>
                                        <a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name ?? '' }}</a>
                                    </h3>
                                    <p>{{ stripLetters($blog->description, 135, '...') }}
                                    </p>
                                    <a class="read-btn" href="{{ route('blogsingle', $blog->slug) }}">Read More <i
                                            class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    @if ($popups->isNotEmpty())
        @foreach ($popups as $key => $value)
            <div class="paradisepopup modal fade" id="paradise-{{ $key }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-labelledby="paradise-{{ $key }}Label"
                aria-hidden="true" style="z-index: 999999999;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header pb-0">
                            <h5 class="modal-title" id="paradise-{{ $key }}Label">{{ $value->name }}</h5>
                            <a class="btn-close" data-bs-target="#paradise-{{ $key++ }}" data-bs-dismiss="modal"
                                href="#paradise-{{ $key++ }}"data-bs-toggle="modal" aria-label="Close"></a>
                        </div>
                        <div class="modal-body">
                            @if ($value->image)
                                <div class="media-wrapper">
                                    {!! get_image($value->image) !!}
                                </div>
                            @endif
                            @if ($value->description)
                                <div class="modal-text pt-3">
                                    {!! $value->description !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#paradise-0').modal('show');
        });
    </script>
@endsection
