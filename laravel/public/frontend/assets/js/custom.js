(function ($) {
    "use strict";
    jQuery(".mean-menu").meanmenu({ meanScreenWidth: "991" });
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 150) {
            $(".navbar-area").addClass("sticky-nav");
        } else {
            $(".navbar-area").removeClass("sticky-nav");
        }
    });
    $(".nav-side .search-box i").on("click", function () {
        $(".search-overlay").toggleClass("search-overlay-active");
    });
    $(".search-close").on("click", function () {
        $(".search-overlay").removeClass("search-overlay-active");
    });
    $(".side-nav-responsive .dot-menu").on("click", function () {
        $(".side-nav-responsive .container-max .container").toggleClass(
            "active"
        );
    });
    $(".banner-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        items: 1,
        dots: true,
        autoplay: true,
        autoHeight: true,
        autoplayHoverPause: true,
    });
    $(".case-study-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        center: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 1 },
            600: { items: 2 },
            1024: { items: 3 },
            1200: { items: 4 },
        },
    });
    $(".brand-slider").owlCarousel({
        loop: true,
        margin: 60,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            0: { items: 2 },
            600: { items: 2 },
            700: { items: 3 },
            1024: { items: 5 },
        },
    });
    $(".banner-seven-slide").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        nav: true,
        dots: false,
        autoplay: true,
        autoHeight: true,
        autoplayHoverPause: true,
    });
    $(".clients-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: { 0: { items: 1 }, 992: { items: 2 } },
        navText: [
            "<i class='bx bx-chevron-left'></i>",
            "<i class='bx bx-chevron-right'></i>",
        ],
    });
    $(".clients-slider-two").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        items: 1,
        navText: [
            "<i class='bx bx-chevron-left'></i>",
            "<i class='bx bx-chevron-right'></i>",
        ],
    });
    $(".banner-sub-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: { 0: { items: 1 }, 1024: { items: 3 } },
    });
    $(".popup-btn").magnificPopup({
        disableOn: 320,
        type: "iframe",
        mainClass: "mfp-fade",
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });
    $("select").niceSelect();
    $(".accordion")
        .find(".accordion-title")
        .on("click", function () {
            $(this).toggleClass("active");
            $(this).next().slideToggle("fast");
            $(".accordion-content").not($(this).next()).slideUp("fast");
            $(".accordion-title").not($(this)).removeClass("active");
        });
    $(".skill-bar").each(function () {
        $(this)
            .find(".progress-content")
            .animate({ width: $(this).attr("data-percentage") }, 2000);
        $(this)
            .find(".progress-number-mark")
            .animate(
                { left: $(this).attr("data-percentage") },
                {
                    duration: 2000,
                    step: function (now, fx) {
                        var data = Math.round(now);
                        $(this)
                            .find(".percent")
                            .html(data + "%");
                    },
                }
            );
    });
    new WOW().init();
    $(window).on("load", function () {
        $(".preloader").fadeOut(500);
    });
    $("body").append(
        "<div class='go-top'><i class='bx bx-chevrons-up'></i></div>"
    );
    $(window).on("scroll", function () {
        var scrolled = $(window).scrollTop();
        if (scrolled > 600) $(".go-top").addClass("active");
        if (scrolled < 600) $(".go-top").removeClass("active");
    });
    $(".go-top").on("click", function () {
        $("html, body").animate({ scrollTop: "0" }, 50);
    });
    function makeTimer() {
        var endTime = new Date("December 30, 2022 17:00:00 PDT");
        var endTime = Date.parse(endTime) / 1000;
        var now = new Date();
        var now = Date.parse(now) / 1000;
        var timeLeft = endTime - now;
        var days = Math.floor(timeLeft / 86400);
        var hours = Math.floor((timeLeft - days * 86400) / 3600);
        var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
        var seconds = Math.floor(
            timeLeft - days * 86400 - hours * 3600 - minutes * 60
        );
        if (hours < "10") {
            hours = "0" + hours;
        }
        if (minutes < "10") {
            minutes = "0" + minutes;
        }
        if (seconds < "10") {
            seconds = "0" + seconds;
        }
        $("#days").html(days + "<span>Days</span>");
        $("#hours").html(hours + "<span>Hours</span>");
        $("#minutes").html(minutes + "<span>Minutes</span>");
        $("#seconds").html(seconds + "<span>Seconds</span>");
    }
    setInterval(function () {
        makeTimer();
    }, 300);

    $("#contact_submit").click(function (e) {
        e.preventDefault();
        var InquiryData = new FormData($("#contact-form")[0]);
        $("#name-error").html("");
        $("#email-error").html("");
        $("#phone-error").html("");
        $("#subject-error").html("");
        $("#message-error").html("");

        $.ajax({
            url: "/inquiry",
            method: "POST",
            data: InquiryData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function () {
                $("#contact-loader").show();
            },
            success: function (data) {
                if (data.errors) {
                    $("#contact-loader").hide();
                    if (data.errors.name) {
                        $("#name-error").html("*" + data.errors.name[0]);
                    }
                    if (data.errors.email) {
                        $("#email-error").html("*" + data.errors.email[0]);
                    }
                    if (data.errors.phone) {
                        $("#phone-error").html("*" + data.errors.phone[0]);
                    }
                    if (data.errors.subject) {
                        $("#subject-error").html("*" + data.errors.subject[0]);
                    }
                    if (data.errors.message) {
                        $("#message-error").html("*" + data.errors.message[0]);
                    }
                }

                if (data.success) {
                    $("#contact-loader").hide();
                    toastr.success(data.success);
                    $("#contact-form")[0].reset();
                }
            },
            error: function () {
                $("#contact-loader").hide();
                alert("Some Problems Occured");
            },
        });
    });

    $("#service_submit").click(function (e) {
        e.preventDefault();
        var InquiryData = new FormData($("#service-form")[0]);
        $("#servname-error").html("");
        $("#servemail-error").html("");
        $("#servphone-error").html("");
        $("#servsubject-error").html("");
        $("#servmessage-error").html("");

        $.ajax({
            url: "/inquiry",
            method: "POST",
            data: InquiryData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function () {
                $("#service-loader").show();
            },
            success: function (data) {
                if (data.errors) {
                    $("#service-loader").hide();
                    if (data.errors.name) {
                        $("#servname-error").html("*" + data.errors.name[0]);
                    }
                    if (data.errors.email) {
                        $("#servemail-error").html("*" + data.errors.email[0]);
                    }
                    if (data.errors.phone) {
                        $("#servphone-error").html("*" + data.errors.phone[0]);
                    }
                    if (data.errors.subject) {
                        $("#servsubject-error").html(
                            "*" + data.errors.subject[0]
                        );
                    }
                    if (data.errors.message) {
                        $("#servmessage-error").html(
                            "*" + data.errors.message[0]
                        );
                    }
                }

                if (data.success) {
                    $("#service-loader").hide();
                    toastr.success(data.success);
                    $("#service-form")[0].reset();
                }
            },
            error: function () {
                $("#service-loader").hide();
                alert("Some Problems Occured");
            },
        });
    });

    $("#client_submit").click(function (e) {
        e.preventDefault();
        var clientRegistrationData = new FormData($("#client-form")[0]);
        $("#cname-error").html("");
        $("#caddress-error").html("");
        $("#cnumber-error").html("");
        $("#cmail-error").html("");
        $("#cpan-error").html("");
        $("#name-error").html("");
        $("#email-error").html("");
        $("#phone-error").html("");
        $("#agreement-error").html("");
        $("#designation-error").html("");

        $.ajax({
            url: "/clientregistration",
            method: "POST",
            data: clientRegistrationData,
            processData: false,
            cache: false,
            contentType: false,
            beforeSend: function () {
                $("#client-loader").show();
            },
            success: function (data) {
                if (data.errors) {
                    $("#client-loader").hide();
                    if (data.errors.cname) {
                        $("#cname-error").html("*" + data.errors.cname[0]);
                    }
                    if (data.errors.caddress) {
                        $("#caddress-error").html(
                            "*" + data.errors.caddress[0]
                        );
                    }
                    if (data.errors.cnumber) {
                        $("#cnumber-error").html("*" + data.errors.cnumber[0]);
                    }
                    if (data.errors.cmail) {
                        $("#cmail-error").html("*" + data.errors.cmail[0]);
                    }
                    if (data.errors.cpan) {
                        $("#cpan-error").html("*" + data.errors.cpan[0]);
                    }
                    if (data.errors.name) {
                        $("#name-error").html("*" + data.errors.name[0]);
                    }
                    if (data.errors.email) {
                        $("#email-error").html("*" + data.errors.email[0]);
                    }
                    if (data.errors.phone) {
                        $("#phone-error").html("*" + data.errors.phone[0]);
                    }
                    if (data.errors.phone) {
                        $("#agreement-error").html(
                            "* The agreement field is required."
                        );
                    }
                    if (data.errors.designation) {
                        $("#designation-error").html(
                            "*" + data.errors.designation[0]
                        );
                    }
                }

                if (data.success) {
                    $("#client-loader").hide();
                    toastr.success(data.success);
                    $("#client-form")[0].reset();
                }
            },
            error: function () {
                $("#client-loader").hide();
                alert("Some Problems Occured");
            },
        });
    });
})(jQuery);
