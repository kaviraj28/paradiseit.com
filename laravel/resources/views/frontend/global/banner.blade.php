<div class="inner-banner"
    style="background-image: url({{ $banner ? asset(get_media($banner)->fullurl) : asset('frontend/assets/images/paradise-banner.jpg') }}) !important;background-position:center !important;background-size:cover !important;">
    <div class="container">
        <div class="inner-title text-center">
            <h1 class="h3">{{ $name ?? '' }}</h1>
            <ul>
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <i class="bx bx-chevrons-right"></i>
                </li>
                @if ($parentname && $parentlink)
                    <li>
                        <a href="{{ $parentlink ?? '' }}">{{ $parentname ?? '' }}</a>
                    </li>
                    <li>
                        <i class="bx bx-chevrons-right"></i>
                    </li>
                @endif
                <li>{{ $name ?? '' }}</li>
            </ul>
        </div>
    </div>
    <div class="inner-shape">
        <img src="{{ asset('frontend') }}/assets/images/shape/inner-shape.png" alt="Images">
    </div>
</div>
