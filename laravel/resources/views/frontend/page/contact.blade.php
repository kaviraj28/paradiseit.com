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
    @if ($branchs->isNotEmpty())
        <div class="contact-info-area pt-100">
            <div class="container">
                <div class="row">
                    @foreach ($branchs as $branch)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="contact-info-box">
                                <div class="icon">
                                    <svg class="feather feather-map-pin" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <h3>{{ $branch->name ?? '' }}</h3>
                                <div class="single-footer-widget">
                                    <ul class="footer-contact-info text-start">
                                        <li><svg class="feather feather-map-pin" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                <circle cx="12" cy="10" r="3"></circle>
                                            </svg>{{ $branch->location ?? '' }}</li>
                                        <li><svg class="feather feather-mail" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                </path>
                                                <polyline points="22,6 12,13 2,6"></polyline>
                                            </svg> <a
                                                href="mailto:{{ $branch->email ?? '' }}">{{ $branch->email ?? '' }}</a></li>
                                        <li><svg class="feather feather-phone-call" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                </path>
                                            </svg> <a href="tel:{{ $branch->phone ?? '' }}">{{ $branch->phone ?? '' }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="contact-form-area pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <h2>Let's Send Us a Message Below</h2>
            </div>
            <div class="row pt-45">
                <div class="col-lg-4">
                    <div class="contact-info mr-20">
                        {!! $content->description ?? '' !!}
                        <ul>
                            <li>
                                <div class="content">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Phone Number</h3>
                                    <a href="tel:{{ $setting['site_phone'] ?? '' }}">{{ $setting['site_phone'] ?? '' }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="content">
                                    <i class="bx bxs-map"></i>
                                    <h3>Address</h3>
                                    <span>{{ $setting['site_location'] ?? '' }}</span>
                                </div>
                            </li>
                            <li>
                                <div class="content">
                                    <i class="bx bx-message"></i>
                                    <h3>Contact Info</h3>
                                    <a
                                        href="mailto:{{ $setting['site_email'] ?? '' }}">{{ $setting['site_email'] ?? '' }}</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Name <span>*</span></label>
                                        <input class="form-control" id="name" type="text" name="name"
                                            placeholder="Name">
                                        <span class="text-danger">
                                            <span id="name-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Email <span>*</span></label>
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="Email">
                                        <span class="text-danger">
                                            <span id="email-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input class="form-control" id="phone" type="text" name="phone"
                                            placeholder="Phone Number">
                                        <span class="text-danger">
                                            <span id="phone-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Your Subject <span>*</span></label>
                                        <input class="form-control" id="subject" type="text" name="subject"
                                            placeholder="Your Subject">
                                        <span class="text-danger">
                                            <span id="subject-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Your Message <span>*</span></label>
                                        <textarea class="form-control" id="message" name="message" cols="30" rows="8"
                                            placeholder="Your Message"></textarea>
                                        <span class="text-danger">
                                            <span id="message-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 text-center">
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

    <div class="map-area">
        <div class="container-fluid m-0 p-0">
            <iframe src="{{ $setting['site_location_url'] ?? '' }}"></iframe>
        </div>
    </div>
@endsection
