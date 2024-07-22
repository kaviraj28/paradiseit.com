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
        'parentname' => 'Courses',
        'parentlink' => '/courses',
    ])

    <div class="service-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="service-article">
                        <div class="service-article-img">
                            {!! get_image($content->image, '', 'single') !!}
                        </div>
                        <div class="service-article-content">
                            <h3>Overview</h3>
                            {!! $content->description ?? '' !!}
                            @if ($content->other_description)
                                <h3>Benefits</h3>
                                {!! $content->other_description ?? '' !!}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="side-bar-area">
                        @if ($courses->isNotEmpty())
                            <div class="side-bar-widget">
                                <h3 class="title">Our courses</h3>
                                <div class="widget-popular-post">
                                    @foreach ($courses as $blog)
                                        `
                                        <article class="item">
                                            <a class="thumb" href="{{ route('coursesingle', $blog->slug) }}">
                                                {!! get_image($blog->image, 'full-image cover', 'sidebar') !!}
                                            </a>
                                            <div class="info">
                                                <h4 class="title-text">
                                                    <a href="{{ route('coursesingle', $blog->slug) }}">{{ $blog->name }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="contact-form side-bar-widget border border-light p-2">
                            <h3 class="title">Registration</h3>
                            <hr class="m-0">
                            <form id="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="name" type="text" name="name"
                                                placeholder="Enter Your Name">
                                            <span class="text-danger">
                                                <small id="name-error"></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Enter Your Email">
                                            <span class="text-danger">
                                                <small id="email-error"></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="phone" type="text" name="phone"
                                                placeholder="Enter Your Phone Number">
                                            <span class="text-danger">
                                                <small id="phone-error"></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="subject" type="text" name="subject"
                                                placeholder="Enter Your Subject" value="Course - {{ $content->name ?? '' }}"
                                                readonly>
                                            <span class="text-danger">
                                                <small id="subject-error"></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <textarea class="form-control" id="message" name="message" cols="30" rows="4"
                                                placeholder="Enter Your Message"></textarea>
                                            <span class="text-danger">
                                                <small id="message-error"></small>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center mt-3">
                                        <button class="default-btn btn-bg-two border-radius-50" id="contact_submit"
                                            type="submit">
                                            Send Message <i class="bx bx-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
