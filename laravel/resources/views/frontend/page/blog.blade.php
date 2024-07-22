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
    @if ($blogs->isNotEmpty())
        <div class="blog-area pt-100 pb-70">
            <div class="container">
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
@endsection
