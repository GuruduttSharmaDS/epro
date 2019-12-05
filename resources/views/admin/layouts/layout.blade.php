<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Market Place - @yield('title')</title>

        {{-- include styles --}}
        @include("admin.layouts.header_script")

        {{-- dynamic content --}}
        @section("header-page-script")
        @show
    </head>
    <body>
        <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
        <!-- preloader area start -->
        <div id="preloader">
            <div class="loader"></div>
        </div>
        <!-- preloader area end -->
        <!-- page container area start -->
        <div class="page-container">

            {{-- include left sidebar panel --}}
            @include("admin.layouts.sidebar")

            {{-- include header --}}
            @include("admin.layouts.header")          

            {{-- dynamic content --}}
            @section("content")
            @show
            
            {{-- include footer --}}
            @include("admin.layouts.footer")

            {{-- dynamic content --}}
            @section("footer-page-script")
            @show
    </body>
</html>
