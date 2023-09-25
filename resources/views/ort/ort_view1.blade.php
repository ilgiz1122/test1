@extends('layouts.ort_layouts')

@section('title', 'ОРТ')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('/packages/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/packages/slick/slick-theme.css') }}">
    <style>
        .cursor {
            cursor: pointer;
        }

        .img-svg path {
            fill: #17a2b8;
        }

        .two {
            will-change: transform;
            transition: transform 400ms;
        }

        .two:hover {
            transition: transform 300ms;
            transform: translateY(-5px);
        }

        .for_color_navedenii:hover .for_color {
            color: #17a2b8;
        }

        hr.new2 {
            border-top: 2px dashed #17a2b8;
            border-radius: 3px;
        }
        hr.new3 {
            border-top: 2px dashed #17a2b8;
            border-radius: 3px;
        }



        .slick-slide {
            margin: 0px 10px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
            opacity: .2;
        }

        .slick-active {
            opacity: 1;
        }

        .slick-current {
            opacity: 1;
        }

        @media screen and (max-device-width: 400px) {
            .slick-slide {
                margin: 0px 0px;
            }
        }

        .img2 {
            filter: blur(1px);
        }

        @media (max-width: 768px) {
            .for_skryt {
                display: none;
            }
        }

        .bs-stepper-header {
            display: flex;
            overflow: auto;
        }

        @media (min-width: 768px) {
            .bs-stepper-header::-webkit-scrollbar {
                width: 0;
                display: none;
            }
        }
    </style>

    <section class="content pt-3">
        <!-- Preloader-->
        <div class="preloader flex-column justify-content-center align-items-center d-flex">
            <div class="spinner-border text-info" role="status" style="width: 3rem; height: 3rem;">
                <span class="sr-only">Жүктөлүүдө...</span>
            </div>
        </div>
        <!-- Preloader-->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
            <section class="variable variable22 slider mt-3" id="newMessage" style="max-height: 350px;">
                @foreach ($banners as $banner)
                    <div>
                        <div class="card mb-2 bg-gradient-dark" style="border-radius: 10px;">
                            <div class="img3">
                                <img class="card-img-top img2" style="border-radius: 10px;"
                                    src="{{ asset('/storage/banner/') }}/{{ $banner->img }}">
                            </div>
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h2 class="text-white mt-3"><b>{{ $banner->title }}</b></h2>
                                <p class="card-text text-white pb-1 pt-3 mb-0">{{ $banner->opisanie }}</p>
                                <div class="text-right">
                                    @if ($banner->ssylka != null)
                                        <a href="{{ $banner->ssylka }}" class="btn btn-outline-info text-white"
                                        style="border-radius: 20px;"><span class="p-1">Кененирээк <i
                                                class="fas fa-long-arrow-alt-right mt-1 pl-2"></i></span></a>
                                    @endif
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
    </section>
    <!-- /.content -->

    <section class="content mb-3 mt-5 text-center">
        <a href="{{ route('user_online_sabak_view', ['subdomain' => 'ort']) }}" class="btn btn-info btn-lg pr-5 pl-5 mt-3" style="border-radius: 30px">Онлайн сабак</a>
        <a href="{{ route('ort_negizgi_test', ['subdomain' => 'ort']) }}" class="btn btn-info btn-lg pr-5 pl-5 mr-5 ml-5 mt-3" style="border-radius: 30px">Негизги тест</a>
        <a href="{{ route('ort_predmettik_test', ['subdomain' => 'ort']) }}" class="btn btn-info btn-lg pr-5 pl-5 mt-3" style="border-radius: 30px">Предметтик тест</a>
    </section>
    <section class="content mb-3 mt-5 text-center">
        <div class="row pt-5">
            <div class="col"></div>
            <div class="col-auto">
                <p class="mb-0  text-center">Android платформасы үчүн уюлдук тиркеме<a href="{{ asset('/files/НоНси - ОРТ.apk') }}" class=" text-center btn btn btn-outline-info pr-4 pl-4 ml-5 mr-5" download style="border-radius: 30px"><i class="fas fa-arrow-to-bottom pr-3"></i> Жүктөп алуу</a></p> 
                
            </div>
            <div class="col"></div>
        </div>
    </section>


    <section class="content mb-3">
            <hr class="new2 mt-5 mb-0">
            <h4 id="yakor_materialy" class="mt-5 text-center"><strong>Онлайн сабак / Негизги тест / Предметтик тест / ...</strong></h4>
            <div class="row">
                <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                    <section class="invoice" style="background: none; border: none;">
                        <div class="row">
                            <div class="col text-center">
                                <!--<img class="" src="{{asset('')}}/img/lead-1.png" alt="Dist Photo 2">-->
                                <i class="fas fa-vote-yea pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center pl-3 pr-3">
                                <h4><strong><span class="info-box-text for_color">Сапат</span></strong></h4>
                                <span class="progress-description">Биздин өнөктөштөр тесттерди (сабактарды) дайыма
                                    жаңылап, толуктап турушат. Ал гана эмес сиздин сунуштун негизинде да оңдоп турууга
                                    даяр.</span>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                    <section class="invoice" style="background: none; border: none;">
                        <div class="row">
                            <div class="col text-center">
                                <!--<img class="" src="{{asset('')}}/img/lead-3.png" alt="Dist Photo 2">-->
                                <i class="fas fa-lock pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center pl-3 pr-3">
                                <h4><strong><span class="info-box-text for_color">Мүмкүнчүлүк</span></strong></h4>
                                <span class="progress-description">Биздин платформада бекер жана акы төлөнүүчү тесттер
                                    (сабактар) бар. Акысыз тесттерди каалаган убакта тапшырсаңыз болот, ал
                                    эми акы төлөнүүчү тесттер (сабактар) сатып алгандан кийин гана жеткиликтүү болот.</span>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                    <section class="invoice" style="background: none; border: none;">
                        <div class="row">
                            <div class="col text-center">
                                <!--<img class="" src="{{asset('')}}/img/lead-2.png" alt="Dist Photo 2">-->
                                <i class="fas fa-crosshairs pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center pl-3 pr-3">
                                <h4><strong><span class="info-box-text for_color">Көзөмөл</span></strong></h4>
                                <span class="progress-description">Биздин адистер тесттердин (сабактардын) сапатын текшерип
                                    турушат. Эгерде биздин талаптарга жооп бербесе, анда өчүрүлөт же жаңыланат.</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                    <section class="invoice" style="background: none; border: none;">
                        <div class="row">
                            <div class="col text-center">
                                <!--<img class="" src="{{asset('')}}/img/lead-4.png" alt="Dist Photo 2">-->
                                <i class="fas fa-users pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center pl-3 pr-3">
                                <h4><strong><span class="info-box-text for_color">Мыкты мугалимдер</span></strong></h4>
                                <span class="progress-description">Контентти түзүүгө өлкөнүн мыкты мугалимдерин жана
                                    методисттерин тартабыз.</span>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                    <section class="invoice" style="background: none; border: none;">
                        <div class="row">
                            <div class="col text-center">
                                <!--<img class="" src="{{asset('')}}/img/lead-66.png" alt="Dist Photo 2">-->
                                <i class="fas fa-sitemap pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center pl-3 pr-3">
                                <h4><strong><span class="info-box-text for_color">Баары бир жерде</span></strong></h4>
                                <span class="progress-description">Бул жерден сиз эң мыкты тесттерди (сабактарды) таба
                                    аласыз. Ал эми биздин контент жаңы тесттер (сабактар) менен толукталып турат.</span>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-4 two for_shadow for_color_navedenii px-lg-2 py-lg-4 mt-4" style="border-radius: 4px;">
                    <section class="invoice" style="background: none; border: none;">
                        <div class="row">
                            <div class="col text-center">
                                <!--<img class="" src="{{asset('')}}/img/lead-5.png" alt="Dist Photo 2">-->
                                <i class="far fa-comments pt-2 pb-3" style="color: #17a2b8; font-size: 80px;"></i>
                            </div>
                            <div class="w-100"></div>
                            <div class="col text-center pl-3 pr-3">
                                <h4><strong><span class="info-box-text for_color">Колдоо</span></strong></h4>
                                <span class="progress-description">Каалаган убакта биздин адистерге суроо берип, жооп ала
                                    аласыз.</span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
    </section>
    <!-- /.content -->




    <script type="text/javascript">
        var target = '.block23';
        jQuery(target).each(function() {
            jQuery(this).click(function() {
                location = jQuery(this).find('a').attr('href');
            });
            jQuery(this).css('cursor', 'pointer');
        });




        $('img.img-svg').each(function() {
            var $img = $(this);
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');
            $.get(imgURL, function(data) {
                var $svg = $(data).find('svg');
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }
                $svg = $svg.removeAttr('xmlns:a');
                if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                    $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
                }
                $img.replaceWith($svg);
            }, 'xml');
        });


        $('.for_shadow').mouseover(function() {
            $(this).addClass('shadow');
        });
        $('.for_shadow').mouseleave(function() {
            $(this).removeClass('shadow');
        });
    </script>

    <script>
        jQuery(document).ready(function() {
            jQuery("a.scrollto").click(function() {
                elementClick = jQuery(this).attr("href")
                destination = jQuery(elementClick).offset().top - 50;
                jQuery("html:not(:animated),body:not(:animated)").animate({
                    scrollTop: destination
                }, 1100);
                return false;
            });
        });
    </script>



@endsection
