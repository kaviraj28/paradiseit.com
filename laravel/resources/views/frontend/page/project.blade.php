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

    @if ($category->isNotEmpty())
        <div class="case-study-area pt-100 pb-70">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        @foreach ($category as $key => $value)
                            <button class="nav-link{{ $key == 0 ? ' active' : '' }}" id="nav-cats{{ $value->id }}-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-cats{{ $value->id }}" type="button"
                                role="tab" aria-controls="nav-cats{{ $value->id }}"
                                aria-selected="true">{{ $value->name }}</button>
                        @endforeach
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($category as $key => $value)
                        <div class="tab-pane fade{{ $key == 0 ? ' show active' : '' }}" id="nav-cats{{ $value->id }}"
                            role="tabpanel" aria-labelledby="nav-cats{{ $value->id }}-tab" tabindex="0">
                            <div class="row pt-45">
                                @if ($value->id == 1)
                                    @forelse($value->projects as $key => $prj)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="case-study-item">
                                                <a href="{{ route('projectsingle', $prj->slug) }}">
                                                    {!! get_image($prj->image, '', 'home-project') !!}
                                                </a>
                                                <div class="content">
                                                    <h3><a
                                                            href="{{ route('projectsingle', $prj->slug) }}">{{ $prj->name ?? '' }}</a>
                                                    </h3>
                                                    <a class="more-btn" href="{{ route('projectsingle', $prj->slug) }}"><i
                                                            class="bx bx-right-arrow-alt"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p>No Projects to display.</p>
                                        </div>
                                    @endforelse
                                @else
                                    @forelse($value->projects as $key => $prj)
                                        <div class="col-lg-3 col-md-6">
                                            <div class="case-study-item design">
                                                <a data-fancybox="demo"
                                                    href="{{ $prj->url ? $prj->url : get_media_url($prj->image) }}">
                                                    {!! get_image($prj->image) !!}
                                                </a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <p>No Projects to display.</p>
                                        </div>
                                    @endforelse
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
