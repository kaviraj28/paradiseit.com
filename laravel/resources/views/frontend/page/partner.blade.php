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
    @if ($partners->isNotEmpty())
        <section class="partners pt-100 pb-70">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        @foreach ($partners as $key => $value)
                            <button class="nav-link{{ $key == 0 ? ' active' : '' }}" id="nav-{{ $key }}-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-{{ $key }}" type="button" role="tab"
                                aria-controls="nav-{{ $key }}"
                                aria-selected="true">{{ $value->name ?? '' }}</button>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($partners as $key => $value)
                        <div class="tab-pane fade{{ $key == 0 ? ' show active' : '' }}" id="nav-{{ $key }}"
                            role="tabpanel" aria-labelledby="nav-{{ $key }}-tab" tabindex="0">
                            <div class="row mt-4">
                                @foreach ($value->client as $vals)
                                    <div class="col-6 col-md-3 mb-4">
                                        <div class="media-wrapper shadow">
                                            <a href="{{ $vals->url ? $vals->url : 'javascript:void(0)' }}"
                                                target="{{ $vals->url ? '_blank' : '_self' }}">
                                                {!! get_image($vals->image) !!}
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
