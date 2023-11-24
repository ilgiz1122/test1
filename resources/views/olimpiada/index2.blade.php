<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="shrink-to-fit=no, viewport-fit=cover, width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <title>Олимпиада</title>
    <base />
    <meta name="keywords" content="">
    <meta name="description"
        content="Олимпиадага катышуу үчүн катталыңыз!">
    <meta property="og:title" content="Олимпиада">
    <meta property="og:description"
        content="Олимпиадага катышуу үчүн катталыңыз!">
    <meta property="og:image" content="{{ asset('/olimpiada/static/img/og/vk_olimpiada.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('/olimpiada/static/img/og/vk_olimpiada.png') }}" />
    <meta property="og:site_name" content="Олимпиада">
    <meta property="og:type" content="website">
    <meta property="og:url" content="index.html">

    <link rel="icon" href="{{ asset('/olimpiada/static/img/favicon/favicon.ico') }}" />
    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('/olimpiada/static/img/favicon/favicon.ico') }}" />


    <link type="image/png" rel="icon" sizes="16x16"
        href="{{ asset('/olimpiada/static/img/favicon/favicon-16.png') }}" />
    <link type="image/png" rel="icon" sizes="32x32"
        href="{{ asset('/olimpiada/static/img/favicon/favicon-32.png') }}" />
    <link type="image/png" rel="icon" sizes="96x96"
        href="{{ asset('/olimpiada/static/img/favicon/favicon-96.png') }}" />
    <link type="image/png" rel="icon" sizes="120x120"
        href="{{ asset('/olimpiada/static/img/favicon/favicon-120.png') }}" />
    <link type="image/png" rel="icon" sizes="192x192"
        href="{{ asset('/olimpiada/static/img/favicon/favicon-192.png') }}" />

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/olimpiada/static/img/favicon/favicon-57.png') }}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/olimpiada/static/img/favicon/favicon-60.png') }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/olimpiada/static/img/favicon/favicon-72.png') }}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/olimpiada/static/img/favicon/favicon-76.png') }}" />
    <link rel="apple-touch-icon" sizes="96x96" href="{{ asset('/olimpiada/static/img/favicon/favicon-96.png') }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/olimpiada/static/img/favicon/favicon-114.png') }}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/olimpiada/static/img/favicon/favicon-120.png') }}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/olimpiada/static/img/favicon/favicon-144.png') }}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/olimpiada/static/img/favicon/favicon-152.png') }}" />
    <link rel="apple-touch-icon" sizes="160x160" href="{{ asset('/olimpiada/static/img/favicon/favicon-160.png') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/olimpiada/static/img/favicon/favicon-180.png') }}" />
    <link rel="apple-touch-icon" sizes="256x256" href="{{ asset('/olimpiada/static/img/favicon/favicon-256.png') }}" />
    <link rel="apple-touch-icon" sizes="512x512" href="{{ asset('/olimpiada/static/img/favicon/favicon-512.png') }}" />


    <link rel="stylesheet" href="{{ asset('/olimpiada/static/css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ asset('/olimpiada/static/fonts/stylesheet.css') }}" />
    <link href="{{ asset('/olimpiada/static/css/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/olimpiada/unpkg.com/swiper%406.5.8/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/olimpiada/static/css/intlTelInpute560.css') }}" />

    <link rel="stylesheet" href="{{ asset('/olimpiada/static/css/stylee560.css') }}" />

    <link rel="stylesheet" href="{{ asset('/olimpiada/static/css/olimpiadae560.css') }}">

    <script src="{{ asset('/olimpiada/cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>
    <script src="{{ asset('/olimpiada/static/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('/olimpiada/static/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/olimpiada/unpkg.com/aos%402.3.1/dist/aos.js') }}"></script>
    <script src="{{ asset('/olimpiada/cdnjs.cloudflare.com/ajax/libs/Swiper/6.5.8/swiper-bundle.min.js') }}"></script>

    <script src="{{ asset('/olimpiada/static/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('/olimpiada/static/js/intlTelInput-utils.js') }}"></script>

    <script src="{{ asset('/olimpiada/static/js/maine560.js') }}"></script>
    <script src="{{ asset('/olimpiada/static/js/validation.formse560.js') }}"></script>
    <script src="{{ asset('/olimpiada/static/js/pspe560.js') }}"></script>


    <script src="{{ asset('/olimpiada/static/js/olimpiadae560.js') }}"></script>






    <script>
        let stayHereAfterRegister = false;
        // let stayHereAfterRegister = true;
        let userIsAuth = false;
        let registrationSkipSms = true;
        let registrationSkipDelay = 3000;
        const isFlocktoryImpactcForms = true;
        const gatewayAPI = "https://api-gw.interneturok.ru/";
        const authURL = "https://interneturok.ru/home";
        const authCookieName = "AUTH";
        const recapchaSiteKey = "6LeftZIjAAAAAAjRynxVGoog_KTK1Ddx3e5aW70W";
        const yaRecapchaSiteKey = "ysc1_40BcbdwMJOEgz7OeCjtMANwpz5IEWJGTBZgV8sxUc035c493";
        const yaRecapchaSiteKeyModx = "ysc1_wFBUuDtazhS4jWSVdbZaRmWxt3pcEkP8TSg4pEfDdf512bd1";
        let yaRecapchaSiteKeyAuth = "ysc1_JPvACOeFIfxaviwEe6idPSEhnvU3NwQUjKDfEBFfc4d400bc";
        const authCartLink = "/home/cart";
        const authCartLinkEmpty = "/home/catalog";
        const cartLink = "/home/catalog";
        window._paq = [];
    </script>



    <link rel="stylesheet" href="{{ asset('/olimpiada/assets_hs/components/ajaxform/css/default.css') }}"
        type="text/css" />
</head>

