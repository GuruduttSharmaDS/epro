<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/normalize.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/scrollbar.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/fontawesome/fontawesome-all.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/themify-icons.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/jquery-ui.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/linearicons.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/tipso.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/chosen.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/prettyPhoto.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/basictable.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/main.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/dashboard.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/color.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/transitions.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/responsive.css">
    <link rel="stylesheet" href="{!! asset('assets/client') !!}/css/dbresponsive.css">
    <script src="{!! asset('assets/client') !!}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script src="{!! asset('assets/client') !!}/js/vendor/jquery-3.3.1.js"></script>
    <script src="{!! asset('assets/client') !!}/js/vendor/jquery-library.js"></script>
    <script src="{!! asset('assets/client') !!}/js/vendor/bootstrap.min.js"></script>
    <script type="text/javascript">
        var BASEURL = "{{route('home')}}";
        var COMMONURL = BASEURL+'/client/common';
    </script>
    <script type="text/javascript" src= "{!! asset('assets/client/js/client.js') !!}"></script>
</head>

<body class="wt-login">
    <!-- Preloader Start -->
    <div class="preloader-outer">
        <div class="loader"></div>
    </div>
    <!-- Preloader End -->
    <!-- Wrapper Start -->
    <div id="wt-wrapper" class="wt-wrapper wt-haslayout">
        <!-- Content Wrapper Start -->
        <div class="wt-contentwrapper">
        
            @include("client.layouts.header_layout")
            <!--Main Start-->
            <main id="wt-main" class="wt-main wt-haslayout">

                @include("client.layouts.sidebar_layout")

                @yield('body')
            </main>
            <!--Main End--> 
        </div>
        <!--Content Wrapper End-->
    </div>
            @include("client.layouts.footer_layout")

    <script src="{!! asset('assets/client') !!}/js/jquery.basictable.min.js"></script>
    <script src="{!! asset('assets/client') !!}/js/owl.carousel.min.js"></script>
    <script src="{!! asset('assets/client') !!}/js/chosen.jquery.js"></script>
    <script src="{!! asset('assets/client') !!}/js/tilt.jquery.js"></script>
    <script src="{!! asset('assets/client') !!}/js/scrollbar.min.js"></script>
    <script src="{!! asset('assets/client') !!}/js/countdown.min.js"></script>
    <script src="{!! asset('assets/client') !!}/js/prettyPhoto.js"></script>
    <script src="{!! asset('assets/client') !!}/js/jquery-ui.js"></script>
    <script src="{!! asset('assets/client') !!}/js/readmore.js"></script>
    <script src="{!! asset('assets/client') !!}/js/countTo.js"></script>
    <script src="{!! asset('assets/client') !!}/js/appear.js"></script>
    <script src="{!! asset('assets/client') !!}/js/tipso.js"></script>
    <script src="{!! asset('assets/client') !!}/js/chart.js"></script>
    <script src="{!! asset('assets/client') !!}/js/jRate.js"></script>
    <script src="{!! asset('assets/client') !!}/js/main.js"></script>
    <script>
        const menu_icon = document.querySelector('.menu-icon');
        function addClassFunThree() {
            this.classList.toggle("click-menu-icon");
        }
        menu_icon.addEventListener('click', addClassFunThree);
        var ctx = document.getElementById("wt-jobchart");
        var wt_jobchart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April"],
                datasets: [{
                    label: 'Total Earnings',
                    data: [ 6, 8, 4, 7, 10],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            fontSize:12,
                            fontColor:'#767676'
                        }
                    }]
                },
                legend: {
                    labels: {
                        fontSize:14,
                        fontColor: '#767676',
                        FontFamily:'Open Sans',
                        
                    }
                }
            }
        });
         menu_icon.addEventListener('click', addClassFunThree);
        $('.wt-tablecategories').basictable({
            breakpoint: 720,
        });
        jQuery(".wt-countersoon").countdown();
    </script>
 </body>
</html>        