@extends('layouts.frontend.master')
@section('seo')
    @include('frontend.global.seo', [
        'name' => '404',
        'title' => '404',
        'description' => '404',
        'keyword' => '404',
        'schema' => '404',
        'seoimage' => 'frontend/assets/images/404-error.jpg',
        'created_at' => '2023-06-06T08:09:15+00:00',
        'updated_at' => '2023-06-06T10:54:05+00:00',
    ])
@endsection

@section('content')
    <div class="error-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="error-content">
                    <img src="{{ asset('frontend/assets/images/404-error.jpg') }}" alt="Image">
                    <h1>Oops! Page Not Found</h1>
                    <p>The page you are looking for might have been removed had its name changed or is temporarily
                        unavailable.</p>
                    <a class="default-btn btn-bg-two" href="/">
                        Return To Home Page
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