<body>
    <script defer>
        (function() {
            var d = document,
                g = d.createElement("script"),
                s = d.getElementsByTagName("script")[0];
            g.type = "text/javascript";
            g.defer = true;
            g.async = true;
            g.innerHTML =
                '_paq.push(["setSiteId", "landing_iu"]); _paq.push(["trackPageView"]); _paq.push(["enableLinkTracking"]);'
            s.parentNode.insertBefore(g, s);
        })();
    </script>

    <header>
        <div class="header">

            <div class="header-wrap">
                <div class="header-burger">
                    <div class="burger">
                        <div class="burger-cont">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="burger-title js-burger-arrow-title">Олимпиада</div>
                    </div>

                </div>
                <div class="header-logo">
                    <a href="http://interneturok.ru/">
                        <img src="{{ asset('/olimpiada/static/img/olimpiada_logo.svg') }}"
                            alt="Internet Urok logo" />
                    </a>
                </div>

                <div class="header-nav">
                    <nav>
                        {{-- <span class="header-nav-item header-nav-item_caret" data-submenu="1">
                            Школа <span class="header-nav-item-caret"></span>
                        </span>
                        <span class="header-nav-item header-nav-item_caret" data-submenu="2">
                            Курсы и услуги <span class="header-nav-item-caret"></span>
                        </span>
                        <span class="header-nav-item header-nav-item_caret" data-submenu="3">
                            Полезное <span class="header-nav-item-caret"></span>
                        </span>
                        <span class="header-nav-item header-nav-item_caret" data-submenu="4">
                            О нас <span class="header-nav-item-caret"></span>
                        </span> --}}

                        <span class="btn btn-header-phone btn-header-phone_mobile btn-grey pp_" data-pp="callback">
                            <span> <img src="{{ asset('/olimpiada/static/img/header-phone.svg') }}" alt="phone">
                                 0(505) 91 96 00</span>
                        </span>

                    </nav>
                </div>
                <div class="header-userbox">
                    <span class="btn btn-header-phone btn-grey pp_" data-pp="callback"><span>
                      <img src="{{ asset('/olimpiada/static/img/header-phone.svg') }}" alt="phone">
                      0(505) 91 96 00</span>
                    </span>
                    <a type="button" class="hader-cart header-lang" style="border: none; cursor: pointer">
                        <div class="hader-cart-item" style="width: 100%; height: 100%">
                            <img src="{{ asset('/olimpiada/static/img') }}/lang_{{ app()->getLocale() }}.svg" alt="{{ app()->getLocale() }}" />
                        </div>
                        <div class="header-cart-count js-header-cart-count" style="display:none;">-</div>
                    </a>
                    <span class="btn btn-header-auth btn-orange pp_" data-pp="auth" style="display:none;"><span>
                      <img src="{{ asset('/olimpiada/static/img/header-account.svg') }}" alt="">
                            <span class="btn-header-auth-text">Кирүү</span></span>
                    </span>
                    <div class="header-profile btn btn-header-profile btn-white-border" style="display:none;"><span>
                            <img src="{{ asset('/olimpiada/static/img/user-dark.svg') }}" class="header-profile-icon"
                                alt="user">
                            <span class="btn-header-profile-text">Профиль</span></span>
                        <img src="{{ asset('/olimpiada/static/img/header-menu-caret.svg') }}"
                            class="header-profile-caret" alt="caret">
                    </div>
                    
                </div>

                <div class="lang-menu-back js-close-lang-menu"></div>
                <div class="header-lang-menu">
                    <div class="header-lang-menu-cross js-close-lang-menu">
                        <img src="{{ asset('/olimpiada/static/img/header-profilemenu-cross.svg') }}" alt="cross">
                    </div>
                    <a href="javascript:void(0);" class="header-profile-userinfo js-userprofile-info"
                        >
                        <div class="header-profile-userinfo-text">
                            <div class="header-profile-name js-userprofile-name">Выберите язык</div>
                        </div>
                    </a>
                    <div class="user-profile-menu">
                      @php
                        $currentUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        $newLanguage = "kg";
                        $newUrl = preg_replace('/\/ru\//', "/$newLanguage/", $currentUrl, 1);
                        $newLanguage2 = "ru";
                        $newUrl2 = preg_replace('/\/kg\//', "/$newLanguage2/", $currentUrl, 1);
                      @endphp
                      <a href="{{$newUrl}}">
                        <span class="user-profile-menu-item">
                          <img src="{{ asset('/olimpiada/static/img/lang_kg.svg') }}" class="pr-10" alt="kg" /> Кыргызча 
                        </span>
                      </a>
                      <a href="{{$newUrl2}}">
                        <span class="user-profile-menu-item">
                          <img src="{{ asset('/olimpiada/static/img/lang_ru.svg') }}"  class="pr-10" alt="ru" /> Русский 
                        </span>
                      </a>
                    </div>
                </div>

                <div class="profile-menu-back js-close-profile-menu"></div>
                <div class="header-profile-menu">
                    <div class="header-profile-menu-cross js-close-profile-menu">
                        <img src="{{ asset('/olimpiada/static/img/header-profilemenu-cross.svg') }}" alt="cross">
                    </div>
                    <a href="https://psp.interneturok.ru/profile" class="header-profile-userinfo js-userprofile-info"
                        style="display:none;">
                        <div class="header-profile-avatar js-userprofile-avatar">
                            <img src="{{ asset('/olimpiada/static/img/ava-empty.svg') }}"
                                onError="this.onerror=null;this.src='{{ asset('/olimpiada/static/img/ava-empty.svg') }}';"
                                alt="avatar">
                        </div>
                        <div class="header-profile-userinfo-text">
                            <div class="header-profile-name js-userprofile-name"></div>
                            <div class="header-profile-email js-userprofile-email"></div>
                        </div>
                    </a>
                    <div class="user-profile-menu">
                        <a href="http://interneturok.ru/home/" class="user-profile-menu-item">Домашняя школа</a>
                        <a href="http://interneturok.ru/kursy_i_uslugi/biblioteka_videourokov/"
                            class="user-profile-menu-item">Библиотека видеоуроков</a>
                        <a href="https://psp.interneturok.ru/profile" class="user-profile-menu-item">Личный
                            кабинет</a>
                        <span class="user-profile-menu-item user-profile-menu-item_logout js-logout">Выход <img
                                src="{{ asset('/olimpiada/static/img/logout.svg') }}" alt="logout" /></span>
                    </div>
                </div>

                {{-- <div class="header__additional-layer">

                    <div class="submenu" data-submenu="1">
                        <div class="submenu-wrap">
                            <div class="submenu-homeschool">
                                <a href="http://interneturok.ru/kursy_i_uslugi/shkola/" class="homeschool-item">
                                    <div class="submenu-homeschool-images">
                                        <img src="{{ asset('/olimpiada/static/img/submenu-homeschool.jpg') }}"
                                            class="submenu-homeschool-images_desktop" alt="Домашняя школа">
                                        <img src="{{ asset('/olimpiada/static/img/submenu-homeschool.jpg') }}"
                                            class="submenu-homeschool-images_mobile" alt="Домашняя школа">
                                    </div>
                                    <div class="homeschool-item-title">Школа ИнтернетУрок</div>
                                    <div class="homeschool-item-sep gradient-sep-white"></div>
                                    <div class="homeschool-item-text">Полное среднее образование <br> с 1 по 11 класс
                                        дистанционно </div>
                                    <div class="homeschool-arrow">
                                        <img src="{{ asset('/olimpiada/static/img/arrow-white-right.svg') }}"
                                            alt="arrow">
                                    </div>
                                </a>
                            </div>

                            <div class="school-submenu-classes">
                                <div class="school-submenu-classlist">

                                    <a href="http://interneturok.ru/kursy_i_uslugi/podgotovka_k_shkole/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">0</div>
                                        <div class="submenu-classlist-item-text">Дошкола</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/1_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">1</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/2_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">2</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/3_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">3</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/4_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">4</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/5_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">5</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/6_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">6</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/7_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">7</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/8_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">8</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/9_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">9</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/10_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">10</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                    <a href="http://interneturok.ru/shkola/obuchenie_po_klassam/11_klass_online/"
                                        class="submenu-classlist-item">
                                        <div class="submenu-classlist-item-title">11</div>
                                        <div class="submenu-classlist-item-text">Класс</div>
                                    </a>

                                </div>
                                <div class="school-submenu-classlist-submenu">

                                    <a href="http://interneturok.ru/shkola/uchebnyi_process/"
                                        class="submenu-menuitem">
                                        <div class="submenu-menuitem-title">Учебный процесс</div>
                                        <div class="submenu-menuitem-description">Полная экосистема учебного процесса
                                            ИнтернетУрока</div>
                                    </a>
                                    <a href="http://interneturok.ru/shkola/uspehi_uchenikov/"
                                        class="submenu-menuitem">
                                        <div class="submenu-menuitem-title">Успехи учеников</div>
                                        <div class="submenu-menuitem-description">Результаты наших выпускников на ГИА
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="school-submenu-items">

                                <a href="http://interneturok.ru/shkola/uchebnyi_process/"
                                    class="submenu-menuitem submenu-menuitem_hidden">
                                    <div class="submenu-menuitem-title">Учебный процесс</div>
                                    <div class="submenu-menuitem-description">Полная экосистема учебного процесса
                                        ИнтернетУрока </div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_06.jpg') }}"
                                            alt="Учебный процесс">
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/shkola/uspehi_uchenikov/"
                                    class="submenu-menuitem submenu-menuitem_hidden">
                                    <div class="submenu-menuitem-title">Успехи учеников</div>
                                    <div class="submenu-menuitem-description">Результаты наших выпускников на ГИА
                                    </div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_05.jpg') }}"
                                            alt="Успехи учеников">
                                    </div>
                                </a>

                                <a href="http://interneturok.ru/shkola/stoimost/" class="submenu-menuitem">
                                    <div class="submenu-menuitem-title">Стоимость</div>
                                    <div class="submenu-menuitem-description">Подробно про стоимость обучения в школе
                                    </div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_04.jpg') }}"
                                            alt="Стоимость">
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/shkola/zachislenie/" class="submenu-menuitem">
                                    <div class="submenu-menuitem-title">Зачисление</div>
                                    <div class="submenu-menuitem-description">Как перевестись в школу, какие документы
                                        нужны </div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_03.jpg') }}"
                                            alt="Зачисление">
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/shkola/effektivnye_kursy/" class="submenu-menuitem">
                                    <div class="submenu-menuitem-title">Эффективные курсы</div>
                                    <div class="submenu-menuitem-description">Качество знаний — и ничего лишнего</div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_02.jpg') }}"
                                            alt="Эффективные курсы">
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/shkola/baza_i_profil/" class="submenu-menuitem">
                                    <div class="submenu-menuitem-title">База и профиль</div>
                                    <div class="submenu-menuitem-description">Разделение уровней обучения в 5-11
                                        классах</div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_01.jpg') }}"
                                            alt="База и профиль">
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/shkola/istoriya_i_dostizheniya/"
                                    class="submenu-menuitem">
                                    <div class="submenu-menuitem-title">История развития</div>
                                    <div class="submenu-menuitem-description">Хронология нововведений и достижения
                                    </div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_06.jpg') }}"
                                            alt="История развития">
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/shkola/dokumenty/" class="submenu-menuitem">
                                    <div class="submenu-menuitem-title">Документы</div>
                                    <div class="submenu-menuitem-description">Лицензия и прочие документы школы</div>
                                    <div class="submenu-menuitem-icon">
                                        <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_07.jpg') }}"
                                            alt="Документы">
                                    </div>
                                </a>
                            </div>


                        </div>
                    </div>



                    <div class="submenu" data-submenu="2">
                        <div class="submenu-wrap">
                            <div class="services-list">

                                <div class="services-list-column">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/shkola_layt/"
                                        class="services-item services-item_orange">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Школьная программа</div>
                                            <div class="services-item-title">Школа <br>лайт</div>
                                            <div class="services-item-text_i">Полный школьный курс без зачисления</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/2_1.png') }}"
                                                    alt="Школа <br>лайт">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/shkola_ekspress/"
                                        class="services-item services-item_orange">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Школьная программа </div>
                                            <div class="services-item-title">Школа <br>экспресс </div>
                                            <div class="services-item-text_i">Школьная программа структурированно и
                                                понятно</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/6.png') }}"
                                                    alt="Школа <br>экспресс ">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/biblioteka_videourokov/"
                                        class="services-item services-item_orange">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Школьная программа</div>
                                            <div class="services-item-title">Библиотека<br />видеоуроков</div>
                                            <div class="services-item-text_i">Видео, конспекты, тесты, тренажеры</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/5.png') }}"
                                                    alt="Библиотека<br/>видеоуроков">
                                            </div>
                                        </div>
                                    </a>
                                </div>


                                <div class="services-list-column">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/onlayn_kursy_podgotovki_k_oge_i_ege/"
                                        class="services-item services-item_orange">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Школьная программа</div>
                                            <div class="services-item-title">Подготовка <br>к ОГЭ/ЕГЭ </div>
                                            <div class="services-item-text_i">Онлайн-подготовка в мини-группах или на
                                                вебинарах</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/3.png') }}"
                                                    alt="Подготовка <br>к ОГЭ/ЕГЭ ">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/doshkola/"
                                        class="services-item services-item_yellow">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Дошкола</div>
                                            <div class="services-item-title">Дошкола <br>&nbsp;</div>
                                            <div class="services-item-text_i">Развивающие занятия для дошкольников
                                            </div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/1.png') }}"
                                                    alt="Дошкола <br>&nbsp;">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/pomoshch_s_domashnimi_zadaniyami/"
                                        class="services-item services-item_pink">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Помощь школьникам</div>
                                            <div class="services-item-title">Помощь с домашними заданиями</div>
                                            <div class="services-item-text_i">Наставники, репетиторы, онлайн-продлёнка
                                            </div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/7.png') }}"
                                                    alt="Помощь с домашними заданиями">
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="services-list-column">
                                    <a href="index.html" class="services-item services-item_blue">
                                        <div class="services-item-text">
                                            <div class="services-item-category"> Дополнительно</div>
                                            <div class="services-item-title">Олимпиада<br>«Лучик»</div>
                                            <div class="services-item-text_i">По всем ключевым предметам 1-11 классы
                                            </div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/icon_menu_13.png') }}"
                                                    alt="Олимпиада<br>«Лучик»">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/zdorovoe_pitanie/"
                                        class="services-item services-item_blue">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Дополнительно</div>
                                            <div class="services-item-title">Здоровое питание<br>от А до Я</div>
                                            <div class="services-item-text_i">Курс для детей и <br>родителей</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/icon_menu_12.png') }}"
                                                    alt="Здоровое питание<br>от А до Я">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="https://vospitanie.interneturok.ru/" target="_blank"
                                        class="services-item services-item_blue">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Дополнительно</div>
                                            <div class="services-item-title">Полезное<br>восПитание</div>
                                            <div class="services-item-text_i">Образовательный портал<br>для родителей
                                            </div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/icon_menu_14.png') }}"
                                                    alt="Полезное<br>восПитание">
                                            </div>
                                        </div>
                                    </a>
                                </div>


                                <div class="services-list-column">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/uroki_dlya_roditeley/"
                                        class="services-item services-item_blue">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Дополнительно</div>
                                            <div class="services-item-title">Уроки <br>для родителей</div>
                                            <div class="services-item-text_i">Школьная программа для вовлеченных
                                                родителей</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/4.png') }}"
                                                    alt="Уроки <br>для родителей">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/psihologiya/"
                                        class="services-item services-item_blue">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Дополнительно</div>
                                            <div class="services-item-title">Психология<br> для старшеклассников</div>
                                            <div class="services-item-text_i">Видеокурс психологии для подростков</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/menu/ic_menu_06.jpg') }}/static/img/services/8.png"
                                                    alt="Психология<br> для старшеклассников">
                                            </div>
                                        </div>
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/emocionalnyy_intellekt/"
                                        class="services-item services-item_pink">
                                        <div class="services-item-text">
                                            <div class="services-item-category">Дополнительно</div>
                                            <div class="services-item-title">Эмоциональный интеллект</div>
                                            <div class="services-item-text_i">Развитие ЭИ и гибких навыков для детей
                                                6-16 лет</div>
                                        </div>
                                        <div class="services-item-iconbox">
                                            <div class="services-item-icon">
                                                <img src="{{ asset('/olimpiada/static/img/services/icon_menu_15.png') }}"
                                                    alt="Эмоциональный интеллект">
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="submenu" data-submenu="3">
                        <div class="submenu-wrap">
                            <div class="useful-wrap">
                                <div class="useful-list">
                                    <div class="useful-box useful-box_blog">
                                        <a href="http://interneturok.ru/blog/" class="useful-box-title">Журнал</a>
                                        <div class="useful-box-list">
                                            <a href="http://interneturok.ru/blog/domashnee_obrazovanie/"
                                                class="useful-box-menuitem">О домашнем обучении</a>
                                            <a href="http://interneturok.ru/blog/lichnyj_opyt/"
                                                class="useful-box-menuitem">Личный опыт</a>
                                            <a href="http://interneturok.ru/blog/chemu_i_kak_uchit/"
                                                class="useful-box-menuitem">Школа будущего</a>
                                            <a href="http://interneturok.ru/blog/uchebnye_voprosy/"
                                                class="useful-box-menuitem">Учебные вопросы</a>
                                            <a href="http://interneturok.ru/blog/voprosy_psihologii/"
                                                class="useful-box-menuitem">Вопросы психологии</a>
                                            <a href="http://interneturok.ru/blog/podgotovka_k_oge_i_ege/"
                                                class="useful-box-menuitem">Подготовка к ОГЭ и ЕГЭ</a>
                                            <a href="http://interneturok.ru/blog/podgotovka_k_shkole/"
                                                class="useful-box-menuitem">Дошкольники</a>
                                            <a href="http://interneturok.ru/blog/posle_urokov/"
                                                class="useful-box-menuitem">После уроков</a>
                                        </div>
                                    </div>

                                    <div class="useful-box useful-box_faq">
                                        <a href="http://interneturok.ru/faq/"
                                            class="useful-box-title">Вопрос-ответ</a>
                                        <div class="useful-box-list">
                                            <a href="http://interneturok.ru/faq/#kak_rabotaet_dsh"
                                                class="useful-box-menuitem">О школе «ИнтернетУрок»</a>

                                            <a href="http://interneturok.ru/faq/#oficzialnoe_zachislenie"
                                                class="useful-box-menuitem">Официальное зачисление</a>

                                            <a href="http://interneturok.ru/faq/#nachalo_obucheniya"
                                                class="useful-box-menuitem">Начало обучения</a>

                                            <a href="http://interneturok.ru/faq/#uchebnyij_proczess"
                                                class="useful-box-menuitem">Учебный процесс</a>

                                            <a href="http://interneturok.ru/faq/#dz_i_oczenki"
                                                class="useful-box-menuitem">ДЗ и оценки</a>

                                            <a href="http://interneturok.ru/faq/#kontrolnyie_i_attestacziya"
                                                class="useful-box-menuitem">Контрольные и аттестация</a>

                                            <a href="http://interneturok.ru/faq/#oplata_i_formaty_obucheniya"
                                                class="useful-box-menuitem">Оплата и форматы обучения</a>

                                            <a href="http://interneturok.ru/faq/#vzaimodejstvie_s_uchitelyami"
                                                class="useful-box-menuitem">Взаимодействие с учителями</a>

                                            <a href="http://interneturok.ru/faq/#kak_svyazatsya_s_administraciey"
                                                class="useful-box-menuitem">Как связаться с администрацией</a>

                                            <a href="http://interneturok.ru/faq/#texnicheskaya_podderzhka"
                                                class="useful-box-menuitem">Техническая поддержка</a>

                                            <a href="http://interneturok.ru/faq/#voprosyi_volnuyushhie_roditelej"
                                                class="useful-box-menuitem">Вопросы, волнующие родителей</a>
                                        </div>
                                    </div>
                                    <div class="useful-box useful-box_other">

                                        <a href="http://interneturok.ru/shkola_doma/" class="useful-box_other-item ">
                                            <div class="useful-box-title">Школа дома</div>
                                            <div class="useful-box-description">Документальный сериал о семейном
                                                образовании</div>
                                        </a>
                                        <a href="http://interneturok.ru/kniga_shkolnaya_matematika_dlya_roditelej/"
                                            class="useful-box_other-item useful-box_other-item_nomargin">
                                            <div class="useful-box-title">Школьная математика для родителей</div>
                                            <div class="useful-box-description">Книга М.И. Лазарева и
                                                Ю.В.&nbsp;Гребенюка</div>
                                        </a>

                                        <div class="useful-box useful-library useful-library_mobile">
                                            <a href="https://mi-lazarev.ru/" target="_blank"
                                                class="useful-lazarev-library">
                                                <div class="useful-lazarev-library-title">Библиотека
                                                    материалов<br />М.И. Лазарева</div>
                                                <div class="useful-lazarev-library-description">Статьи, интервью и
                                                    видеоматериалы основателя ИнтернетУрока</div>
                                                <div class="useful-lazarev-library-arrow">
                                                    <img src="{{ asset('/olimpiada/static/img/arrow-top-right-dark.svg') }}"
                                                        alt="arrow">
                                                </div>
                                            </a>
                                        </div>

                                        <div class="useful-box useful-library useful-library_mobile">
                                            <a href="http://interneturok.ru/glossariy/" class="">
                                                <div class="useful-box-title">Глоссарий</div>
                                                <div class="useful-box-description">Справочник терминов для учеников
                                                </div>
                                            </a>
                                        </div>

                                    </div>


                                    <div class="useful-box useful-library useful-box_other">
                                        <a href="https://mi-lazarev.ru/" target="_blank"
                                            class="useful-lazarev-library useful-box_other-item">
                                            <div class="useful-lazarev-library-title">Библиотека материалов<br />М.И.
                                                Лазарева</div>
                                            <div class="useful-lazarev-library-description">Статьи, интервью и
                                                видеоматериалы основателя ИнтернетУрока</div>
                                            <div class="useful-lazarev-library-arrow">
                                                <img src="{{ asset('/olimpiada/static/img/arrow-top-right-dark.svg') }}"
                                                    alt="arrow">
                                            </div>
                                        </a>
                                        <a href="http://interneturok.ru/glossariy/" class="useful-box_other-item">
                                            <div class="useful-box-title">Глоссарий</div>
                                            <div class="useful-box-description">Справочник терминов для учеников</div>
                                        </a>

                                    </div>


                                </div>


                            </div>


                        </div>
                    </div>



                    <div class="submenu" data-submenu="4">
                        <div class="submenu-wrap">
                            <div class="about-submenu">


                                <a href="http://interneturok.ru/ob_interneturoke/" class="about-submenu-item">
                                    <div class="about-submenu-item-title">Об ИнтернетУроке</div>
                                    <div class="about-submenu-item-text">Крупнейшая образовательная онлайн-школа с 1 по
                                        11 классы</div>
                                </a>
                                <a href="http://interneturok.ru/ob_interneturoke/nashi_prepodavateli/"
                                    class="about-submenu-item">
                                    <div class="about-submenu-item-title">Наши преподаватели</div>
                                    <div class="about-submenu-item-text">Уроки в нашей школе подготовлены
                                        профессиональными педагогами</div>
                                </a>
                                <a href="http://interneturok.ru/ob_interneturoke/rukovodstvo/"
                                    class="about-submenu-item">
                                    <div class="about-submenu-item-title">Руководство</div>
                                    <div class="about-submenu-item-text">Крупнейшая образовательная онлайн-школа с 1 по
                                        11 классы</div>
                                </a>
                                <a href="http://interneturok.ru/ob_interneturoke/my_v_smi/"
                                    class="about-submenu-item">
                                    <div class="about-submenu-item-title">Мы в СМИ</div>
                                    <div class="about-submenu-item-text">Мы всегда рады подробно рассказать о ценностях
                                        в образовании</div>
                                </a>
                                <a href="http://interneturok.ru/ob_interneturoke/nasha_filosofiya/"
                                    class="about-submenu-item">
                                    <div class="about-submenu-item-title">Наша философия</div>
                                    <div class="about-submenu-item-text">Изменим мир в лучшую сторону через образование
                                    </div>
                                </a>
                                <a href="http://interneturok.ru/ob_interneturoke/partners/"
                                    class="about-submenu-item">
                                    <div class="about-submenu-item-title">Наши партнеры</div>
                                    <div class="about-submenu-item-text">Совместные проекты</div>
                                </a>
                                <a href="http://interneturok.ru/ob_interneturoke/otzyvy/" class="about-submenu-item">
                                    <div class="about-submenu-item-title">Отзывы</div>
                                    <div class="about-submenu-item-text">Отзывы учеников расскажут об ИнтернетУроке
                                        лучше нас</div>
                                </a>
                                <a href="http://interneturok.ru/kontakty/" class="about-submenu-item">
                                    <div class="about-submenu-item-title">Контакты</div>
                                    <div class="about-submenu-item-text">Будем на связи!</div>
                                </a>
                            </div>

                        </div>
                    </div>




                </div> --}}
            </div>
        </div>
    </header>
    <div class="main-luchik">
        <section class="luchik-intro">
            <div class="luchik-container">
                <div class="luchik-intro__body">
                    <div class="luchik-intro__desc desc-luchik-intro">
                        <div class="desc-luchik-intro__image">
                            <picture>
                                <img src="{{ asset('/olimpiada/static/img/olimpiada/intro/01.png') }}"
                                    srcset="{{ asset('/olimpiada/static/img/olimpiada/intro/01.png') }} 1x, {{ asset('/olimpiada/static/img/olimpiada/intro/01@2x.png') }} 2x"
                                    alt="image" data-aos="fade" data-aos-delay="2400" class="">
                            </picture>
                        </div>
                        <div class="desc-luchik-intro__label " data-aos="fade-up">
                            ИнтернетУрок представляет
                        </div>
                        <h1 class="desc-luchik-intro__title " data-aos="fade-up" data-aos-delay="200">
                            Комплексная Олимпиада «Лучик» </h1>
                        <h3 class="desc-luchik-intro__subtitle " data-aos="fade-up" data-aos-delay="400">
                            Выбирай, в каком направлении ты чувствуешь свою силу, и регистрируйся на участие в Олимпиаде
                            «Лучик»! </h3>
                        <div data-aos="fade-up" data-aos-delay="600" class="">
                            <a href="https://forms.gle/RzijsCLBHhEHVNTm7"
                                class="desc-luchik-intro__button luchik-button" target="_blank">
                                <span class="luchik-button__text">
                                    зарегистрироваться
                                </span>
                                <div class="luchik-button__icon">
                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.0812 5.77017C13.3139 5.5375 13.3139 5.16026 13.0812 4.92758L9.28955 1.13593C9.05688 0.903255 8.67964 0.903255 8.44696 1.13593C8.21429 1.3686 8.21429 1.74584 8.44696 1.97852L11.8173 5.34888L8.44696 8.71923C8.21429 8.95191 8.21429 9.32915 8.44696 9.56182C8.67964 9.7945 9.05688 9.7945 9.28955 9.56182L13.0812 5.77017ZM0.743896 5.94468H12.6599V4.75308H0.743896V5.94468Z"
                                            fill="white"></path>
                                    </svg>
                                </div>
                            </a>
                        </div>
                        <button class="desc-luchik-intro__go " data-aos="fade-up" data-aos-delay="800">
                            <svg width="12" height="17" viewBox="0 0 12 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.82502 3.84247V7.91611M5.82502 1V1C3.16023 1 1 3.16024 1 5.82502V11.332C1 13.9968 3.16023 16.1571 5.82502 16.1571V16.1571C8.4898 16.1571 10.65 13.9968 10.65 11.332V5.82502C10.65 3.16023 8.4898 1 5.82502 1V1Z"
                                    stroke="white" stroke-width="1.5"></path>
                            </svg>
                            Листайте дальше
                        </button>
                    </div>
                    <div class="luchik-intro__subjects subjects-luchik-intro">
                        <div class="subjects-luchik-intro__image">
                            <picture>
                                <img src="{{ asset('/olimpiada/static/img/olimpiada/intro/01.png') }}"
                                    srcset="{{ asset('/olimpiada/static/img/olimpiada/intro/01@2x.png') }} 2x"
                                    alt="image" data-aos="fade" data-aos-delay="2400" class="">
                            </picture>
                        </div>
                        <div class="subjects-luchik-intro__label " data-aos="fade-up" data-aos-delay="800">
                            Можешь участвовать в одной дисциплине, а можешь в нескольких или даже во всех: </div>

                        <div class="subjects-luchik-intro__slider">
                            <div class="subjects-luchik-intro__wrapper">
                                <div class="subjects-luchik-intro__slide " data-aos="fade-up" data-aos-delay="1000">
                                    <div class="subjects-luchik-intro__wrap subjects-luchik-intro__wrap_yellow">
                                        <div class="subjects-luchik-intro__title">
                                            Физмат
                                        </div>
                                        <ul class="subjects-luchik-intro__list">
                                            <li>математика</li>
                                            <li>физика</li>
                                            <li>информатика</li>
                                        </ul>
                                        <div class="subjects-luchik-intro__bg">
                                            <svg width="141" height="105" viewBox="0 0 141 105" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.4">
                                                    <path
                                                        d="M5 67.5222C7.40466 67.5222 25.6805 56.4605 25.6805 56.4605L44.9181 109.364L89.6457 5H143.511"
                                                        stroke="#FE9023" stroke-width="9.96235"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M130.041 56.9411C130.041 56.9411 121.865 34.8179 99.7419 45.3987C89.642 50.208 81.4659 71.8503 86.2753 81.4694C88.6802 86.2787 95.4132 91.0881 102.627 90.6069C108.399 90.1262 114.651 85.7976 118.017 81.4694C125.713 71.3696 134.85 41.0701 134.85 41.0701"
                                                        stroke="#FE9023" stroke-width="9.96235"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M125.232 69.4443C125.232 69.4443 122.346 88.6821 127.636 91.5677C131.965 93.9722 144.469 84.3535 144.469 84.3535"
                                                        stroke="#FE9023" stroke-width="9.96235"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="subjects-luchik-intro__slide " data-aos="fade-up" data-aos-delay="1000">
                                    <div class="subjects-luchik-intro__wrap subjects-luchik-intro__wrap_blue">
                                        <div class="subjects-luchik-intro__title">
                                            Филология
                                        </div>
                                        <ul class="subjects-luchik-intro__list">
                                            <li>русский язык</li>
                                            <li>литература</li>
                                        </ul>
                                        <div class="subjects-luchik-intro__bg">
                                            <svg width="131" height="104" viewBox="0 0 131 104" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.3">
                                                    <path
                                                        d="M77.3626 22.052C77.3626 12.0232 65.3275 4 50.4264 4C35.5256 4 23.4902 12.0232 23.4902 22.052V79.7183C23.4902 79.7183 43.5492 55.649 77.3626 77.2112V22.052Z"
                                                        stroke="#00BCE6" stroke-width="7.80645"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M21.1934 25.0623H4V91.2528H64.1767" stroke="#00BCE6"
                                                        stroke-width="7.80645" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M77.3626 22.052C77.3626 12.0232 89.3983 4 104.299 4C119.2 4 131.236 12.0232 131.236 22.052V79.7183C131.236 79.7183 111.176 55.649 77.3626 77.2112V22.052Z"
                                                        stroke="#00BCE6" stroke-width="7.80645"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M134.098 25.0623H151.291V91.2528H91.1146" stroke="#00BCE6"
                                                        stroke-width="7.80645" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M91.1138 91.2483C91.1138 95.7612 85.3827 99.2714 77.9319 99.2714C70.4816 99.2714 64.7505 95.7612 64.7505 91.2483"
                                                        stroke="#00BCE6" stroke-width="7.80645"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="subjects-luchik-intro__slide " data-aos="fade-up" data-aos-delay="1000">
                                    <div class="subjects-luchik-intro__wrap subjects-luchik-intro__wrap_green">
                                        <div class="subjects-luchik-intro__title">
                                            Естественные науки
                                        </div>
                                        <ul class="subjects-luchik-intro__list">
                                            <li>биология</li>
                                            <li>география</li>
                                            <li>химия</li>
                                        </ul>
                                        <div class="subjects-luchik-intro__bg">
                                            <svg width="124" height="118" viewBox="0 0 124 118" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.3">
                                                    <path d="M22.9469 5H68.4996" stroke="#10B77B"
                                                        stroke-width="8.29848" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M34.5985 5V51.6122L5.99547 108.818C2.81739 116.234 7.58453 124.179 15.5298 124.179H79.6217C87.5669 124.179 92.8638 115.704 89.1561 108.818L58.4343 49.4936V5"
                                                        stroke="#10B77B" stroke-width="8.29848"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M25.5985 70.1536H68.503" stroke="#10B77B"
                                                        stroke-width="8.29848" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M58.9661 86.0417C62.6738 94.5164 63.2036 96.6354 66.9113 105.11"
                                                        stroke="#10B77B" stroke-width="8.29848"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path
                                                        d="M78.0347 74.92L84.3908 64.8557V36.2529H103.459V64.8557L126.236 108.82C129.943 115.706 124.647 124.181 116.701 124.181H87.5687"
                                                        stroke="#10B77B" stroke-width="8.29848"
                                                        stroke-miterlimit="10" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    <path d="M82.2721 86.0417H115.113" stroke="#10B77B"
                                                        stroke-width="8.29848" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M73.2681 36.2529H115.113" stroke="#10B77B"
                                                        stroke-width="8.29848" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="subjects-luchik-intro__slide " data-aos="fade-up" data-aos-delay="1000">
                                    <div class="subjects-luchik-intro__wrap subjects-luchik-intro__wrap_purple">
                                        <div class="subjects-luchik-intro__title">
                                            Социальные науки
                                        </div>
                                        <ul class="subjects-luchik-intro__list">
                                            <li>история</li>
                                            <li>обществознание</li>
                                        </ul>
                                        <div class="subjects-luchik-intro__bg">
                                            <svg width="143" height="136" viewBox="0 0 143 136" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.3">
                                                    <path d="M22 50.0878L106.766 93L188 50.0878L105 6L22 50.0878Z"
                                                        stroke="#7F59ED" stroke-width="10.321" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path
                                                        d="M62 70V114.513C62 136.082 76.4223 143 94.5669 143H116.433C134.578 143 149 136.082 149 114.513V70"
                                                        stroke="#7F59ED" stroke-width="10.321" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M100 50H21.9622V93.1666L6 120H36.742L21.9622 93.1666"
                                                        stroke="#7F59ED" stroke-width="10.321" stroke-miterlimit="10"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="subjects-luchik-intro__footer " data-aos="fade-up" data-aos-delay="1800">
                            Набор предметов по каждому направлению зависит от класса, для начальных классов он
                            отличается
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="luchik-terms">
            <div class="luchik-container">
                <h2 class="luchik-terms__title luchik-title " data-aos="fade-up">
                    Условия участия </h2>
                <div class="luchik-terms__body">
                    <div class="luchik-terms__image">
                        <picture>
                            <img src="{{ asset('/olimpiada/static/img/olimpiada/terms/01.png') }}" alt="image"
                                data-aos="fade" data-aos-delay="500" class="">
                        </picture>
                    </div>
                    <div class="luchik-terms__left left-luchik-terms " data-aos="fade-up">
                        <div class="left-luchik-terms__item">
                            <div class="left-luchik-terms__text">
                                Олимпиада проводится для учеников <span> 1-11 классов.</span> </div>
                        </div>
                        <div class="left-luchik-terms__item">
                            <div class="left-luchik-terms__text left-luchik-terms__text_last">
                                Для участия необходимо зарегистрироваться. Записаться можно на любой будущий тур.
                                Регистрация завершается <strong>2 ноября 2023.</strong> </div>
                        </div>
                    </div>
                    <div class="luchik-terms__right right-luchik-terms " data-aos="fade-up">
                        <div class="right-luchik-terms__content">
                            <div class="right-luchik-terms__title">
                                Регистрационный взнос </div>
                            <div class="right-luchik-terms__text">
                                От уплаты регистрационного взноса освобождаются ученики Домашней школы
                                «ИнтернетУрок».<br><br>Участие в финальном туре бесплатно для всех. </div>
                        </div>
                        <ul class="right-luchik-terms__list">
                            <li class="right-luchik-terms__item">1 направление - <span> 100 ₽; </span></li>
                            <li class="right-luchik-terms__item">2 направления - <span> 180 ₽; </span></li>
                            <li class="right-luchik-terms__item">3 направления - <span> 250 ₽; </span></li>
                            <li class="right-luchik-terms__item">все направления - <span> 300 ₽; </span></li>
                        </ul>
                    </div>
                </div>
                <div class="luchik-terms__footer " data-aos="fade-up">
                    <a href="http://interneturok.ru/static/files/olimpiada_luchik_2023_polozhenie.pdf"
                        class="luchik-terms__button luchik-terms__button_blue" target="_blank">
                        Положение об Олимпиаде «Лучик»
                    </a>
                    <a href="https://forms.gle/RzijsCLBHhEHVNTm7"
                        class="luchik-terms__button luchik-terms__button_orange luchik-button">
                        <span class="luchik-button__text">
                            зарегистрироваться
                        </span>
                        <span class="luchik-button__text">
                            зарегистрироваться на участие в Олимпиаде
                        </span>
                        <div class="luchik-button__icon">
                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13.0812 5.77017C13.3139 5.5375 13.3139 5.16026 13.0812 4.92758L9.28955 1.13593C9.05688 0.903255 8.67964 0.903255 8.44696 1.13593C8.21429 1.3686 8.21429 1.74584 8.44696 1.97852L11.8173 5.34888L8.44696 8.71923C8.21429 8.95191 8.21429 9.32915 8.44696 9.56182C8.67964 9.7945 9.05688 9.7945 9.28955 9.56182L13.0812 5.77017ZM0.743896 5.94468H12.6599V4.75308H0.743896V5.94468Z"
                                    fill="white"></path>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="luchik-prizes">
            <div class="luchik-container">
                <h2 class="luchik-prizes__title luchik-title " data-aos="fade-up">
                    Призы
                </h2>
                <div class="luchik-prizes__body " data-aos="fade-up">
                    <div class="luchik-prizes__item">
                        <div class="luchik-prizes__wrap">
                            <div class="luchik-prizes__text">
                                Все участники получают именные Сертификаты </div>
                            <div class="luchik-prizes__image">
                                <picture>
                                    <img src="{{ asset('/olimpiada/static/img/olimpiada/prizes/01.png') }}"
                                        srcset="{{ asset('/olimpiada/static/img/olimpiada/prizes/01@2x.png') }} 2x"
                                        alt="image" class="">
                                </picture>
                            </div>
                        </div>
                    </div>
                    <div class="luchik-prizes__item">
                        <div class="luchik-prizes__wrap luchik-prizes__wrap_purple">
                            <div class="luchik-prizes__text">
                                Победители награждаются грамотами и призами
                            </div>
                            <div class="luchik-prizes__image luchik-prizes__image_purple">
                                <picture>
                                    <img src="{{ asset('/olimpiada/static/img/olimpiada/prizes/02.png') }}"
                                        srcset="{{ asset('/olimpiada/static/img/olimpiada/prizes/02@2x.png') }} 2x"
                                        alt="image" class="">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="luchik-way">
            <div class="luchik-container">
                <div class="luchik-way__head head-luchik-way">
                    <h2 class="head-luchik-way__title luchik-title " data-aos="fade-up">
                        Как проходит Олимпиада? </h2>
                    <div class="head-luchik-way__desc">
                        <div class="head-luchik-way__label " data-aos="fade-up" data-aos-delfy="200">
                            Олимпиада проводится в несколько этапов
                        </div>
                        <p class="head-luchik-way__text " data-aos="fade-up" data-aos-delfy="400">
                            В финальный тур проходят победители отборочного тура по каждому из направлений, а также
                            лидеры по многоборью - на основании сумм баллов по нескольким направлениям. </p>
                    </div>
                </div>
                <div class="luchik-way__body">
                    <div class="luchik-way__item item-luchik-way " data-aos="fade-up" data-aos-offset="300">
                        <div class="item-luchik-way__head head-item-luchik-way head-item-luchik-way_">
                            <div class="head-item-luchik-way__content">
                                <div class="head-item-luchik-way__tour">
                                    <div class="head-item-luchik-way__num head-item-luchik-way__num_">I тур</div>
                                    <div class="head-item-luchik-way__name">Отборочный</div>
                                </div>
                                <div class="head-item-luchik-way__desc head-item-luchik-way__desc_">
                                    <p>Отборочный тур проводится онлайн в тестовом формате.</p>
                                </div>
                            </div>
                            <div class="head-item-luchik-way__date">
                                с 6 по 9 ноября 2023 г.
                            </div>
                        </div>
                        <div class="item-luchik-way__body item-luchik-way__body_">
                            <div class="item-luchik-way__image item-luchik-way__image_">
                                <picture>
                                    <img src="{{ asset('/olimpiada/static/img/olimpiada/way/01.png') }}"
                                        alt="image">
                                </picture>
                            </div>


                            <div data-spollers="" data-one-spoller=""
                                class="item-luchik-way__spollers spollers-item-luchik-way _spoller-init">
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            1 класс
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/icon-mnogobor.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Многоборье – 8 ноября<br />(русский язык + литературное чтение +
                                                    математика + окружающий мир) </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Тест: </b> <span> 10-15 заданий (единый тест по всем предметам)
                                                </span></p>

                                            <p><b>Время выполнения: </b> <span> 30 минут </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            2-4 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/reading.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Чтение – 6 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика – 7 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык – 8 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/surrounding_world.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Окружающий мир – 9 ноября </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Тест: </b> <span> </span>10-15 заданий<span> </span></p>

                                            <p><b>Время выполнения: </b> <span> </span>45 минут (по каждому из
                                                предметов)<span> </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            5-6 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/common_history.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    История и обществознание – 6 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика – 7 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык и литература – 8 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/nature.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Биология и география – 9 ноября </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Тест: </b> <span> </span>10-20 заданий<span> </span></p>

                                            <p><b>Время выполнения: </b> <span> </span><b>&nbsp;</b>1 час (по каждому из
                                                направлений)<span> </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            7-9 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/common_history.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    История и обществознание – 6 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика, физика и информатика – 7 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык и литература – 8 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/nature.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Биология, химия и география – 9 ноября </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Тест: </b> <span> </span>10-20 заданий<span> </span></p>

                                            <p><b>Время выполнения: </b> <span> </span><b>&nbsp;</b>1 час (по каждому из
                                                направлений)<span> </span></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            10-11 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/common_history.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    История и обществознание – 6 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика, физика и информатика – 7 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык и литература – 8 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/nature.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Биология, химия и география – 9 ноября </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Тест: </b> <span> </span>10-20 заданий<span> </span></p>

                                            <p><b>Время выполнения: </b> <span> </span><b>&nbsp;</b>1 час (по каждому из
                                                направлений)<span> </span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="luchik-way__item item-luchik-way " data-aos="fade-up" data-aos-offset="300">
                        <div class="item-luchik-way__head head-item-luchik-way head-item-luchik-way_blue">
                            <div class="head-item-luchik-way__content">
                                <div class="head-item-luchik-way__tour">
                                    <div class="head-item-luchik-way__num head-item-luchik-way__num_blue">II тур</div>
                                    <div class="head-item-luchik-way__name">Финал</div>
                                </div>
                                <div class="head-item-luchik-way__desc head-item-luchik-way__desc_blue">
                                    <p>Для справедливого и честного выявления победителей основной тур проводится онлайн
                                        с помощью системы прокторинга (контроль за ходом выполнения заданий
                                        осуществляется с помощью вебкамеры, микрофона и наблюдения за экраном
                                        посредством особого программного обеспечения)</p>

                                    <p>&nbsp;</p>
                                </div>
                            </div>
                            <div class="head-item-luchik-way__date">
                                с 27 по 30 ноября 2023 г.
                            </div>
                        </div>
                        <div class="item-luchik-way__body item-luchik-way__body_blue">
                            <div class="item-luchik-way__image item-luchik-way__image_blue">
                                <picture>
                                    <img src="{{ asset('/olimpiada/static/img/olimpiada/way/04.png') }}"
                                        alt="image">
                                </picture>
                            </div>


                            <div data-spollers="" data-one-spoller=""
                                class="item-luchik-way__spollers spollers-item-luchik-way _spoller-init">
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            1 класс
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/icon-mnogobor.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Многоборье – 29 ноября<br />(русский язык + литературное чтение +
                                                    математика + окружающий мир) </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Письменное задание</b><span> </span></p>

                                            <p><b>Время выполнения:&nbsp;</b>1 час</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            2-4 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/reading.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Чтение – 27 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика – 28 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык – 29 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/surrounding_world.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Окружающий мир – 30 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/icon-mnogobor.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Многоборье – 1 декабря </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Письменное задание</b></p>

                                            <p><b>Время выполнения:&nbsp;</b>1 час (по каждому из предметов)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            5-6 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/common_history.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    История и обществознание – 27 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика – 28 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык и литература – 29 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/nature.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Биология и география – 30 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/icon-mnogobor.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Многоборье – 1 декабря </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Письменное задание</b></p>

                                            <p><b>Время выполнения:&nbsp;</b>1,5 часа (по каждому из направлений)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            7-9 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/common_history.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    История и обществознание – 27 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика, физика и информатика – 28 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык и литература – 29 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/nature.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Биология, химия, география – 30 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/icon-mnogobor.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Многоборье – 1 декабря </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Письменное задание</b></p>

                                            <p><b>Время выполнения:&nbsp;</b>2 часа (по каждому из направлений)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="spollers-item-luchik-way__item">
                                    <button type="button" data-spoller=""
                                        class="spollers-item-luchik-way__title title-spollers-item-luchik-way">
                                        <div class="title-spollers-item-luchik-way__name">
                                            10-11 классы
                                        </div>
                                        <div class="title-spollers-item-luchik-way__icon">
                                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.95999 8.52734L9.00735 1.47999L16.04 8.52734"
                                                    stroke="#272727" stroke-width="2.5082" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <div class="spollers-item-luchik-way__body" style="" hidden="">
                                        <div class="spollers-item-luchik-way__label">Направления и расписание:</div>
                                        <ul class="spollers-item-luchik-way__list">
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/common_history.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    История и обществознание – 27 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/math.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Математика, физика, информатика – 28 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/rus-lang.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Русский язык и литература – 29 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/nature.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Биология, химия, география – 30 ноября </div>
                                            </li>
                                            <li class="spollers-item-luchik-way__point">
                                                <div class="spollers-item-luchik-way__icon">
                                                    <img src="{{ asset('/olimpiada/static/img/icon-mnogobor.svg') }}"
                                                        alt="icon" />
                                                </div>
                                                <div class="spollers-item-luchik-way__text">
                                                    Многоборье – 1 декабря </div>
                                            </li>
                                        </ul>
                                        <div class="spollers-item-luchik-way__info">
                                            <p><b>Письменное задание</b></p>

                                            <p><b>Время выполнения:&nbsp;</b>2 часа (по каждому из направлений)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="luchik-reviews">
            <div class="luchik-container">
                <h2 class="luchik-reviews__title luchik-title " data-aos="fade-up">
                    Отзывы об Олимпиаде<br /> </h2>
                <div class="luchik-reviews__body">
                    <div class="luchik-reviews__item " data-aos="fade-up">
                        <div class="luchik-reviews__wrap">
                            <div class="luchik-reviews__name">
                                Полина
                            </div>
                            <div class="luchik-reviews__desc">

                            </div>
                            <div class="luchik-reviews__text">
                                <p>Мне очень понравилось участие в Олимпиаде и я очень надеюсь, что в следующем году,
                                    перейдя в 9 класс, смогу принять участие снова. Я бесконечно рада своей победе и
                                    очень благодарна школе за эту возможность. Решение участвовать я приняла сразу же,
                                    как только родители сказали об Олимпиаде, хотя это был мой первый опыт прохождения
                                    олимпиады в данном формате. Мне были интересны задания, правда, некоторые из них
                                    были не совсем понятны (например, был вопрос о названиях в московском метро и мне —
                                    не москвичке — не удалось на него ответить), но это стало поводом получить новые
                                    знания и мне абсолютно не было скучно. Предварительное тестирование возможностей
                                    подключения мы проходили совместно с родителями, и это было немного непросто.
                                    Проходить Олимпиаду было действительно волнительно, но это бесценный и классный опыт
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="luchik-reviews__item " data-aos="fade-up">
                        <div class="luchik-reviews__wrap">
                            <div class="luchik-reviews__name">
                                Елена
                            </div>
                            <div class="luchik-reviews__desc">

                            </div>
                            <div class="luchik-reviews__text">
                                <p>Спасибо большое за организацию онлайн-олимпиады "Лучик" и призы! Сегодня получили
                                    посылку с подарками за первое место и за второе. Дочки счастливы. Дети два года
                                    учатся на семейном обучении в вашей онлайн-школе. В этом году впервые решили
                                    попробовать силы в олимпиаде по предметам. Из троих во второй тур прошли только
                                    двое. Старшая (6 класс) заняла 2 место по русскому языку и 3 в многоборье, а младшая
                                    (3 класс) - первое место по математике. Для младшей дочки – это её первая серьезная
                                    победа. Очень важный момент, чтобы поверить в себя и в свои силы. Спасибо!</p>

                            </div>
                        </div>
                    </div>
                    <div class="luchik-reviews__item " data-aos="fade-up">
                        <div class="luchik-reviews__wrap">
                            <div class="luchik-reviews__name">
                                Наталья
                            </div>
                            <div class="luchik-reviews__desc">

                            </div>
                            <div class="luchik-reviews__text">
                                <p>Задания понравились, были интересными, средними по сложности. Небольшое волнение было
                                    из-за введения системы прокторинга в первый раз. В следующем году снова буду
                                    принимать участие. Выражаем огромную благодарность ИнтернетУроку за прекрасную
                                    возможность принять участие в олимпиаде и одновременно познакомиться с системой
                                    прокторинга! Это отличная мотивация для учеников и к учебе, и к работе над заданиями
                                    олимпиад</p>

                            </div>
                        </div>
                    </div>
                    <div class="luchik-reviews__item " data-aos="fade-up">
                        <div class="luchik-reviews__wrap">
                            <div class="luchik-reviews__name">
                                Руслан
                            </div>
                            <div class="luchik-reviews__desc">

                            </div>
                            <div class="luchik-reviews__text">
                                <p>В целом проведение олимпиады мне понравилось. Хорошо, что была система защиты от
                                    списывания. Задания больше понравились в олимпиаде по математике. Хотя лично мне не
                                    хватило времени, чтобы обдумать и записать подробное решение всех задач.</p>

                            </div>
                        </div>
                    </div>
                    <div class="luchik-reviews__image">
                        <picture>
                            <img src="{{ asset('/olimpiada/static/img/olimpiada/reviews/01.png') }}"
                                srcset="{{ asset('/olimpiada/static/img/olimpiada/reviews/01@2x.png') }} 2x"
                                alt="image" data-aos="fade" data-aos-delay="700" class="">
                        </picture>
                    </div>
                </div>
            </div>
        </section>
        <section class="luchik-questions">
            <div class="luchik-container">
                <h2 class="luchik-questions__title luchik-big-title " data-aos="fade-up">
                    Есть вопросы?
                </h2>
                <div class="luchik-questions__body">
                    <div class="luchik-questions__item " data-aos="fade-up">
                        <div class="luchik-questions__wrap">
                            <div class="luchik-questions__icon">
                                <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M36.888 23.62H38.7723V25.5043V28.5075L44.7411 24.0006L45.2451 23.62H45.8766H49.4706H67.6159C67.8919 23.62 68.1157 23.3963 68.1157 23.1202V5.38413C68.1157 5.10807 67.8919 4.88429 67.6159 4.88429H32.9045C32.6284 4.88429 32.4046 5.10807 32.4046 5.38413V23.1202C32.4046 23.3963 32.6284 23.62 32.9045 23.62H36.888Z"
                                        fill="#79E7FF" stroke="white" stroke-width="3.76858"></path>
                                    <circle cx="42.622" cy="13.8266" r="1.91031" fill="white"></circle>
                                    <circle cx="50.2635" cy="13.8266" r="1.91031" fill="white"></circle>
                                    <circle cx="57.9023" cy="13.8266" r="1.91031" fill="white"></circle>
                                    <path
                                        d="M46.2562 44.7481C45.0569 43.4771 43.6102 42.7976 42.0771 42.7976C40.5563 42.7976 39.0973 43.4645 37.8485 44.7355L33.9414 48.6995C33.6199 48.5233 33.2984 48.3597 32.9893 48.1961C32.5442 47.9696 32.1238 47.7557 31.7653 47.5292C28.1054 45.1634 24.7794 42.0803 21.5895 38.0911C20.0439 36.1028 19.0053 34.4291 18.2511 32.7302C19.265 31.7864 20.2047 30.8049 21.1196 29.8611C21.4658 29.5087 21.812 29.1438 22.1582 28.7914C24.7547 26.1487 24.7547 22.7259 22.1582 20.0832L18.7828 16.6477C18.3995 16.2576 18.0038 15.8549 17.6329 15.4522C16.891 14.672 16.1121 13.8666 15.3084 13.1116C14.1091 11.9035 12.6748 11.2617 11.1664 11.2617C9.65792 11.2617 8.19894 11.9035 6.96251 13.1116C6.95014 13.1242 6.95015 13.1242 6.93778 13.1368L2.73393 17.4531C1.1513 19.0639 0.248706 21.027 0.0508772 23.3047C-0.245866 26.9793 0.817462 30.4022 1.6335 32.6422C3.63652 38.1414 6.62867 43.238 11.0922 48.6995C16.5077 55.281 23.0237 60.4783 30.467 64.1402C33.3108 65.5119 37.1066 67.1353 41.3476 67.4121C41.6072 67.4247 41.8792 67.4373 42.1265 67.4373C44.9827 67.4373 47.3813 66.3928 49.2607 64.3164C49.2731 64.2912 49.2978 64.2787 49.3102 64.2535C49.9531 63.4607 50.695 62.7434 51.4739 61.9758C52.0056 61.4598 52.5496 60.9187 53.0813 60.3524C54.3053 59.0562 54.9483 57.5462 54.9483 55.9983C54.9483 54.4379 54.293 52.9404 53.0442 51.6819L46.2562 44.7481ZM50.6826 57.9992C50.6702 57.9992 50.6702 58.0118 50.6826 57.9992C50.2004 58.5277 49.7058 59.0059 49.1742 59.5344C48.3705 60.3147 47.5544 61.1326 46.7879 62.0513C45.5391 63.4104 44.0677 64.0521 42.1389 64.0521C41.9534 64.0521 41.7556 64.0521 41.5701 64.0396C37.8979 63.8005 34.4854 62.3407 31.926 61.0949C24.9278 57.6468 18.7828 52.7516 13.6763 46.5476C9.46009 41.3755 6.64104 36.5936 4.77403 31.4592C3.62415 28.3258 3.20377 25.8845 3.38923 23.5816C3.51288 22.1092 4.06927 20.8886 5.0955 19.8441L9.31172 15.5529C9.91757 14.974 10.5605 14.6594 11.1911 14.6594C11.97 14.6594 12.6006 15.1376 12.9963 15.5403C13.0086 15.5529 13.021 15.5655 13.0334 15.5781C13.7876 16.2954 14.5047 17.0378 15.2589 17.8306C15.6422 18.2333 16.0379 18.636 16.4335 19.0513L19.809 22.4868C21.1196 23.8207 21.1196 25.0539 19.809 26.3878C19.4504 26.7528 19.1042 27.1177 18.7457 27.4701C17.7071 28.5523 16.7179 29.559 15.6422 30.5406C15.6175 30.5658 15.5928 30.5784 15.5804 30.6035C14.5171 31.6858 14.7149 32.7428 14.9375 33.4601C14.9498 33.4979 14.9622 33.5356 14.9746 33.5734C15.8524 35.7379 17.0889 37.7765 18.9682 40.2052L18.9806 40.2178C22.3931 44.4964 25.9911 47.8312 29.9601 50.3858C30.467 50.713 30.9863 50.9772 31.4809 51.2289C31.926 51.4554 32.3464 51.6694 32.7049 51.8959C32.7544 51.921 32.8039 51.9588 32.8533 51.984C33.2737 52.1979 33.6694 52.2986 34.0774 52.2986C35.1036 52.2986 35.7466 51.6442 35.9567 51.4303L40.1853 47.1265C40.6057 46.6986 41.2734 46.1827 42.0523 46.1827C42.8189 46.1827 43.4495 46.6735 43.8328 47.1013C43.8452 47.1139 43.8452 47.1139 43.8575 47.1265L50.6702 54.0603C51.9438 55.3439 51.9438 56.6653 50.6826 57.9992Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                            <div class="luchik-questions__content">
                                <a class="luchik-questions__link" href="tel:88007754121">8 (800) 775 4121 </a>
                                <div class="luchik-questions__note">бесплатно по России</div>
                            </div>
                        </div>
                    </div>
                    <div class="luchik-questions__item " data-aos="fade-up" data-aos-delay="200">
                        <div class="luchik-questions__wrap">
                            <div class="luchik-questions__icon">
                                <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 28.3773L32.7653 3.71362C33.2476 3.30014 33.9563 3.28982 34.4503 3.6891L65 28.3773M4 28.3773L32.9106 46.7914C33.3316 47.0595 33.868 47.0666 34.296 46.8097L65 28.3773M4 28.3773V64.0386C4 64.7659 4.58963 65.3555 5.31698 65.3555H63.683C64.4104 65.3555 65 64.7659 65 64.0386V28.3773"
                                        stroke="white" stroke-width="3.95095"></path>
                                    <path
                                        d="M10.7789 12.4488V32.119C10.7789 32.5576 10.9972 32.9675 11.3613 33.2121L32.266 47.261C32.693 47.5479 33.248 47.56 33.687 47.2918L54.8817 34.3466C55.2733 34.1074 55.5122 33.6816 55.5122 33.2227V12.4488C55.5122 11.7215 54.9226 11.1318 54.1952 11.1318H12.0959C11.3685 11.1318 10.7789 11.7215 10.7789 12.4488Z"
                                        fill="#79E7FF"></path>
                                    <path
                                        d="M22.9789 21.2985H43.99M22.9789 29.4318H43.99M33.687 47.2918L54.8817 34.3466C55.2733 34.1074 55.5122 33.6816 55.5122 33.2227V12.4488C55.5122 11.7215 54.9226 11.1318 54.1952 11.1318H12.0959C11.3685 11.1318 10.7789 11.7215 10.7789 12.4488V32.119C10.7789 32.5576 10.9972 32.9675 11.3613 33.2121L32.266 47.261C32.693 47.5479 33.248 47.56 33.687 47.2918Z"
                                        stroke="white" stroke-width="3.95095" stroke-linecap="round"></path>
                                </svg>
                            </div>
                            <div class="luchik-questions__content">
                                <a class="luchik-questions__link"
                                    href="mailto:school@interneturok.ru">school@interneturok.ru </a>
                                <div class="luchik-questions__note">ответим за 1 раб. день</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="luchik-questions__footer">
                    <div data-aos="fade-up" data-aos-delay="200" class="">
                        <a href="https://forms.gle/RzijsCLBHhEHVNTm7" class="luchik-questions__button luchik-button"
                            target="_blank">
                            <span class="luchik-button__text">
                                зарегистрироваться
                            </span>
                            <div class="luchik-button__icon">
                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.0812 5.77017C13.3139 5.5375 13.3139 5.16026 13.0812 4.92758L9.28955 1.13593C9.05688 0.903255 8.67964 0.903255 8.44696 1.13593C8.21429 1.3686 8.21429 1.74584 8.44696 1.97852L11.8173 5.34888L8.44696 8.71923C8.21429 8.95191 8.21429 9.32915 8.44696 9.56182C8.67964 9.7945 9.05688 9.7945 9.28955 9.56182L13.0812 5.77017ZM0.743896 5.94468H12.6599V4.75308H0.743896V5.94468Z"
                                        fill="white"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <div class="luchik-questions__image">
                        <picture>
                            <img src="{{ asset('/olimpiada/static/img/olimpiada/questions/01.png') }}"
                                srcset="{{ asset('/olimpiada/static/img/olimpiada/questions/01@2x.png') }} 2x"
                                alt="image" data-aos="fade" data-aos-delay="700" class="">
                        </picture>
                    </div>
                </div>
            </div>
        </section>
        <section class="luchik-partners">
            <div class="luchik-container">
                <h2 class="luchik-partners__title luchik-big-title " data-aos="fade-up">
                    Партнёры
                </h2>
                <div class="luchik-partners__body">
                    <a href="https://vtf.ru/goods/original/" target="_blank" class="luchik-partners__item "
                        data-aos="fade-up">
                        <div class="luchik-partners__wrap">
                            <div class="luchik-partners__image">
                                <img alt="Яуза" title=""
                                    src="{{ asset('/olimpiada/static/img/olimpiada/vpf_logo.png') }}">
                            </div>
                            <div class="luchik-partners__label">Партнёр:<br>ВТФ</div>
                        </div>
                    </a>
                    <a href="https://www.litres.ru/" target="_blank" class="luchik-partners__item "
                        data-aos="fade-up">
                        <div class="luchik-partners__wrap">
                            <div class="luchik-partners__image">
                                <img alt="Яуза" title=""
                                    src="{{ asset('/olimpiada/static/img/olimpiada/litres_logo_standart_main_ru_rgb_01.png') }}">
                            </div>
                            <div class="luchik-partners__label">Партнёр:<br />Литрес</div>
                        </div>
                    </a>

                </div>
            </div>
        </section>
        <div class="gradients">
            <div class="gradients__item gradients__item_fir"></div>
            <div class="gradients__item gradients__item_sec"></div>
            <div class="gradients__item gradients__item_thir"></div>
            <div class="gradients__item gradients__item_fourth"></div>
            <div class="gradients__item gradients__item_fif"></div>
        </div>
    </div>

    <footer>
        <div class="footer">
            <div class="wrap">
                <div class="footer-top">
                    <div class="footer-top-right">
                        <div class="contacts-list">
                            <a href="tel:8 (800) 775 4121" class="contacts-item">
                                <div class="contacts-item-icon">
                                    <img src="{{ asset('/olimpiada/static/img/footer-ico5.svg') }}" alt="phone">
                                </div>
                                <div class="contacts-item-texts">
                                    <div class="contacts-item-title">8 (800) 775 4121</div>
                                    <div class="contacts-item-subtitle">бесплатно по России</div>
                                </div>
                            </a>

                            <a href="tel:+7 (495) 255 3074" class="contacts-item">
                                <div class="contacts-item-icon">
                                    <img src="{{ asset('/olimpiada/static/img/footer-ico1.svg') }}" alt="phone">
                                </div>
                                <div class="contacts-item-texts">
                                    <div class="contacts-item-title">+7 (495) 255 3074</div>
                                    <div class="contacts-item-subtitle">дополнительный номер</div>
                                </div>
                            </a>
                            <a href="tel:+7 (495) 255 3074" class="contacts-item">
                                <div class="contacts-item-icon">
                                    <img src="{{ asset('/olimpiada/static/img/footer-ico3.svg') }}" alt="phone">
                                </div>
                                <div class="contacts-item-texts">
                                    <div class="contacts-item-title">+7 (495) 255 3074</div>
                                    <div class="contacts-item-subtitle">дополнительный номер</div>
                                </div>
                            </a>

                            <a href="mailto:school@interneturok.ru" class="contacts-item">
                                <div class="contacts-item-icon">
                                    <img src="{{ asset('/olimpiada/static/img/footer-ico2.svg') }}" alt="">
                                </div>
                                <div class="contacts-item-texts">
                                    <div class="contacts-item-title">school@interneturok.ru</div>
                                    <div class="contacts-item-subtitle">ответим за 1 раб. день</div>
                                </div>
                            </a>


                            {{-- <div class="contacts-item pp_" data-pp="director-request">
                                <div class="contacts-item-icon">
                                    <img src="{{ asset('/olimpiada/static/img/footer-ico3.svg') }}" alt="">
                                </div>
                                <div class="contacts-item-texts">
                                    <div class="contacts-item-title">Приемная директора</div>
                                    <div class="contacts-item-subtitle">обращение к руководителю</div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                {{-- <div class="footer-mid">
                    <div class="footer-nav">
                        <div class="footer-nav-column">
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">Школа «ИнтернетУрок»</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/shkola/">О школе </a>
                                    <a href="http://interneturok.ru/shkola/uchebnyi_process/">Учебный процесс </a>
                                    <a href="http://interneturok.ru/shkola/stoimost/">Стоимость </a>
                                    <a href="http://interneturok.ru/shkola/zachislenie/">Зачисление </a>
                                    <a href="http://interneturok.ru/shkola/istoriya_i_dostizheniya/">История развития
                                    </a>
                                </div>
                            </div>
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">Подготовка к школе</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/podgotovka_k_shkole/">Занятия для
                                        дошкольников </a>
                                </div>
                            </div>
                        </div>

                        <div class="footer-nav-column">
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">Школьная программа</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/shkola_layt/">Школа лайт </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/shkola_ekspress/">Школа экспресс
                                    </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/biblioteka_videourokov/">Библиотека
                                        видеоуроков </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/podgotovka_k_oge_ege/">Подготовка к
                                        ОГЭ/ЕГЭ </a>
                                </div>
                            </div>
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">Помощь школьнику</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/nastavniki/">Наставник </a>
                                </div>
                            </div>
                        </div>


                        <div class="footer-nav-column">
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">Дополнительно</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/kursy_i_uslugi/uroki_dlya_roditeley/">Уроки для
                                        родителей </a>
                                    <a href="http://interneturok.ru/kursy_i_uslugi/psihologiya/">Психология для
                                        старшеклассников </a>
                                    <a href="http://interneturok.ru/zozh/">Здоровое питание от А до Я </a>
                                    <a href="http://interneturok.ru/olimpiada/">Олимпиада «Лучик» </a>
                                    <a href="https://magazin.interneturok.ru/" target="_blank">Магазин сувениров
                                        <img src="{{ asset('/olimpiada/static/img/arrot-top-right-white.svg') }}"
                                            alt="arrow"></a>
                                </div>
                            </div>
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">Полезное</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/blog/">Журнал ИнтернетУрока </a>
                                    <a href="http://interneturok.ru/faq/">Вопрос – ответ </a>
                                    <a href="https://mi-lazarev.ru/" target="_blank">Материалы М. И. Лазарева <img
                                            src="{{ asset('/olimpiada/static/img/arrot-top-right-white.svg') }}/arrot-top-right-white.svg"
                                            alt="arrow"></a>
                                </div>
                            </div>
                        </div>

                        <div class="footer-nav-column">
                            <div class="footer-menu-section">
                                <div class="footer-menu-section-title">О нас</div>

                                <div class="footer-menu-section-list">
                                    <a href="http://interneturok.ru/ob_interneturoke/nasha_filosofiya/">Наша философия
                                    </a>
                                    <a href="https://rabota.interneturok.ru/" target="_blank">Карьера в компании
                                        <img src="{{ asset('/olimpiada/static/img/arrot-top-right-white.svg') }}"
                                            alt="arrow"></a>
                                    <a href="http://interneturok.ru/invest/">Инвесторам </a>
                                    <a href="http://interneturok.ru/ob_interneturoke/my_v_smi/">СМИ о нас </a>
                                    <a href="http://interneturok.ru/kontakty/">Контакты </a>
                                </div>
                            </div>
                            <a href="http://interneturok.ru/shkola/dokumenty/" target="_blank"
                                class="footer-license">
                                <div class="footer-license-title">Государственная<br />лицензия</div>
                                <div class="footer-license-ico">
                                    <img src="{{ asset('/olimpiada/static/img/arrot-top-right-white.svg') }}"
                                        alt="arrot">
                                </div>
                                <img src="{{ asset('/olimpiada/static/img/footer-ico4.svg') }}" alt="ico licence"
                                    class="footer-license-image">
                            </a>
                        </div>


                    </div>
                </div> --}}

                <div class="footer-bottom" style="padding-bottom: 10px">
                    <div class="footer-bottom-row1">
                        <div class="footer-copyrights-box">
                            <a href="https://sk.ru/" target="_blank" rel="nofollow" class="footer-sk">
                                <img src="{{ asset('/olimpiada/static/img/logo2.svg') }}" alt="logo">
                            </a>
                            <div class="footer-copyrights">
                                © ИнтернетУрок, 2009-2023<br />
                                © ООО «ИНТЕРДА» ИНН 7715706679, 2014-2023 </div>
                        </div>
                        <div class="footer-socials">
                            <div class="footer-socials-list">


                                <a href="https://vk.com/school.interneturok" target="_blank" rel="nofollow"
                                    class="social-item">
                                    <img src="{{ asset('/olimpiada/static/img/social-vk.svg') }}" alt="vk">
                                </a>

                                <a href="https://t.me/interneturokofficial" target="_blank" rel="nofollow"
                                    class="social-item">
                                    <img src="{{ asset('/olimpiada/static/img/social-tg.svg') }}" alt="tg">
                                </a>

                                <a href="https://ok.ru/interneturok" target="_blank" rel="nofollow"
                                    class="social-item">
                                    <img src="{{ asset('/olimpiada/static/img/social-ok.svg') }}" alt="ok">
                                </a>

                                <a href="https://dzen.ru/interneturok" target="_blank" rel="nofollow"
                                    class="social-item">
                                    <img src="{{ asset('/olimpiada/static/img/social-ya.svg') }}" alt="ya">
                                </a>

                            </div>
                        </div>
                        <div class="footer-up">
                            <div class="up-arrow">
                                <img src="{{ asset('/olimpiada/static/img/arrow-up-blue.svg') }}" alt="up">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="footer-bottom-row2">
                        <div class="footer-docs-links footer-docs-links_wide">
                            <div class="footer-docs-links-infoitem">Данные в формах обрабатывает технология <a
                                    href="https://yandex.ru/legal/smartcaptcha_notice/" target="_blank"
                                    rel="nofollow">SmartCaptcha от Яндекс</a></div>
                            <div class="footer-docs-links-infoitem">
                                Интерактивная платформа «Домашняя Школа “ИнтернетУрок”» внесена в реестр российских
                                программ для электронных вычислительных машин и баз данных (<a
                                    href="https://reestr.digital.gov.ru/reestr/827704/" target="_blank"
                                    rel="nofollow">запись № 14133 от 01.07.2022 г.</a>) </div>
                            <div class="footer-docs-links-infoitem">
                                Для повышения удобства работы с сайтом мы используем файлы cookie и веб-аналитику.
                                Оставаясь на сайте, вы соглашаетесь на обработку таких данных. </div>
                        </div>
                        <div class="footer-docs-links">
                            <a href="http://interneturok.ru/terms/" target="_blank">Соглашение о пользовании
                                сайтом</a>
                            <a href="http://interneturok.ru/policy/" target="_blank">Политика в отношении обработки
                                персональных данных</a>
                            <a href="http://interneturok.ru/svedeniya_ob_obrazovatelnoy_organizacii/"
                                target="_blank">Сведения об образовательной организации</a>
                        </div>
                        <div class="footer-madeby">
                            <a href="https://flat12.ru/" target="_blank" rel="nofollow">
                                <img src="{{ asset('/olimpiada/static/img/flat12.svg') }}" alt="flat12 logo">
                            </a>
                        </div>
                    </div> --}}
                    {{-- <div class="footer-bottom-row3"></div> --}}
                </div>
            </div>
        </div>
    </footer>
    <div class="pp pp-video" data-pp="pp-video">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="ls-pp-videobox">
                    <iframe src="#" class="js-pp-iframe-video" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen autoplay></iframe>
                </div>
            </div>
        </div>
    </div>


    <div class="pp pp-regular" data-pp="review">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content js-loadbox-content"></div>
        </div>
    </div>

    <div class="pp pp-review-image" data-pp="review-image">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="popup-content popup-content_review-image js-loadbox-content">
                <div class="pp__close">
                    <div class="close__lane"></div>
                    <div class="close__lane"></div>
                </div>
                <img src="{{ asset('/olimpiada/static/img/reviews/review_image_example.png') }}" alt="review" />
            </div>
        </div>
    </div>



    <div class="pp pp-regular" data-pp="callback">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Обратный звонок</div>
                    <div class="pp-subtitle">Оставьте номер телефона, и мы перезвоним вам в течение 15 минут (c 9:00
                        до 21:00 мск).<br />Услуга бесплатная</div>

                    <div class="pp-form">
                        <form class="js-callback-form" method="post" action="#" id="callbackForm">
                            <fieldset>
                                <input type="hidden" name="pageUrl" value="index.html" />
                                <input type="hidden" name="page" value="Олимпиада Лучик" />
                                <input type="hidden" name="pageId" value="125" />
                                <input type="hidden" name="workemail" value="" />
                                <div class="f-item">
                                    <input type="text" class="txt-i" name="name"
                                        placeholder="Как вас зовут?">
                                </div>
                                <div class="f-item">
                                    <div class="complex-phone-item">
                                        <input type="text" class="txt-i" name="phone"
                                            placeholder="Номер телефона">
                                    </div>

                                </div>
                                <div class="recapcha">
                                    <div id="recapcha-callback"></div>
                                </div>

                                <div class="f-item f-item-button">
                                    <button type="submit" class="btn btn-s btn-fullwidth btn-blue-grad"><span>Жду
                                            звонка!</span></button>
                                </div>



                            </fieldset>

                            <input type="hidden" name="af_action" value="8b12d4096fbd33dbdeaefad47c64077a" />
                        </form>
                        <div class="pp-form-warn">
                            Нажимая на кнопку «Жду звонка», я даю <a
                                href="http://interneturok.ru/soglasie_opdn_obratnyy_zvonok/"
                                target="_blank">согласие на обработку своих персональных данных</a> в соответствии с
                            <a href="http://interneturok.ru/policy/" target="_blank">Политикой в отношении обработки
                                персональных данных</a>.
                        </div>
                    </div>
                </div>
                <div class="pp-content-section pp-content-section-solid-grey pp-content-section-index1">
                    <div class="pp-additional-box">
                        <div class="pp-additional-box-text">Вы можете сэкономить время, позвонив нам прямо сейчас:
                        </div>
                        <a href="tel:8 (800) 775 4121" class="pp-additional-text-phone">8 (800) 775 4121</a>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="pp pp-regular" data-pp="callback-thanks">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-icon">
                        <img src="{{ asset('/olimpiada/static/img/send-icon.png') }}" alt="" />
                    </div>
                    <div class="pp-title">Спасибо!</div>
                    <div class="pp-subtitle">Ваше сообщение отправлено. <br />Мы перезвоним вам в ближайшее время.
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="pp pp-regular" data-pp="request">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Оставить заявку</div>
                    <div class="pp-subtitle">Просто укажите ваши контактные данные</div>

                    <div class="pp-form">

                        <form class="js-request-form" method="post" id="requestForm">
                            <fieldset>
                                <input name="tariff" value="" type="hidden">
                                <input type="hidden" name="pageUrl" value="index.html" />
                                <input type="hidden" name="page" value="Олимпиада Лучик" />
                                <input type="hidden" name="pageId" value="125" />
                                <input type="hidden" name="flocktorySpot" value="" />
                                <input type="hidden" name="productName" value="" />
                                <input type="hidden" name="buttonId" value="" />
                                <input type="hidden" name="customEmailTo" value="" />
                                <div class="f-item">
                                    <input type="text" class="txt-i" name="name"
                                        placeholder="Как вас зовут?">
                                </div>
                                <div class="f-item">
                                    <div class="complex-phone-item">
                                        <input type="text" class="txt-i" name="phone"
                                            placeholder="Номер телефона">
                                    </div>
                                </div>
                                <div class="f-item">
                                    <input type="text" class="txt-i" name="email" placeholder="Email">
                                </div>
                                <div class="recapcha">
                                    <div id="recapcha-request"></div>
                                </div>
                                <div class="f-item f-item-button">
                                    <button type="submit"
                                        class="btn btn-s btn-blue-grad"><span>Отправить</span></button>
                                </div>
                            </fieldset>

                            <input type="hidden" name="af_action" value="263d16037e17185a0ebbab1c9d04727a" />
                        </form>
                        <div class="pp-form-warn">
                            Нажимая на кнопку «Отправить», я даю <a
                                href="http://interneturok.ru/soglasie_opdn_registraciya/" target="_blank">согласие
                                на обработку своих персональных данных</a> в соответствии с <a
                                href="http://interneturok.ru/policy/" target="_blank">Политикой в отношении
                                обработки персональных данных</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pp pp-regular" data-pp="request-thanks">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-icon">
                        <img src="{{ asset('/olimpiada/static/img/send-icon.png') }}" alt="" />
                    </div>
                    <div class="pp-title">Спасибо!</div>
                    <div class="pp-subtitle">Ваше сообщение отправлено.<br />Мы свяжемся с вами в ближайшее время.
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="pp pp-director-request" data-pp="director-request">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-director-parts">
                    <div class="pp-director-leftside">
                        <div class="pp-director-title">Добро пожаловать<br> в <span class="text-blue">приемную
                                директора!</span></div>
                        <div class="pp-director-text">
                            <p>Эта форма предназначена для отправки <b>обращений напрямую руководству школы</b>.
                                Вы можете воспользоваться формой, в случае если вы ранее обращались со своим
                                вопросом или предложением в наш контакт-центр и вы по каким-либо причинам
                                посчитали ответ неудовлетворительным или принятые меры — недостаточными.</p>

                            <p>Чтобы мы могли ознакомиться с историей вашего обращения, пожалуйста,
                                прикрепите к форме скриншот переписки с нашим контакт-центром.</p>
                        </div>
                        <div class="pp-director-text-sep"></div>
                        <div class="pp-director-text-additional">
                            Срок рассмотрения обращения - 3-5 раб.дней </div>
                    </div>


                    <div class="pp-director-rightside">
                        <div class="pp-form">
                            <form method="post" class="js-director-form" enctype="multipart/form-data"
                                id="directorForm">
                                <fieldset>
                                    <input name="workemail" value="" type="hidden">
                                    <input type="hidden" name="pageUrl" value="index.html" />
                                    <input type="hidden" name="page" value="Олимпиада Лучик" />
                                    <input type="hidden" name="pageId" value="125" />
                                    <div class="f-item">
                                        <input type="text" class="txt-i" name="name"
                                            placeholder="Как вас зовут?">
                                    </div>
                                    <div class="f-item">
                                        <input type="text" class="txt-i" name="email" placeholder="Email">
                                    </div>
                                    <div class="f-item">
                                        <textarea class="txt-a" name="message" placeholder="Суть вашего обращения"></textarea>
                                    </div>

                                    <div class="f-item">
                                        <div class="form-file" id="triggerFile">
                                            <label class="attach-btn files-attach" for="upload-file">
                                                <div class="files-attach-wrap">
                                                    <div class="files-attach-l">
                                                        <img class="attach-img"
                                                            src="{{ asset('/olimpiada/static/img/attach.svg') }}"
                                                            alt="image">
                                                    </div>
                                                    <div class="files-attach-r">
                                                        <div class="files-attach-r-title">Прикрепить файлы</div>
                                                        <div class="files-attach-r-text">скриншот/ы предварительной
                                                            переписки с контакт-центром</div>
                                                    </div>
                                                </div>
                                            </label>
                                            <input type="file" name="uploaded_file[]" multiple
                                                class="upload-file" id="upload-file">
                                            <div class="list-files"></div>
                                        </div>
                                    </div>

                                    <div class="recapcha">
                                        <div id="recapcha-director"></div>
                                    </div>

                                    <div class="f-item f-item-button">
                                        <button type="submit"
                                            class="btn btn-s btn-fullwidth btn-blue-grad"><span>Отправить</span></button>
                                    </div>
                                </fieldset>

                                <input type="hidden" name="af_action" value="4a7e299e2266eb2942e67bba09212079" />
                            </form>

                            <div class="pp-form-warn">
                                Нажимая на кнопку «Отправить», я даю <a
                                    href="http://interneturok.ru/soglasie_opdn_priemnaya/" target="_blank">согласие
                                    на обработку своих персональных данных</a> в соответствии с <a
                                    href="http://interneturok.ru/policy/" target="_blank">Политикой в отношении
                                    обработки персональных данных</a>.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="pp pp-regular" data-pp="director-request-thanks">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-icon">
                        <img src="{{ asset('/olimpiada/static/img/send-icon.svg') }}" alt="send" />
                    </div>
                    <div class="pp-title">Спасибо!</div>
                    <div class="pp-subtitle">Мы рассмотрим ваше обращение в течение 3х рабочих дней и свяжемся с вами
                        по указанному email.</div>
                </div>
            </div>
        </div>
    </div>


    <div class="pp pp-regular" data-pp="question">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Задать вопрос</div>
                    <div class="pp-subtitle">Задайте свой вопрос! Мы ответим вам в течение 1 рабочего дня </div>
                    <div class="pp-form">

                        <form method="post" class="js-question-form" id="questionForm">
                            <fieldset>
                                <input name="workemail" value="" type="hidden">
                                <input type="hidden" name="pageUrl" value="index.html" />
                                <input type="hidden" name="page" value="Олимпиада Лучик" />
                                <input type="hidden" name="pageId" value="125" />
                                <div class="f-item">
                                    <input type="text" class="txt-i" name="name"
                                        placeholder="Как вас зовут?">
                                </div>
                                <div class="f-item">
                                    <input type="text" class="txt-i" name="email" placeholder="Email">
                                </div>
                                <div class="f-item">
                                    <textarea class="txt-a" name="question" placeholder="Текст вашего вопроса"></textarea>
                                </div>
                                <div class="recapcha">
                                    <div id="recapcha-question"></div>
                                </div>
                                <div class="f-item f-item-button">
                                    <button type="submit"
                                        class="btn btn-s btn-fullwidth btn-blue-grad"><span>Отправить</span></button>
                                </div>
                            </fieldset>

                            <input type="hidden" name="af_action" value="d532f6a3ad48b438abd13a7c143d944d" />
                        </form>

                        <div class="pp-form-warn">
                            Нажимая на кнопку «Отправить», я даю <a
                                href="http://interneturok.ru/soglasie_opdn_registraciya/" target="_blank">согласие
                                на обработку своих персональных данных</a> в соответствии с <a
                                href="http://interneturok.ru/policy/" target="_blank">Политикой в отношении
                                обработки персональных данных</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pp pp-regular" data-pp="question-thanks">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-icon">
                        <img src="{{ asset('/olimpiada/static/img/send-icon.png') }}" alt="send" />
                    </div>
                    <div class="pp-title">Спасибо!</div>
                    <div class="pp-subtitle">Ваше сообщение отправлено.<br /> Мы свяжемся с вами в ближайшее время.
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="pp pp-auth" data-pp="auth">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Вход</div>

                    <div class="pp-form">
                        <form class="js-auth" method="" action="#">
                            <input type="hidden" name="gtoken" value="">
                            <fieldset>
                                <div class="f-item">
                                    <input type="text" class="txt-i" name="user[email]" placeholder="Email"
                                        autocomplete="new-password">
                                </div>
                                <div class="f-item f-item-password">
                                    <div class="password-switcher js-pass-switcher-auth"></div>
                                    <input type="password" class="txt-i" id="authpassword"
                                        name="user[password]" placeholder="Пароль" autocomplete="new-password">
                                </div>
                                <div class="form-error-box" style="display:none;">
                                    <div class="form-error-box-luchik">
                                        <img src="{{ asset('/olimpiada/static/img/psp-error.png') }}"
                                            alt="luchik">
                                    </div>
                                    <div class="form-error-box-text"></div>
                                </div>
                                <div id="recapcha-pp-auth"></div>
                                <div class="f-item f-item-button">
                                    <button type="submit"
                                        class="btn btn-s btn-fullwidth btn-orange"><span>Войти</span></button>
                                </div>
                            </fieldset>
                        </form>
                        <div class="pp-form-warn pp_" data-pp="password-restore">
                            Напомнить пароль
                        </div>
                    </div>
                </div>
                <div class="pp-content-section pp-content-section-solid-grey pp-content-section-index1">
                    <div class="pp-reg-auth">
                        <div class="pp-reg-auth-text">Нет аккаунта?</div>
                        <div class="pp-reg-auth-button">
                            <span class="btn btn-s btn-grey btn-fullwidth pp_"
                                data-pp="registration">Зарегистрироваться</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pp pp-registration" data-pp="registration">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp-back pp_" data-pp="auth"><img src="{{ asset('/olimpiada/static/img/pp-back-arrow.svg') }}"
                    alt="arrow"></div>
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Регистрация<br />
                        <span class="text-lightorange">в ИнтернетУроке</span>
                    </div>

                    <div class="pp-form">
                        <form class="js-registration" method="" action="#">
                            <fieldset>
                                <input type="hidden" name="gtoken" value="">

                                <div class="f-item">
                                    <input type="text" class="txt-i" name="user[email]"
                                        placeholder="Email *" autocomplete="new-password">
                                </div>

                                <div class="f-item f-item-complex-phone">
                                    <div class="complex-phone-item complex-phone-item_phone">
                                        <input type="tel" name="user[phone]" class="txt-i js-iti-phone"
                                            id="reg-phone" required="" placeholder="Телефон *"
                                            autocomplete="new-password">
                                        <label id="reg-phone-error-iti" class="error hide" for="reg-phone"
                                            style="display:none;"></label>
                                    </div>
                                </div>

                                <div class="f-item f-item-password">
                                    <div class="password-switcher js-pass-switcher-reg"></div>
                                    <input type="password" class="txt-i" id="regpassword" name="user[password]"
                                        placeholder="Пароль *" autocomplete="new-password">
                                </div>
                                <div class="password-tips-box" style="display:none;">
                                    <div class="password-tips-text">Для защиты ваших персональных данных необходимо
                                        придумать <b>безопасный пароль</b>.<br />Он должен содержать:</div>
                                    <div class="password-criteria-list">
                                        <div class="password-criteria" data-criteria="1">не менее 4 знаков</div>
                                        {{-- <div class="password-criteria" data-criteria="2">заглавные латинские буквы
                                        </div>
                                        <div class="password-criteria" data-criteria="3">строчные латинские буквы
                                        </div>
                                        <div class="password-criteria" data-criteria="4">цифры</div>
                                        <div class="password-criteria" data-criteria="5">символы !"$№%&'()+,-./:;<=>
                                                ?@[]^_&#123;|&#125;~`</div>
                                        <div class="password-criteria" data-criteria="6">отсутствует
                                            последовательность цифр</div> --}}
                                    </div>
                                </div>

                                <div id="recapcha-pp-reg"></div>



                                <div class="form-error-box" style="display:none;">
                                    <div class="form-error-box-luchik">
                                        <img src="{{ asset('/olimpiada/static/img/psp-error.png') }}"
                                            alt="luchik">
                                    </div>
                                    <div class="form-error-box-text"></div>
                                </div>
                                <div class="f-item f-item-button">
                                    <button type="submit" class="btn btn-s btn-fullwidth btn-orange">
                                        <span>
                                            <div class="js-regform-button-text">Зарегистрироваться</div> <img
                                                src="{{ asset('/olimpiada/static/img/arrow-white-right.svg') }}"
                                                alt="arrow">
                                        </span>
                                    </button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="pp-content-section pp-content-section-solid-grey pp-content-section-index1">
                    <div class="pp-warntext">
                        Нажимая на кнопку «Зарегистрироваться»,
                        я даю <a href="http://interneturok.ru/soglasie_opdn_registraciya/" target="_blank">согласие
                            на обработку своих персональных данных</a>
                        в соответствии с <a href="http://interneturok.ru/policy/" target="_blank">Политикой в
                            отношении обработки персональных данных</a>.
                        Регистрация в сервисе возможна только для лиц, достигших 18 лет.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pp pp-regular" data-pp="phone-sms">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Подтверждение<br /> номера телефона</div>
                    <div class="pp-subtitle">На ваш мобильный телефон отправлен код подтверждения, введите его ниже,
                        чтобы закончить регистрацию</div>

                    <div class="pp-form">
                        <form class="js-pp-smscode" method="" action="#">
                            <fieldset>
                                <div class="form-phone-sms">
                                    <div class="form-phone-sms-item">
                                        <div class="symbol-block">
                                            <div class="symbol-block-char"> - </div>
                                            <div class="symbol-block-char"> - </div>
                                            <div class="symbol-block-char"> - </div>
                                            <div class="symbol-block-char"> - </div>
                                        </div>
                                        <input type="tel" class="js-smscode-input" maxlength="4"
                                            step="1" min="0" max="9999" placeholder=""
                                            pattern="\d4"name="code">
                                    </div>
                                </div>
                                <div class="form-error-box" style="display:none;">
                                    <div class="form-error-box-luchik">
                                        <img src="{{ asset('/olimpiada/static/img/psp-error.png') }}"
                                            alt="luchik">
                                    </div>
                                    <div class="form-error-box-text"></div>
                                </div>
                                <div class="form-error-box_notify js-sms-notify" style="display:none;">
                                    <div class="form-error-box-luchik">
                                        <img src="{{ asset('/olimpiada/static/img/psp-sms-notify.png') }}"
                                            alt="luchik">
                                    </div>
                                    <div class="form-error-box-text ">Если звонок или смс долго не приходит,
                                        проверьте, что вы правильно указали номер телефона.
                                        Если данные верны, то, возможно, у оператора возникли технические проблемы.
                                        Попробуйте получить код ещё раз.</div>
                                </div>

                            </fieldset>
                        </form>
                        <div class="pp-sms-timer">
                            Отправить код повторно можно будет через
                            <span class="timer-countdown"><span class="js-smstimer-minutes">0</span>:<span
                                    class="js-smstimer-seconds">30</span></span>
                        </div>
                        <span class="pp-sms-resend js-resend-sms">Получить новый код</span>
                    </div>
                </div>
                <div class="pp-content-section pp-content-section-solid-grey pp-content-section-index1">
                    <div class="pp-sms-phone">
                        <div class="pp-sms-phone-title">Указанные вами данные:</div>
                        <div class="pp-sms-phone-value js-userphone-value">+7 (999) 999-99-99</div>
                        <div class="pp-sms-phone-value pp-sms-phone-value_email js-useremail-value">hello@flat12.ru
                        </div>

                        <div class="pp-sms-phone-linkchange pp_" data-pp="registration">Изменить данные</div>
                    </div>
                </div>


            </div>

        </div>
    </div>
    <div class="pp pp-regular" data-pp="phone-sms-thanks">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-icon">
                        <img src="{{ asset('/olimpiada/static/img/send-icon.png') }}" alt="" />
                    </div>
                    <div class="pp-title">Спасибо!</div>
                    <div class="pp-subtitle">Ваш номер телефона подтвержден.</div>
                    <div class="pp-button">
                        <span class="btn btn-m btn-blue-grad js-close-pp"><span>Закрыть</span></span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="pp pp-regular pp-password-restore" data-pp="password-restore">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-title">Забыли пароль?</div>
                    <div class="pp-subtitle">Введите email, указанный при регистрации, чтобы мы смогли выслать на него
                        инструкции по восстановлению</div>

                    <div class="pp-form">
                        <form class="js-pp-password-restore" method="" action="#">
                            <fieldset>
                                <div class="f-item">
                                    <input type="email" class="txt-i" name="email" placeholder="Email">
                                </div>

                                <div class="form-error-box" style="display:none;">
                                    <div class="form-error-box-luchik">
                                        <img src="{{ asset('/olimpiada/static/img/psp-error.png') }}"
                                            alt="luchik">
                                    </div>
                                    <div class="form-error-box-text"></div>
                                </div>
                                <div class="f-item f-item-button">
                                    <button type="submit"
                                        class="btn btn-s btn-fullwidth btn-blue-grad"><span>Отправить</span></button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pp pp-regular" data-pp="password-restore-thanks">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content">
                <div class="pp-content-section pp-content-section-solid-white pp-content-section-index2">
                    <div class="pp-icon">
                        <img src="{{ asset('/olimpiada/static/img/send-icon.png') }}" alt="" />
                    </div>
                    <div class="pp-title">Спасибо!</div>
                    <div class="pp-subtitle">Инструкция по восстановлению пароля отправлена на ваш email</div>

                </div>
            </div>
        </div>
    </div>



    <div class="pp pp-regular pp-regular-faq" data-pp="faq_minimum">
        <div class="pp__bg"></div>
        <div class="pp__content">
            <div class="pp__close">
                <div class="close__lane"></div>
                <div class="close__lane"></div>
            </div>
            <div class="popup-content js-loadbox-content">
                <div class="pp-content-section pp-content-section-solid-white css-content">
                    <p>Для получения аттестации за четверть&nbsp;<strong>в</strong>&nbsp;<strong>1-ом
                            классе</strong>&nbsp;требуется получить необходимый минимум зачётов за выполненные работы:

                    <ul>
                        <li>I четверть: минимум 4 зачёта по каждому предмету;</li>
                        <li>II четверть: минимум 4 зачёта по каждому предмету;</li>
                        <li>III четверть: минимум 5 зачётов по каждому предмету;</li>
                        <li>IV четверть: минимум 4 зачёта по каждому предмету.</li>
                    </ul>

                    <p>Для получения аттестации за четверть&nbsp;<strong>во 2–11 классах</strong>&nbsp;требуется
                        получить необходимый минимум оценок за выполненные работы, <strong>включая обязательные
                            работы</strong> (выделены в журнале и расписании восклицательным знаком).</p>

                    <p>Если ученик выполняет домашние задания еженедельно, ему необходимо получить следующее количество
                        оценок:</p>

                    <ul>
                        <li>I четверть: минимум 5 оценок по каждому предмету;</li>
                        <li>II четверть: минимум 5 оценок по каждому предмету;</li>
                        <li>III четверть: минимум 7 оценок по каждому предмету;</li>
                        <li>IV четверть: минимум 5 оценок по каждому предмету (для 9 и 11 классов – минимум 3 оценки по
                            каждому предмету).</li>
                    </ul>

                    <p>В 9 и 11 классах в феврале (III четверть) будут проведены обязательные итоговые контрольные
                        работы по русскому языку и математике с использованием системы прокторинга.</p>

                    <p>Если уроки по предмету проходят не каждую неделю, то для аттестации необходимо выполнить только
                        все обязательные работы (выделены в журнале и расписании восклицательным
                        знаком).&nbsp;Исключение: предмет «Основы светской этики» в 4 классе, по нему уроки проходят не
                        каждую неделю, а количество оценок, необходимых для аттестации, определяется установленным
                        минимумом (I четверть - 3 оценки, II четверть - 3 оценки, III четверть - 4 оценки, IV четверть -
                        2 оценки).</p>

                    <p>Если ученик выполняет МДЗ (ежемесячное домашнее задание), то на сайт должны быть загружены все
                        работы.</p>

                    <p>Четвертные оценки выставляются, если у ученика есть указанное количество загруженных заданий и
                        оценок. Если работ недостаточно, итоговая оценка на сайте не ставится (Н/А).</p>
                </div>

            </div>
        </div>
    </div>









    <div class="toasty-box">
        <img src="{{ asset('/olimpiada/static/img/toasty.png') }}" alt="easter egg" />
    </div>



    <script src="{{ asset('/olimpiada/assets_hs/components/ajaxform/js/default.js') }}"></script>

</body>

</html>
