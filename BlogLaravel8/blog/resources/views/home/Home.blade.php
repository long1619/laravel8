<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Du Lịch Đà Lạt</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!------------------------------------------>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Coffee Break Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <link href="{{asset('home/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('home/css/style.css')}}" rel='stylesheet' type='text/css' />
    <script src="{{asset('home/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/move-top.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/easing.js')}}"></script>
    <!----------------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


    <!------------->
    <script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event) {
            event.preventDefault();
            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
    </script>
</head>

<body>
    <!--header-top-starts-->
    <div class="header-top ">
        <div class="container">
            <div class="head-main">
                <a href="">
                    <a href=""><img src="{{asset('home/image/logo4.gif')}}" style="width:30%;" alt="" /></a>
            </div>
        </div>

    </div>
    <!--header-top-end-->
    <!--start-header-->
    <div class="header">
        <div class="container">
            <div class="head">
                <div class="navigation" style="margin-left: 150px; ">

                    <ul class="nav nav-pills">
                        <li class="nav-item" style="padding: 10px;">
                        <li><a href="{{route('home.index')}}" class="active">Trang Chủ</a></li>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Danh Mục Bài Viết</a>
                            <div class="dropdown-menu">
                                @foreach ($showcategory as $key => $value)

                                <a class="dropdown-item" href="{{route('cate_home.show',['id'=>$value->id])  }}">
                                    {{ $value->title }}
                                </a>
                                @endforeach


                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Thư Viện Ảnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin Tức Tổng Hợp </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới Thiệu </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên Hệ </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="margin:50px 0px 0px 280px;">
                <form action="{{ route('search.search_keywword') }}" method="GET">
                    @csrf
                    <div style="display:flex">
                        <div>
                            <input type="text" placeholder="Tìm Kiếm....." name="keywords" style="width:500px"
                                class="form-control" />
                        </div>
                        <div>
                            <input type="submit" value="Tìm Kiếm" class="form-control btn-primary" style="width: 100px">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- script-for-menu -->
    <!-- script-for-menu -->
    <script>
    $("span.menu").click(function() {
        $(" ul.navig").slideToggle("slow", function() {});
    });
    </script>
    <!-- script-for-menu -->
    <!--banner-starts-->
    @include('home.pages.banner')

    <div class="container">
        @yield('content')
    </div>
    <!--about-end-->
    <!--slide-starts-->
    <div class="slide">
        <div class="container">
            <div class="fle-xsel">
                <ul id="flexiselDemo3">
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{asset('home/images/s-1.jpg')}}" class="img-responsive" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{asset('home/images/s-2.jpg')}}" class="img-responsive" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{asset('home/images/s-3.jpg')}}" class="img-responsive" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{asset('home/images/s-4.jpg')}}" class="img-responsive" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{asset('home/images/s-5.jpg')}}" class="img-responsive" alt="">
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="banner-1">
                                <img src="{{asset('home/images/s-6.jpg')}}" class="img-responsive" alt="">
                            </div>
                        </a>
                    </li>
                </ul>

                <script type="text/javascript">
                $(window).load(function() {

                    $("#flexiselDemo3").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 2
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 3
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
                </script>
                <script type="text/javascript" src="{{asset('home/js/jquery.flexisel.js')}}"></script>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--slide-end-->
    <!--footer-starts-->
    <div class="footer">
        <div class="container">
            <div class="footer-text">
                <p>© 2022 Du Lịch Đà Lạt | Design by Long </p>
                <!-- <p>© 2022 Du Lịch Đà Lạt. All Rights Reserved | Design by Long  </p> -->


            </div>
        </div>
    </div>

</body>







































































</html>