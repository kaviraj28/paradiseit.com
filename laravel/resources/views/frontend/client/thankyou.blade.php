@extends('layouts.frontend.master')
@section('seo')
    @include('frontend.global.seo', [
        'name' => 'Thank You',
        'title' => 'Thank You',
        'description' => 'Thank You',
        'keyword' => 'Thank You',
        'schema' => 'Thank You',
        'seoimage' => 'frontend/assets/images/thank-you.png',
        'created_at' => '2023-06-06T08:09:15+00:00',
        'updated_at' => '2023-06-06T10:54:05+00:00',
    ])
@endsection

@section('content')
    <div class="error-area">
        <div class="container">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="error-content">
                        <img src="{{ asset('frontend/assets/images/thank-you.png') }}" alt="thank-you">
                        <div class="d-flex justify-content-center gap-3">
                            <a class="default-btn btn-bg-two" href="/">
                                Return To Home Page
                            </a>
                            @if ($content = session()->get('content'))
                                <a class="default-btn btn-bg-one" href="{{ route('print', $content->id) }}" download>
                                    Download Agreement
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
