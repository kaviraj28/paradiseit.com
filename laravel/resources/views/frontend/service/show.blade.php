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
        'parentname' => 'Services',
        'parentlink' => '/services',
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
                            {!! $content->description ?? '' !!}
                        </div>
                        <hr class="mt-3">
                    </div>
                    @if ($pricing->isNotEmpty())
                        <div class="pricing my-4" id="servpricing">
                            <div class="section-title text-center">
                                <h2 class="sp-color2">Our Pricing</h2>
                            </div>
                            <div class="row row-cols-1 row-cols-md-3 justify-content-center mt-3 text-center">
                                @foreach ($pricing as $price)
                                    <div class="col">
                                        <div class="card mb-4 rounded-3 shadow-md">
                                            <div class="card-header py-3">
                                                <h4 class="my-0 fw-bold">{{ $price->name ?? '' }}</h4>
                                            </div>
                                            <div class="card-body">
                                                @if ($price->price)
                                                    <h2 class="card-title pricing-card-title">
                                                        {{ ($price->priceprefix ?? '') . ($price->price ?? '') }}<small
                                                            class="text-body-secondary fw-light">{{ $price->priceper ?? '/mo' }}</small>
                                                    </h2>
                                                @endif

                                                <div class="list-unstyled mt-3 mb-4">
                                                    {!! $price->description ?? '' !!}
                                                </div>
                                                <a class="default-btn btn-bg-two border-radius-50 py-2 px-3"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-price="{{ $price->name }} - {{ $content->name }}">Get
                                                    started</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-3">
                    <div class="side-bar-area">
                        @if ($services->isNotEmpty())
                            <div class="side-bar-widget">
                                <h3 class="title">Our Services</h3>
                                <div class="widget-popular-post">
                                    @foreach ($services as $blog)
                                        <article class="item">
                                            <a class="thumb" href="{{ route('servicesingle', $blog->slug) }}">
                                                {!! get_image($blog->image, 'full-image cover', 'sidebar') !!}
                                            </a>
                                            <div class="info">
                                                <h4 class="title-text">
                                                    <a href="{{ route('servicesingle', $blog->slug) }}">{{ $blog->name }}
                                                    </a>
                                                </h4>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Quick Enquiry</h2>
                    <button class="btn-close" data-bs-dismiss="modal" type="button" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="contact-form">
                        <form id="service-form">
                            @csrf
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <input class="form-control" id="name" type="text" name="name"
                                            placeholder="Enter Your Name">
                                        <span class="text-danger">
                                            <span id="servname-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <input class="form-control" id="email" type="email" name="email"
                                            placeholder="Enter Your Email">
                                        <span class="text-danger">
                                            <span id="servemail-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <input class="form-control" id="phone" type="text" name="phone"
                                            placeholder="Enter Your Phone Number">
                                        <span class="text-danger">
                                            <span id="servphone-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <input class="form-control" id="subject" type="text" name="subject"
                                            placeholder="Enter Your Subject" readonly>
                                        <span class="text-danger">
                                            <span id="servsubject-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-group mb-0">
                                        <textarea class="form-control" id="message" name="message" cols="30" rows="8"
                                            placeholder="Enter Your Message"></textarea>
                                        <span class="text-danger">
                                            <span id="servmessage-error"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-3">
                                    <button class="default-btn btn-bg-two border-radius-50" id="service_submit"
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
@endsection
@section('scripts')
    <script>
        const exampleModal = document.getElementById('exampleModal')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                const recipient = button.getAttribute('data-bs-price')
                // If necessary, you could initiate an Ajax request here
                // and then do the updating in a callback.

                // Update the modal's content.
                const modalTitle = exampleModal.querySelector('.modal-title')
                const modalBodyInput = exampleModal.querySelector('.modal-body input#subject')

                modalTitle.textContent = `Quick Enquiry For ${recipient}`
                modalBodyInput.value = recipient
            })
        }
    </script>
@endsection
