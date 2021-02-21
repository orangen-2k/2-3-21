@section('title', "Quản lý")
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>
        @yield('title')
    </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="shortcut icon" type="image/x-icon" href="https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/favicon.png" />
    @include('admin.layout._share.style')
    @yield('style')
</head>
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
<div id="progressbar"  style="width: 0%"></div>
<div class="m-grid m-grid--hor m-grid--root m-page">

@include('admin.layout._share.header')

    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

    @include('admin.layout._share.sidebar')

        <div class="m-grid__item m-grid__item--fluid m-wrapper" id="pjax-container">

        @yield('content')

        </div>
    </div>

@include('admin.layout._share.footer')

</div>

<div id="m_scroll_top" class="m-scroll-top">
    <i class="fas fa-chevron-up"></i>
</div>

@include('admin.layout._share.quick_nav')
@include('admin.layout._share.script')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
@yield('script')
@include('admin.layout._share.notify')
</body>

</html>
