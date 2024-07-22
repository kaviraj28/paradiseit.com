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
        'parentname' => 'Blogs',
        'parentlink' => '/blogs',
    ])
    <div class="blog-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-article">
                        <div class="blog-article-img">
                            {!! get_image($content->image, '', 'single') !!}
                            <div class="blog-article-tag">
                                <h3>{{ date('d', strtotime($content->created_at)) }}</h3>
                                <span>{{ date('M', strtotime($content->created_at)) }}</span>
                            </div>
                        </div>
                        <div class="article-content">
                            {!! $content->description ?? '' !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="side-bar-area">
                        @if ($blogs->isNotEmpty())
                            <div class="side-bar-widget">
                                <h3 class="title">Latest Blog</h3>
                                <div class="widget-popular-post">
                                    @foreach ($blogs as $blog)
                                        <article class="item">
                                            <a class="thumb" href="{{ route('blogsingle', $blog->slug) }}">
                                                {!! get_image($blog->image, 'full-image cover', 'sidebar') !!}
                                            </a>
                                            <div class="info">
                                                <h4 class="title-text">
                                                    <a href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name }}
                                                    </a>
                                                </h4>
                                                <p>{{ date('M d, Y', strtotime($content->created_at)) }}</p>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="contact-form side-bar-widget border border-light p-2">
                            <h3 class="title">Contact Us</h3>
                            <hr class="m-0">
                            <form id="contact-form">
                                @csrf
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="name" type="text" name="name"
                                                placeholder="Enter Your Name">
                                            <span class="text-danger">
                                                <span id="name-error"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Enter Your Email">
                                            <span class="text-danger">
                                                <span id="email-error"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="phone" type="text" name="phone"
                                                placeholder="Enter Your Phone Number">
                                            <span class="text-danger">
                                                <span id="phone-error"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <input class="form-control" id="subject" type="text" name="subject"
                                                placeholder="Enter Your Subject">
                                            <span class="text-danger">
                                                <span id="subject-error"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <div class="form-group mb-0">
                                            <textarea class="form-control" id="message" name="message" cols="30" rows="8"
                                                placeholder="Enter Your Message"></textarea>
                                            <span class="text-danger">
                                                <span id="message-error"></span>
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
