<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Deli Comp</title>
    <link href="{{ asset('frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/global.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet">
    <script src="{{ asset('frontend') }}/js/jquery-2.1.1.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>

</head>

<body>

    @include('layouts.partials.top_front')

    @include('layouts.partials.header_front')

    @include('layouts.partials.carousel_front')

    @include('layouts.partials.about_front')

    @include('layouts.partials.service_front')

    @include('layouts.partials.work_front')

    @include('layouts.partials.project_front')

    @include('layouts.partials.faq_front')

    @include('layouts.partials.choose_front')

    @include('layouts.partials.price_front')

    @include('layouts.partials.gallery_front')

    @include('layouts.partials.quote_front')

    @include('layouts.partials.team_front')

    @include('layouts.partials.testimonial_front')

    @include('layouts.partials.blog_front')

    @include('layouts.partials.subs_front')

    @include('layouts.partials.footer_front')

    @include('layouts.partials.footer_b_front')

    <script>
        $(document).ready(function() {
            /*****Fixed Menu******/
            var secondaryNav = $('.cd-secondary-nav'),
                secondaryNavTopPosition = secondaryNav.offset().top;
            navbar_height = document.querySelector('.navbar').offsetHeight;

            $(window).on('scroll', function() {
                if ($(window).scrollTop() > secondaryNavTopPosition + navbar_height) {
                    secondaryNav.addClass('is-fixed');
                    document.body.style.paddingTop = navbar_height + 'px';

                } else {
                    secondaryNav.removeClass('is-fixed');
                    document.body.style.paddingTop = '0'
                }
            });

        });
    </script>

    <script>
        $(document).on('click', '.panel-heading span.clickable', function(e) {
            var $this = $(this);
            if (!$this.hasClass('panel-collapsed')) {
                $this.parents('.panel').find('.panel-body').slideUp();
                $this.addClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
            } else {
                $this.parents('.panel').find('.panel-body').slideDown();
                $this.removeClass('panel-collapsed');
                $this.find('i').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
            }
        })
    </script>

</body>

</html>
