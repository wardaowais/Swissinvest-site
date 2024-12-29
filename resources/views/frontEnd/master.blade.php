<!DOCTYPE html>
<html dir="ltr" data-color="red" class="data_color">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    @yield('meta')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link id="bootstrap" rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{asset('homePage')}}/assets/css/mobiriseicons.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('/')}}iziToast/dist/css/iziToast.min.css">
</head>

<body>


@yield('content')


<!-- Back To Top -->
<a href="#" class="back_top"> <i class="mdi mdi-chevron-up"> </i> </a>

<!-- Dark and RTL Button -->
<div class="position-fixed start-0 translate-middle-y rounded-start-2 z-3" style="top: 244px;">
    <button type="button" class="dark-light-btn border-0 rounded-0 rounded-end-2 fs-5 d-flex align-items-center justify-content-center" id="dataTheme"><i class="mdi mdi-weather-night"></i> <i class="mdi mdi-weather-sunny"></i></button>
</div>

<!--All Javascript -->
<script src="{{asset('homePage')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/jquery.min.js"></script>

<!-- Text Rotate -->
<script src="{{asset('homePage')}}/assets/js/jquery.simple-text-rotator.js"></script>

<!-- Owl Carousel -->
<script src="{{asset('homePage')}}/assets/js/owl.carousel.min.js"></script>

<!-- Contact Js -->
<script src="{{asset('homePage')}}/assets/js/contact.js"></script>

<!-- Swicher js -->
<script src="{{asset('homePage')}}/assets/js/swicher.js"></script>

<!-- Backslide Js -->
<script src="{{asset('homePage')}}/assets/js/jquery.backstretch.min.js"></script>

<!-- Work Filter -->
<script src="{{asset('homePage')}}/assets/js/isotope.js"></script>

<!-- Magnific Popup Js -->
<script src="{{asset('homePage')}}/assets/js/jquery.magnific-popup.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('homePage')}}/assets/js/custom.js"></script>
<script src="{{asset('/')}}iziToast/dist/js/iziToast.min.js"></script>
{{--<script>--}}
{{--    $(".simple-text-rotate").textrotator({--}}
{{--        animation: "fade",--}}
{{--        speed: 3500--}}
{{--    });--}}
{{--    $.backstretch(["{{asset('homePage')}}/assets/images/header-bg.jpg", "{{asset('homePage')}}/assets/images/header-bg2.jpg", "assets/images/header-bg3.jpg"], {--}}
{{--        duration: 3500,--}}
{{--        fade: 750--}}
{{--    });--}}
{{--</script>--}}

@yield('script')



@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position:'topRight',
                message: '{{$error}}',
            });
        </script>
    @endforeach

@endif

@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message: '{{session()->get('success')}}',
        });

    </script>
@endif
</body>
</html>
