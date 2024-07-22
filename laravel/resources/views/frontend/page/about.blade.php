@extends('layouts.frontend.master')

@section('seo')
    @include('frontend.global.seo', [
        'name' => $content->name ?? '',
        'title' => $content->seo_title ?? $content->name,
        'description' => $content->seo_description ?? '',
        'keyword' => $content->seo_keywords ?? '',
        'schema' => $content->seo_schema ?? '',
        'seoimage' => $content->image ?? '',
        'created_at' => $content->created_at,
        'updated_at' => $content->updated_at,
    ])
@endsection

@section('content')
    @include('frontend.global.banner', [
        'name' => $content->name,
        'banner' => $content->banner ?? null,
        'parentname' => '',
        'parentlink' => '',
    ])

    <div class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-play">
                        {!! get_image($content->image) !!}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-content ml-25">
                        {!! $content->description ?? '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    @if ($partners->isNotEmpty())
        <div class="brand-area-two ptb-100">
            <div class="container">
                <div class="brand-slider owl-carousel owl-theme">
                    @foreach ($partners as $item)
                        <div class="brand-item">
                            {!! get_image($item->image) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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

@endsection
