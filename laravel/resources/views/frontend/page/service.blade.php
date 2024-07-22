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

    @if ($services->isNotEmpty())
        <section class="services-style-area pt-100 pb-70">
            <div class="container">
                <div class="row pt-45">
                    @foreach ($services as $srvs)
                        <div class="col-lg-3 col-sm-6">
                            <div class="services-card services-style-bg">
                                {!! get_image($srvs->icon) !!}
                                <h3><a href="{{ route('servicesingle', $srvs->slug) }}">{{ $srvs->name ?? '' }}</a></h3>
                                <p>{{ stripLetters($srvs->description, 140, '...') }}
                                </p>
                                <a class="learn-btn" href="{{ route('servicesingle', $srvs->slug) }}">Learn More <i
                                        class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
