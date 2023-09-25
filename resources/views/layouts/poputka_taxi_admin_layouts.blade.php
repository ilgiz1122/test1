<!DOCTYPE html>
<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Попутка - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet"
        href="{{ asset('public/portfolio/files/bower_components/bootstrap/css/bootstrap.min.css') }}">


    <link rel="stylesheet" href="{{ asset('public/portfolio/files/assets/pages/waves/css/waves.min.css') }}"
        type="text/css" media="all">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/bower_components/owl.carousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/bower_components/owl.carousel/css/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/bower_components/swiper/css/swiper.min.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/assets/icon/themify-icons/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/portfolio/files/assets/css/font-awesome-n.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ asset('public/portfolio/files/assets/css/component.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bs-stepper.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/portfolio/files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/portfolio/files/assets/css/pages.css') }}">


    <script src="{{ asset('public/admin/fontawesomepro.js') }}"></script>

</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo pt-10 pb-10">
                        <a href="" class=""
                            style="font-size: 16px; font-weight: 700; line-height: 1.1; margin-top: 8px; font-family: open sans, sans-serif;">
                            {{-- <img class="img-fluid" src="{{ asset('public/portfolio/files/assets/images/logo1.png') }}"
                                alt="Theme-Logo" /> --}}
                                @yield('content1')
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            {{-- <i class="feather icon-menu icon-toggle-right"></i> --}}
                            <i class="fas fa-bars"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <img src="@yield('img100_100')" class="img-radius  mr-15 ml-5" width="40" height="40" style="margin-top: 7px">
                        </a>
                    </div>
                </div>
            </nav>

           

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" style="position:fixed; top:55px;">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                {{-- <div class="pcoded-navigation-label">Navigation</div> --}}
                                <img src="@yield('img480')" class="" width="100%">
                                <ul class="pcoded-item pcoded-left-item nav-sidebar">


                                    <li class="ssdd mt-20">
                                        <a href="@yield('jaryalar')"
                                            class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fas fa-layer-group"></i>
                                            </span>
                                            <span class="pcoded-mtext">Жарнамалар</span>
                                        </a>
                                    </li>
                                    {{-- <li class="ssdd">
                                        <a href="https://poputka-taxi.nonsi.kg/"
                                            class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fas fa-map-signs"></i>
                                            </span>
                                            <span class="pcoded-mtext">Башка аймактар</span>
                                        </a>
                                    </li> --}}

                                    <li class="pcoded-hasmenu ssdd">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">Жарнама кошуу</span>
                                        </a>
                                        <ul class="pcoded-submenu nav-treeview">
                                            <li class="ssdd">
                                                <a href="@yield('jarya_koshuu')" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Тиркемеден жиберүү</span>
                                                </a>
                                            </li>
                                            <li class="ssdd">
                                                <a href="https://wa.me/+996505919600" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">WhatsApp'ка жиберүү</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>

                                    
                                    <li class="ssdd">
                                        <a href="@yield('tirkeme_jonundo')"
                                            class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="pcoded-mtext">Тиркеме жөнүндө</span>
                                        </a>
                                    </li>

                                    
                                    {{-- <li class="ssdd">
                                        <a href="@yield('bashka_aimaktar')"
                                            class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fas fa-map-signs"></i>
                                            </span>
                                            <span class="pcoded-mtext">Башка аймактар</span>
                                        </a>
                                    </li> --}}
                                </ul>
                                <div class="pcoded-navigation-label text-center mt-50" style="margin-top: 100px !important;">Эгерде жарнама жайгаштырууда кыйынчылыктар пайда болсо, анда <a href="https://wa.me/+996505919600" style="color: #4099FF"> 0(505) 919 600</a> номерине байланышыңыз</div>

                            </div>
                        </div>
                    </nav>

                    <div class="pcoded-content"  style="background: #f2f7fb !important">
                        @yield('content')
                    </div>

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript" src="{{ asset('public/portfolio/files/bower_components/jquery/js/jquery.min.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('public/portfolio/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>




    <script type="text/javascript" src="{{ asset('public/portfolio/files/bower_components/popper.js/js/popper.min.js') }}">
    </script>

    <script src="{{ asset('public/portfolio/files/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/portfolio/files/assets/pages/waves/js/waves.min.js') }}"></script>

    <script type="text/javascript"
        src="{{ asset('public/portfolio/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

    <script type="text/javascript" src="{{ asset('public/portfolio/files/bower_components/modernizr/js/modernizr.js') }}">
    </script>
    <script type="text/javascript"
        src="{{ asset('public/portfolio/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>

    <script type="text/javascript"
        src="{{ asset('public/portfolio/files/bower_components/owl.carousel/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/portfolio/files/assets/js/owl-custom.js') }}"></script>
    <script type="text/javascript" src="{{ asset('public/portfolio/files/bower_components/swiper/js/swiper.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('public/portfolio/files/assets/js/swiper-custom.js') }}"></script>
    <script src="{{ asset('public/portfolio/files/assets/js/pcoded.min.js') }}"></script>

    <script src="{{ asset('public/portfolio/files/assets/js/vertical/vertical-layout.min.js') }}"></script>
    <script src="{{ asset('public/portfolio/files/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script type="text/javascript" src="{{ asset('public/portfolio/files/assets/js/script.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.js"></script>



    <script src="{{ asset('public/portfolio/files/assets/pages/form-masking/inputmask.js') }}"></script>
    <script src="{{ asset('public/portfolio/files/assets/pages/form-masking/jquery.inputmask.js') }}"></script>

    <script>
        //Активный меню үчүн
        var url = window.location;
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).parents('.ssdd').addClass('active pcoded-trigger');
        //--Активный меню үчүн
     


        $(document).ready(function() {
            window.stepper3 = new Stepper(document.querySelector('.stepper3'), {
                linear: false,
                animation: true
            })
            var btnNextList = [].slice.call(document.querySelectorAll('.btn-next-form'))
            btnNextList.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    window.stepperForm.next()
                })
            })
            var containerOuterWidth = $('.bs-stepper-header').outerWidth(); // узнаем ширину контейнера (width + padding)
            // обработчик клика по элементу
           
                var itemOuterWidth = $(".fgfgfg1")
            .outerWidth(); // узнаем ширину текущего элемента (width + padding)
                var itemOffsetLeft = $(".fgfgfg1").offset()
                .left; // узнаем значение отступа слева в контейнере у текущего элемента
                var containerScrollLeft = $(".bs-stepper-header")
            .scrollLeft(); // узнаем текущее значение скролла
                var positionCetner = (containerOuterWidth / 1.9 - itemOuterWidth /
                2); // рассчитываем позицию центра
                var scrollLeftUpd = containerScrollLeft + itemOffsetLeft -
                positionCetner; // рассчитываем положение скролла относительно разницы отступа элемента и центра контейнера
                // анимируем
                $('.bs-stepper-header').animate({
                    scrollLeft: scrollLeftUpd
                }, 400);
           
        });
    </script>
</body>


</html>
