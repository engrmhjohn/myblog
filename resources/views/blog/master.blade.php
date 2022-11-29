<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-8BH8Z6B3GB"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    
     gtag('config', 'G-8BH8Z6B3GB');
    </script>
    
    <meta name="google-site-verification" content="7Rsz1TRtn4-Fi0kHHQ_viXPCprKYbzW0stws59582qc" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/pogo-slider.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/header_style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/header_responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/header_custom.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontEndAsset') }}/css/blog_style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/blog_responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <title>@yield('title')</title>
</head>

<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

<!-- LOADER -->

<!-- end loader -->
<!-- END LOADER -->

<!-- Start header -->
@include('blog.include.header')
@yield('content')
<!-- End Banner -->
<!-- contact section end -->
<!-- copyright section start -->
@include('blog.include.footer')
<!-- copyright section end -->
<script src="{{ asset('frontEndAsset') }}/js/bootstrap.bundle.min.js"></script>

<!-- ALL JS FILES -->
<script src="{{ asset('frontEndAsset') }}/js/jquery.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/popper.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/bootstrap.min.js"></script>
<!-- ALL PLUGINS -->
<script src="{{ asset('frontEndAsset') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/jquery.pogo-slider.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/slider-index.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/smoothscroll.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/isotope.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/images-loded.min.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/custom.js"></script>
<script src="{{ asset('frontEndAsset') }}/js/datatables-simple-demo.js"></script>
<script src="{{ asset('frontEndAsset') }}/ckeditor/styles.js"></script>
<script src="{{ asset('frontEndAsset') }}/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor2');
</script>
    </body>
    </html>
