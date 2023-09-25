<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>НоНси - @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome <link rel="stylesheet" href="{{asset('')}}/admin/plugins/fontawesome-free/css/all.min.css"><link rel="stylesheet" href="{{asset('')}}/admin/fontawesome-free-6.1.1-web/css/all.css"><link rel="stylesheet" href="{{asset('')}}/admin/fontawesome-free-6.1.1-web/css/all.css">-->


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{asset('')}}/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('')}}/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('')}}/admin/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('')}}/admin/dist/css/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('')}}/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('')}}/admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('')}}/packages/barryvdh/elfinder/css/elfinder.min.css">
    <link href="{{asset('')}}/admin/dist/css/colorbox.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="{{asset('')}}/admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('')}}/admin/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="{{asset('')}}/packages/pull_to_refresh/ptrLight.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="{{asset('')}}/packages/pull_to_refresh/ptrLight.js"></script>

    <link rel="stylesheet" href="{{asset('')}}/admin/plugins/summernote/summernote-bs4.css">
    <!-- Редактор TinyMCE!-->
    <link rel="stylesheet" href="{{asset('')}}/admin/dist/css/intlTelInput.css">
    <link rel="stylesheet" href="{{asset('')}}/admin/dist/css/bs-stepper.css">

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css"><script src="{{asset('')}}/admin/fontawesome-free-6.1.1-web/js/all.js"></script>-->

    <script src="{{asset('')}}/admin/fontawesomepro.js"></script>

    <script src="https://cdn.tiny.cloud/1/lhjb382nf0h8g4j2g44se02ph3w9mqmeyi3yfs7t9cjkgaxb/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GLF9K2HTTR"></script>
    <script  src ="https://www.wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image" > </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-GLF9K2HTTR');


        $(document).ready(function() {
            $(".variable").slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3500,
                arrows: false,
                AdaptiveHeight: true,
                touchThreshold: 100,
                responsive: [{
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 3500,
                        arrows: false,
                        AdaptiveHeight: true,
                        touchThreshold: 100,
                    }
                }]
            });
        });


        $(function() {
            const screenWidth = window.screen.width;
            if (screenWidth <= 480) {
                $("#body01").addClass('sdsdsdsdsd');
                $('.sdsdsdsdsd').ptrLight({
                    'refresh': function(ptrLightInstance) {
                        location.reload();
                        setTimeout(function() {
                            console.log('Updated!');
                            ptrLightInstance.done();
                        }, 2000);
                    },
                    pullThreshold: $(window).height() * 0.2,
                    maxPullThreshold: $(window).height()
                });
            }
        });
    </script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

</head>

