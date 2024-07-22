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
        'parentname' => 'Projects',
        'parentlink' => '/projects',
    ])

    <div class="project-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                @if ($content->image)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="project-details-image">
                            {!! get_image($content->image, '', 'project-single') !!} <a data-fancybox="demo" href="{{ get_media_url($content->image) }}"><i
                                    class="bx bx-plus"></i></a>
                        </div>
                    </div>
                @endif
                @php
                    $gallery = get_show_gallery($content->gallery);
                @endphp
                @if (!empty($gallery))
                    @foreach ($gallery as $key => $galls)
                        @if ($galls)
                            <div class="col-lg-6 col-md-6 col-sm-6{{ $key == 0 ? '' : ' d-none' }}">
                                <div class="project-details-image">
                                    {!! get_image($galls, '', 'project-single') !!} <a data-fancybox="demo" href="{{ get_media_url($galls) }}"><i
                                            class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
                <div class="col-lg-12 col-md-12">
                    <div class="project-details-desc">
                        {!! $content->description ?? '' !!}
                        <div class="project-details-information">
                            <div class="single-info-box">
                                <h4>Happy Client</h4>
                                <p>{{ $content->name ?? '' }}</p>
                            </div>
                            <div class="single-info-box">
                                <h4>Category</h4>
                                <p>{{ $content->category ?? '' }}</p>
                            </div>
                            <div class="single-info-box">
                                <h4>Date</h4>
                                <p>{{ $content->date ?? '' }}</p>
                            </div>
                            <div class="single-info-box">
                                <h4>Share</h4>
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('projectsingle', $content->slug) }}"
                                            target="_blank"><i class="bx bxl-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text={{ route('projectsingle', $content->slug) }}"
                                            target="_blank"><i class="bx bxl-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('projectsingle', $content->slug) }}&title={{ $content->name ?? '' }}&summary=&source="
                                            target="_blank"><i class="bx bxl-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="single-info-box">
                                <a class="default-btn btn-bg-two border-radius-50 text-center"
                                    href="{{ $content->url ?? '' }}" target="_blank">Live
                                    Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
