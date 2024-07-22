<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="0_ba55ZBVsxuqWOXXZrVzfwUhITIeyLQDNIKQRK0faE" />
    <link rel="shortcut icon"
        href="{{ asset($setting['site_fav_icon'] ? get_media($setting['site_fav_icon'])->fullurl : 'frontend/images/logo.png') }}"
        type="image/x-icon">
    <link rel="icon"
        href="{{ asset($setting['site_fav_icon'] ? get_media($setting['site_fav_icon'])->fullurl : 'frontend/images/logo.png') }}"
        type="image/x-icon">
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5DSNVSXM');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1MZW0TCE49"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-1MZW0TCE49');
    </script>
    @yield('seo')
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/fonts/flaticon.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/fancy.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/responsive.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/theme-dark.css">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DSNVSXM" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    @include('layouts.frontend.header')

    <main>
        @yield('content')
    </main>

    @include('layouts.frontend.footer')
    <script src="{{ asset('frontend') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/owl.carousel.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/meanmenu.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/form-validator.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/contact-form-script.js"></script>
    <script src="{{ asset('admin/assets/js/fancybox-new.js') }}"></script>
    <script src="{{ asset('admin/assets/js/toast-new.js') }}"></script>
    <script src="{{ asset('frontend') }}/assets/js/custom.js"></script>

    @yield('scripts')
</body>

</html>
