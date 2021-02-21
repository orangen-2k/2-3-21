@section('title', "Trang chủ")
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
        <link rel="shortcut icon" type="image/x-icon" href="https://kidsonline.edu.vn/wp-content/themes/kids-online/assets/images/favicon.png" /> {{-- style style --}} @include('admin.layout._share.style') {{-- endstyle style --}} @yield('style')
        @include('user.layout-sp.style-user')
    </head>

    <body class="page page-id-6 home-style2">
            @include('user.layout.header')

                @yield('content-user')

        @include('user.layout.footer')

        @include('user.layout-sp.js-user')
            @yield('script')
    </body>

</html>
