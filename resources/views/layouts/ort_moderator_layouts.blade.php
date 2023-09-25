<!DOCTYPE html>
<html lang="ru">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>ОРТ - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />
    <script src="{{ asset('/packages/ckeditor4/ckeditor.js') }}"></script>
    <script  src =" https://www.wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image " > </script>
    <link rel="icon" href="files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        

    <link rel="stylesheet" href="{{ asset('/portfolio/files/assets/pages/waves/css/waves.min.css') }}"
        type="text/css" media="all">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('/portfolio/files/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/portfolio/files/assets/icon/icofont/css/icofont.css') }}">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('/portfolio/files/assets/css/font-awesome-n.min.css') }}">
        
    <link rel="stylesheet" href="{{ asset('/portfolio/files/bower_components/chartist/css/chartist.css') }}"
        type="text/css" media="all">

        <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/assets/pages/toolbar/jquery.toolbar.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/assets/pages/toolbar/custom-toolbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/assets/css/pages.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/bower_components/switchery/css/switchery.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/bower_components/owl.carousel/css/owl.carousel.css') }}">

    <link rel="stylesheet" href="{{ asset('/portfolio/files/bower_components/select2/css/select2.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/bower_components/multiselect/css/multi-select.css') }}" />


    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/portfolio/files/assets/css/widget.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.css">
    

    <script src="{{ asset('/admin/fontawesomepro.js') }}"></script>
    
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
                    <div class="navbar-logo">
                        <a href="index.html">
                            {{-- <img class="img-fluid" src="{{ asset('/portfolio/files/assets/images/logo1.png') }}"
                                alt="Theme-Logo" /> --}}
                                НоНси - ОРТ
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            {{-- <i class="feather icon-menu icon-toggle-right"></i> --}}
                            <i class="fas fa-bars"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            {{-- <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()"
                                    class="waves-effect waves-light">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            {{-- <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-bell"></i>
                                        <span class="badge bg-c-red">5</span>
                                    </div>
                                    <ul class="show-notification notification-view dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">New</label>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius"
                                                    src="{{ asset('/portfolio/files/assets/images/avatar-4.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">John Doe</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                        elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius"
                                                    src="{{ asset('/portfolio/files/assets/images/avatar-3.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Joseph William</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media">
                                                <img class="img-radius"
                                                    src="{{ asset('/portfolio/files/assets/images/avatar-4.jpg') }}"
                                                    alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <h5 class="notification-user">Sara Soudein</h5>
                                                    <p class="notification-msg">Lorem ipsum dolor sit amet,
                                                        consectetuer elit.</p>
                                                    <span class="notification-time">30 minutes ago</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="displayChatbox dropdown-toggle" data-toggle="dropdown">
                                        <i class="feather icon-message-square"></i>
                                        <span class="badge bg-c-green">3</span>
                                    </div>
                                </div>
                            </li> --}}
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('/portfolio/files/assets/images/avatar-4.jpg') }}"
                                            class="img-radius" alt="User-Profile-Image">
                                        <span>John Doe</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-sign-in-social.html">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>
                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email"
                                            class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                    class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1"
                                    data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{ asset('/portfolio/files/assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2"
                                    data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('/portfolio/files/assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3"
                                    data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('/portfolio/files/assets/images/avatar-4.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4"
                                    data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('/portfolio/files/assets/images/avatar-3.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min
                                                ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5"
                                    data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ asset('/portfolio/files/assets/images/avatar-2.jpg') }}"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min
                                                ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            


            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-x"></i> Josephin Doe
                    </a>
                </div>
                <div class="main-friend-chat">
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('/portfolio/files/assets/images/avatar-2.jpg') }}"
                                alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">I'm just looking around. Will you tell me something about
                                    yourself?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <div class="media-body chat-menu-reply">
                            <div class="">
                                <p class="chat-cont">Ohh! very nice</p>
                            </div>
                            <p class="chat-time">8:22 a.m.</p>
                        </div>
                    </div>
                    <div class="media chat-messages">
                        <a class="media-left photo-table" href="#!">
                            <img class="media-object img-radius img-radius m-t-5"
                                src="{{ asset('/portfolio/files/assets/images/avatar-2.jpg') }}"
                                alt="Generic placeholder image">
                        </a>
                        <div class="media-body chat-menu-content">
                            <div class="">
                                <p class="chat-cont">can you come with me?</p>
                            </div>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="chat-reply-box">
                    <div class="right-icon-control">
                        <div class="input-group input-group-button">
                            <input type="text" class="form-control" placeholder="Write hear . . ">
                            <div class="input-group-append">
                                <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                        class="feather icon-message-circle"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                {{-- <div class="pcoded-navigation-label">Navigation</div> --}}
                                <ul class="pcoded-item pcoded-left-item nav-sidebar">
                                    {{-- <li class="pcoded-hasmenu ssdd">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                        <ul class="pcoded-submenu nav-treeview">
                                            <li class="ssdd">
                                                <a href="index.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Default</span>
                                                </a>
                                            </li>
                                            <li class="ssdd">
                                                <a href="default/dashboard-crm.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">CRM</span>
                                                </a>
                                            </li>
                                            <li class="ssdd">
                                                <a href="default/dashboard-analytics.html"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Analytics</span>
                                                    <span class="pcoded-badge label label-info ">NEW</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li> --}}

                                    <li class="ssdd">
                                        <a href="{{ route('moderator_panel_ort') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Башкы бет</span>
                                        </a>
                                    </li>
                                    <li class="ssdd">
                                        <a href="{{ route('moderator_panel_ort_online_sabak') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-menu"></i>
                                            </span>
                                            <span class="pcoded-mtext">Онлайн сабак</span>
                                        </a>
                                    </li>
                                    <li class="ssdd">
                                        <a href="{{ route('ort_moderator_online_test_view') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-menu"></i>
                                            </span>
                                            <span class="pcoded-mtext">Тесттер</span>
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </nav>

                    <div class="pcoded-content">
                        @yield('content')
                    </div>

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>





    <script data-cfasync="false"
        src="{{ asset('/portfolio/files/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('/portfolio/files/bower_components/jquery/js/jquery.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('/portfolio/files/bower_components/jquery-ui/js/jquery-ui.min.js') }}">
    </script>
   



    <script type="text/javascript" src="{{ asset('/portfolio/files/bower_components/popper.js/js/popper.min.js') }}">
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="{{ asset('/portfolio/files/bower_components/switchery/js/switchery.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('/portfolio/files/assets/pages/accordion/accordion.js') }}"></script> 
        <script src="{{ asset('/admin/plugins/summernote/summernote-bs4.js') }}"></script>
        <script src="{{ asset('/admin/plugins/summernote/lang/summernote-ru-RU.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.9.0/katex.min.js"></script>
        
    <script src="{{ asset('/portfolio/files/assets/pages/waves/js/waves.min.js') }}"></script>

    <script type="text/javascript"
        src="{{ asset('/portfolio/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>

    {{-- <script src="{{ asset('/portfolio/files/assets/pages/chart/float/jquery.flot.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/chart/float/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/chart/float/curvedLines.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/chart/float/jquery.flot.tooltip.min.js') }}"></script> --}}

    <script src="{{ asset('/portfolio/files/bower_components/chartist/js/chartist.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/portfolio/files/assets/js/jquery.stickme.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/widget/amchart/amcharts.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/widget/amchart/serial.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/widget/amchart/light.js') }}"></script>

    <script src="{{ asset('/portfolio/files/assets/pages/form-masking/inputmask.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/form-masking/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/form-masking/autoNumeric.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/pages/form-masking/form-mask.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/portfolio/files/assets/pages/toolbar/jquery.toolbar.min.js') }}"></script>
    

    <script src="{{ asset('/portfolio/files/assets/js/pcoded.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/portfolio/files/bower_components/modernizr/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/portfolio/files/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
    <script src="{{ asset('/portfolio/files/assets/js/vertical/vertical-layout.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    
    {{-- <script type="text/javascript"
        src="{{ asset('/portfolio/files/assets/pages/dashboard/custom-dashboard.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('/portfolio/files/assets/js/script.min.js') }}"></script>
    
    <script>


        //Активный меню үчүн
        var url = window.location;
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).parents('.ssdd').addClass('active pcoded-trigger');
        //--Активный меню үчүн

        

        //for switch
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
        var switchery = new Switchery(html, { size: 'small', color: '#007bff', jackColor: '#fff', });
        });
        //--for switch
    </script>
</body>


</html>