<body class="hold-transition sidebar-mini layout-fixed" id="body01" style="background-color: #f4f6f9">
    <div class="wrapper">



        <!-- Preloader-->
        {{-- <div class="preloader flex-column justify-content-center align-items-center d-flex">
            <div class="spinner-border text-info" role="status" style="width: 3rem; height: 3rem;">
                <span class="sr-only">Loading...</span>
            </div>
        </div> --}}
        <!-- Preloader-->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <!--<li class="nav-item  d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">Башкы бет</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('vse_kursy') }}" class="nav-link">Курсы</a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('vse_materialy', ['for_action' => '0']) }}" class="nav-link">Презентация</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('vse_materialy', ['for_action' => '1']) }}" class="nav-link">Тест</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('vse_testy_ort') }}" class="nav-link">ЖРТ</a>
      </li>-->
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>-->

                <!-- Messages Dropdown Menu
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('')}}/admin/dist/img/user3.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('')}}/admin/dist/img/user3.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <div class="media">
              <img src="{{asset('')}}/admin/dist/img/user3.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>-->
                <!-- Notifications Dropdown Menu
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>-->
                @guest
                    @if (Route::has('login'))
                    @endif
                @else
                    <li class="nav-item">
                        <p class="nav-link pt-2 m-0">
                            Баланс: {{ Auth::user()->balance / 100 }} сом
                        </p>
                    </li>
                @endguest

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" type="button">
                        <i style="font-size: 25px;" class="fas fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('ort_login', ['subdomain' => 'ort']) }}" class="dropdown-item">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Кирүү
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('ort_register', ['subdomain' => 'ort']) }}" class="dropdown-item">
                                    <i class="fas fa-user-plus mr-2"></i> Катталуу
                                </a>
                            @endif
                        @else
                            <a href="{{ route('ort_profile', ['subdomain' => 'ort']) }}" class="dropdown-item">
                                <div class="media">
                                    @if (Auth::user()->img_600_600 != null)
                                        <div class="mr-3 mt-2"><img class=" img-circle"
                                                src="{{ asset('/storage/users/img_600_600/') }}/{{ Auth::user()->img_600_600 }}"
                                                style="width: 50px;"></div>
                                    @else
                                        <i style="font-size: 50px;" class="fas fa-user-circle mr-3 pt-2 text-muted"></i>
                                    @endif
                                    <div class="media-body">
                                        <h3 class="dropdown-item-title">
                                            {{ Auth::user()->name }}
                                            <!--<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>-->
                                        </h3>
                                        <p class="text-sm text-muted"> {{ Auth::user()->email }}</p>
                                        <p class="text-sm text-muted"><i class="fas fa-money-bill-wave-alt mr-1"></i>
                                            {{ Auth::user()->balance / 100 }} сом</p>
                                    </div>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>
                            {{-- <a href="{{ route('moikursy') }}" class="dropdown-item"><i
                                    class="text-muted fas fa-chalkboard-teacher mr-2"></i> Курстарым</a> --}}
                            <a href="{{ route('moi_ort_testy1', ['subdomain' => 'ort']) }}" class="dropdown-item"><i
                                    class="text-muted fas fa-graduation-cap mr-2"></i> ЖРТ <small>(тесттерим)</small></a>
                            <div class="dropdown-divider"></div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf
                            </form>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item"><i class="text-muted fas fa-sign-out-alt mr-2"></i> Чыгуу</a>
                        @endguest
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{asset('')}}/admin/dist/img/logo1.jpg" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><strong>НоНси - ОРТ</strong></span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview"
                        role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('ort_view1', ['subdomain' => 'ort']) }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Башкы бет</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('ort_negizgi_test', ['subdomain' => 'ort']) }}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Негизги тест</p>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('user_online_sabak_view', ['subdomain' => 'ort']) }}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Онлайн сабак</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('podcat', '21')}}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Курстар</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Негизги тест<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('ort_negizgi_test_podcat', ['subdomain' => 'ort', 'id' => '26']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Математика</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_negizgi_test_podcat', ['subdomain' => 'ort', 'id' => '37']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Окуу жана түшүнүү</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_negizgi_test_podcat', ['subdomain' => 'ort', 'id' => '27']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Окшоштуктар</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_negizgi_test_podcat', ['subdomain' => 'ort', 'id' => '25']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Грамматика</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Предметтик тест<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => '38']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Математика</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => '39']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Тарых</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => '40']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Физика</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => '41']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Химия</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => '42']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Биология</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_predmettik_test_podcat', ['subdomain' => 'ort', 'id' => '43']) }}"
                                        class="nav-link">
                                        <i class="nav-icon fas fa-graduation-cap"></i>
                                        <p>Англис тили</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('vse_testy', ['for_action' => '1']) }}" class="nav-link">
                                <i class="nav-icon fas fa-graduation-cap"></i>
                                <p>Курс</p>
                            </a>
                        </li> --}}

                        <li class="nav-item">
                            <a href="{{ route('ort_contact', ['subdomain' => 'ort']) }}" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Байланышуу</p>
                            </a>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item moderator pt-3">
                                    <a href="{{ route('ort_login', ['subdomain' => 'ort']) }}" class="nav-link">
                                        <i class="nav-icon fas fa-sign-in-alt"></i>
                                        <p>Кирүү</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('ort_register', ['subdomain' => 'ort']) }}" class="nav-link">
                                        <i class="nav-icon fas fa-user-plus"></i>
                                        <p>Катталуу</p>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item pb-2 pt-2 moderator">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-user-circle"></i>
                                    <p>Жеке кабинет<i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('ort_profile', ['subdomain' => 'ort']) }}" class="nav-link">
                                            <i class="nav-icon fas fa-user-circle"></i>
                                            <p>Профилим</p>
                                        </a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a href="{{ route('moikursy') }}" class="nav-link">
                                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                            <p>Курстарым</p>
                                        </a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a href="{{ route('moi_ort_testy1', ['subdomain' => 'ort']) }}" class="nav-link">
                                            <i class="nav-icon fas fa-graduation-cap"></i>
                                            <p>ЖРТ <small>(тесттерим)</small></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                            @if (intval(Auth::user()->for_role) != 1)
                                <li class="nav-item pb-2 pt-2 moderator">
                                    <a href="{{ route('moderator_panel_ort') }}" class="nav-link" target="_blank">
                                        <i class="nav-icon fas fa-solar-panel"></i>
                                        <p>Модератор панел</p>
                                    </a>
                                </li>
                            @endif
                        @endguest
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
            <div class="sidebar-custom">
                <div class="row">
                    <div class="col"><a type="button" class="btn btn-outline-primary btn-block btn-sm w-15"
                            data-toggle="modal" data-target="#sms" data-vid="Сунуш же идея"
                            data-vopros="Сунушуңузду жазыңыз"><i class="far fa-lightbulb"></i></a></div>
                    @if (Auth::check())
                        <div class="col"><a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-outline-primary btn-block btn-sm"><i
                                    class="fas fa-sign-out-alt"></i></a></div>
                    @else
                        <div class="col"><a href="{{ route('login') }}"
                                class="btn btn-outline-primary btn-block btn-sm"><i
                                    class="fas fa-sign-in-alt"></i></a></div>
                    @endif

                    <div class="col"><a type="button" class="btn btn-outline-primary btn-block btn-sm w-15"
                            data-toggle="modal" data-target="#sms" data-vid="Суроо берүү"
                            data-vopros="Сурооңузду жазыңыз"><i class="fas fa-question"></i></a></div>
                </div>
            </div>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <div class="modal fade bd-example-modal-lg" id="sms" tabindex="-1" role="dialog"
            data-backdrop="static" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header pt-2 pb-2" style="background: #f4f6f9;">
                        <p class="mb-0 text-center"><b class="sms1"></b></p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="background: #f4f6f9;">
                        @if (\Auth::user())
                            <form action="{{ route('contact_sms_store1') }}" method="POST" class="needs-validation"
                                novalidate>
                            @else
                                <form action="{{ route('contact_sms_store2') }}" method="POST"
                                    class="needs-validation" novalidate>
                        @endif
                        @csrf
                        <div class="form-group required pt-2">
                            <p class="mb-1">Аты-жөнүңүз</p>
                            @if (\Auth::user())
                                <input type="text" name="name" class="form-control" placeholder="Аты-жөнүңүз"
                                    required autocomplete="off" value="{{ \Auth::user()->name }}" readonly="">
                            @else
                                <input type="text" name="name" class="form-control" placeholder="Аты-жөнүңүз"
                                    required autocomplete="off">
                            @endif

                            <div class="invalid-feedback">Аты-жөнүңүздү жазыңыз!</div>
                        </div>

                        <div class="form-group mt-0 pt-0">
                            <p class="mb-1">Телефон номериңиз</p>
                            @if (\Auth::user())
                                <input type="text" class="form-control" data-inputmask='"mask": "0(999) 999-999"'
                                    data-mask name="phone" placeholder="0(709) 999-999" autocomplete="off" required
                                    value="{{ \Auth::user()->phone }}">
                            @else
                                <input type="text" class="form-control" data-inputmask='"mask": "0(999) 999-999"'
                                    data-mask name="phone" placeholder="0(709) 999-999" autocomplete="off"
                                    required>
                            @endif
                            <div class="invalid-feedback">Телефонуңузду жазыңыз!</div>
                        </div>

                        <div class="form-group mt-0 pt-0 required">
                            <p class="mb-1 sms2"></p>
                            <textarea type="text" name="sms" style="height: 100px;" class="form-control" placeholder="Билдирүү (sms)"
                                required></textarea>
                            <div class="invalid-feedback"><span class="sms2"></span>!</div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-default">Жөнөтүү</button>
                        </div>
                        </form>

                    </div>
                    <div class="modal-footer" style="background: #f4f6f9;">

                        <p class="text-center text-muted mb-0 pt-0 pb-2"><b>WhatsApp же Telegram аркылуу да билдирүү
                                калтырсаңыз болот</b></p>
                        <div class="card card-body pt-0 pb-0 mb-0 mt-2 two" style="cursor: pointer;">
                            <div class="row align-items-center block23">
                                <a href="https://wa.me/+996505919600?text="></a>
                                <div class="col-auto">
                                    <span style="font-size: 1.5em; color: #28a745;">
                                        <i class="fab fa-whatsapp"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-0"><b>WhatsApp</b></p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body pt-0 pb-0 mb-0 mt-2 two" style="cursor: pointer;">
                            <div class="row align-items-center  block23">
                                <a href="https://t.me/nonsi_kg?text="></a>
                                <div class="col-auto">
                                    <span style="font-size: 1.5em; color: #17a2b8;">
                                        <i class="fab fa-telegram-plane"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <p class="text-muted text-center mb-0 pt-0"><b>Telegram</b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark stepper3">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="{{asset('')}}/packages/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('')}}/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 4<script src="{{asset('')}}/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- ChartJS -->
    <script src="{{asset('')}}/admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{asset('')}}/admin/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="{{asset('')}}/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="{{asset('')}}../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('')}}/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{asset('')}}/admin/plugins/moment/moment.min.js"></script>
    <script src="{{asset('')}}/admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('')}}/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js">
    </script>
    <!-- Summernote -->
    <script src="{{asset('')}}/admin/plugins/summernote/summernote-bs4.js"></script>

    <script src="{{asset('')}}/admin/plugins/summernote/lang/summernote-ru-RU.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('')}}/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('')}}/admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('')}}/admin/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('')}}/admin/dist/js/pages/dashboard.js"></script>
    <!-- те которые я добавил -->
    <script src="{{asset('')}}/admin/admin.js"></script>
    <script type="text/javascript" src="{{asset('')}}/admin/dist/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="{{asset('')}}/packages/barryvdh/elfinder/js/standalonepopup2.js"></script>
    <script type="text/javascript" src="{{asset('')}}/admin/dist/js/bootstrap-filestyle.js"></script>

    <script src="{{asset('')}}/admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="{{asset('')}}/admin/plugins/toastr/toastr.min.js"></script>
    <script src="{{asset('')}}/admin/plugins/moment/moment.min.js"></script>
    <script src="{{asset('')}}/admin/plugins/inputmask/jquery.inputmask.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>

    <!-- Для добавления материалов -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    {{-- <script src="{{ asset('/packages/ckeditor4/wirislib.js') }}"></script> --}}
    <!--  -->



    <script>
        $(function() {
            $('[data-mask]').inputmask();
        });

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

            var containerOuterWidth = $('.bs-stepper-header')
                .outerWidth(); // узнаем ширину контейнера (width + padding)

            // обработчик клика по элементу
            $(".step").click(function() {
                var itemOuterWidth = $(this)
                    .outerWidth(); // узнаем ширину текущего элемента (width + padding)
                var itemOffsetLeft = $(this).offset()
                    .left; // узнаем значение отступа слева в контейнере у текущего элемента
                var containerScrollLeft = $(".bs-stepper-header")
                    .scrollLeft(); // узнаем текущее значение скролла

                var positionCetner = (containerOuterWidth / 1.3 - itemOuterWidth /
                    2); // рассчитываем позицию центра

                var scrollLeftUpd = containerScrollLeft + itemOffsetLeft -
                    positionCetner; // рассчитываем положение скролла относительно разницы отступа элемента и центра контейнера

                // анимируем
                $('.bs-stepper-header').animate({
                    scrollLeft: scrollLeftUpd
                }, 400);
            });
        });



        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();



        //  $(function () {
        //     $(document).ready(function () {
        //        $('#fileUploadForm').ajaxForm({
        //            beforeSend: function () {
        //                var percentage = '0';
        //            },
        //            uploadProgress: function (event, position, total, percentComplete) {
        //                var percentage = percentComplete;
        //               $('.progress .progress-bar').css("width", percentage+'%', function() {
        //                 return $(this).attr("aria-valuenow", percentage) + "%";
        //               })
        //           },
        //           complete: function (xhr) {
        //             Swal.fire({
        //                 icon: 'success',
        //                 title: '<h4 class="modal-title">Добавлено</h4>',
        //                showConfirmButton: false,
        //                timer: 3000,
        //                timerProgressBar: true,
        //                 padding: '1rem',
        //            })
        //              //window.location.href = '/moderator_panel/materialy';
        //           }
        //       });
        //   });
        //  });  







        $(function() {
            $('[data-toggle="popover"]').popover()
        })
        $('.popover-dismiss').popover({
            trigger: 'focus'
        })



        // для боковых меню в админке
        var url = window.location;

        // for sidebar menu entirely but not cover treeview
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active');

        // for treeview
        $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    </script>

    <!--Для добавления материалов -->
    <script>
        $(document).ready(function() {

            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                infinite: false,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({

                infinite: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: false,
                arrows: false,
                focusOnSelect: true
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            $(".for_comment_slider").slick({
                dots: true,
                infinite: false,
                pauseOnDotsHover: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: true,
                autoplaySpeed: 3500,
                arrows: false,
                AdaptiveHeight: true,
                touchThreshold: 100,
                responsive: [{
                    breakpoint: 480,
                    settings: {
                        dots: true,
                        infinite: false,
                        pauseOnDotsHover: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 3500,
                        arrows: false,
                        AdaptiveHeight: true,
                        touchThreshold: 100,
                    }
                }]


            });
        });








        $(function() {
            $(".w-15").click(
                function() {
                    var vid = $(this).attr('data-vid');
                    var vopros = $(this).attr('data-vopros');

                    $(".sms1").text(vid);
                    $(".sms2").text(vopros);
                })
        });
    </script>
</body>

</html>
