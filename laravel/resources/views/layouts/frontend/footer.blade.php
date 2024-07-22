<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="/">
                                <img src="{{ $setting['site_footer_logo'] ? asset(get_media($setting['site_footer_logo'])->fullurl) : '' }}"
                                    alt="{{ $setting['site_footer_logo'] ? get_media($setting['site_footer_logo'])->alt : 'Paradise IT Solutions' }}">
                            </a>
                        </div>
                        <p>{{ $setting['site_information'] ?? '' }}</p>
                        <div class="footer-call-content">
                            <h3>Talk to Our Support</h3>
                            <span><a
                                    href="tel:{{ $setting['site_phone'] ?? '' }}">{{ $setting['site_phone'] ?? '' }}</a></span>
                            <i class="bx bx-headphone"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>Our Services</h3>
                        @php
                            $menus = getMenus(2);
                        @endphp
                        @if ($menus)
                            <ul class="footer-list">
                                @foreach ($menus as $key => $value)
                                    <li>
                                        <a href="{{ $value->slug }}" target="{{ $value->target ?? '_self' }}">
                                            <i class="bx bx-chevron-right"></i>
                                            {{ $value->name ?? $value->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>Useful Links</h3>
                        @php
                            $menus = getMenus(3);
                        @endphp
                        @if ($menus)
                            <ul class="footer-list">
                                @foreach ($menus as $key => $value)
                                    <li>
                                        <a href="{{ $value->slug }}" target="{{ $value->target ?? '_self' }}">
                                            <i class="bx bx-chevron-right"></i>
                                            {{ $value->name ?? $value->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-5">
                        <h3>Our Blog</h3>
                        @if ($footerblog->isNotEmpty())
                            <ul class="footer-blog">
                                @foreach ($footerblog as $blog)
                                    <li>
                                        <a href="{{ route('blogsingle', $blog->slug) }}">
                                            {!! get_image($blog->image, '', 'footer-blog') !!}
                                        </a>
                                        <div class="content">
                                            <h3><a
                                                    href="{{ route('blogsingle', $blog->slug) }}">{{ $blog->name ?? '' }}</a>
                                            </h3>
                                            <span>{{ date('d M Y', strtotime($blog->created_at)) }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    © {{ date('Y') }} Paradise IT Solutions.
                </p>
            </div>
        </div>
    </div>
</footer>
