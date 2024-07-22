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

    @if ($projects->isNotEmpty())
        <div class="case-study-area pt-100 pb-70">
            <div class="container">
                <div class="row pt-45">
                    @foreach ($projects as $key => $prj)
                        <div class="col-lg-4 col-md-6">
                            <div class="case-study-item">
                                <a data-fancybox="demo" href="{{ $prj->url ? $prj->url : get_media_url($prj->image) }}">
                                    {!! get_image($prj->image, '', 'home-project') !!}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
