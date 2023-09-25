@extends('layouts.poputka_taxi_layouts')

@section('title', 'такси')

@section('content1')
    {{ $prilojenie_name->prilojenie_big_title }}
@endsection

@section('jaryalar')
    {{ route('reklama_index_1', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}
@endsection

@section('jarya_koshuu')
    {{ route('jarya_koshuu', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}
@endsection

@section('tirkeme_jonundo')
    {{ route('poputka_taxi_tirkeme_jonundo', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}
@endsection

@section('bashka_aimaktar')
    {{ route('poputka_taxi_bashka_aimaktar', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}
@endsection

@section('img100_100')
    {{ asset('public/storage/reklama/priloj_img_100_100/') }}/{{ $prilojenie_name->prilojenie_img }}
@endsection

@section('img480')
    {{ asset('public/storage/reklama/priloj_img_480/') }}/{{ $prilojenie_name->prilojenie_small_title }}
@endsection

@section('content')
    <style>
        .blob {
            background: black;
            border-radius: 50%;
            box-shadow: 0 0 0 0 rgba(0, 0, 0, 1);
            height: 7px;
            width: 7px;
            transform: scale(1);
            animation: pulse-black 2s infinite;
        }


        .blob.blue {
            background: rgba(52, 172, 224, 1);
            box-shadow: 0 0 0 0 rgba(52, 172, 224, 1);
            animation: pulse-blue 2s infinite;
        }

        @keyframes pulse-blue {
            0% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(52, 172, 224, 0.7);
            }

            70% {
                transform: scale(1);
                box-shadow: 0 0 0 10px rgba(52, 172, 224, 0);
            }

            100% {
                transform: scale(0.95);
                box-shadow: 0 0 0 0 rgba(52, 172, 224, 0);
            }
        }

        .carousel-indicators .active {
            opacity: 1;
            border: 0px !important;
            background: #4099FF;
        }

        .li_carousel {
            width: 10px !important;
            height: 10px !important;
            border-radius: 50%;
            border: 0px !important;
        }

        .img_style {
            border-top-left-radius: 5px !important;
            border-top-right-radius: 5px !important;
        }

        .text_phone {
            font-size: 16px;
            font-weight: 700;
            line-height: 1.1;
        }

        .bs-stepper-header {
            display: flex;
            overflow: auto;
        }


        .bs-stepper-header::-webkit-scrollbar {
            width: 0;
            display: none;
        }

        .step-trigger {
            padding-bottom: 0px !important;
            padding-top: 0px !important;
        }

        .step-trigger {
            border-bottom: 4px solid !important;
            border-radius: 0px !important;
            border-bottom-color: #f2f7fb !important;
        }

        .active2 .step-trigger {
            color: #007bff;
            outline: none;
            text-decoration: none;
            background-color: rgba(0, 0, 0, .06);
            border-bottom: 4px solid;
            border-bottom-color: #007bff !important;
            border-radius: 0px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .jscroll-added{
            margin-left: 15px !important;
            margin-right: 15px !important;
        }
    </style>



    {{-- <div class="page-header card margin1" style="margin-left: 10px; margin-right: 10px;">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Онлайн сабак</h5>
                        <span>Сабактарга катышып, билимиңди жогорулат!</span>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    


    <div class="row">
        <div class="col"></div>
        <div class="col-auto">
            <h5 class="text-right mt-15"
                style="margin-bottom: 0; color: #333; font-size: 16px; font-weight: 700; line-height: 1.1;">
                Тиркеме жөнүндө</h5>
        </div>
        <div class="col"></div>
    </div>
    <p class="mt-20 mb-5 ml-10 mr-10" style="font-size: 15px;">"{{$prilojenie_name->prilojenie_big_title}}" мобилдик тиркемеси - бул жергиликтүү элдер үчүн атайын арналып жасалган жаңылык-жарыялардан кабардар кылып турган заманбап тиркеме.<br><br>
        
        Керектүү маалыматтар интернет аркылуу жеңил жана бат таркап, сиздердин аймактын экономикалык, социалдык жана технологиялык өнүгүүсүнө түрткү болот.<br><br>
        
        Тиркемени колдонуу оңой. Эч кандай катталуу, анкета толтуруунун кереги жок.<br><br>
        
        Жарыя берүү үчүн <a href="tel:+996505919600" style="color: #4099FF"> 0(505) 919 600</a> номерине байланышыңыз
    </p>

    <div class="card ">

    </div>
    <div class="pcoded-inner-content"
        style="position:fixed; left:0px; bottom:0px; height:40px; width:100%; background: #263544;z-index:99999999;">
        <p class="text-center" style="color: aliceblue">Жарыя берүү <a href="https://wa.me/+996505919600}}"><i class="fab fa-whatsapp pr-10 pl-10"
                style="font-size: 18px; color: #25D366; font-weight: 800;"></i><span style="color: white;">0505 919 600 </span></a></p>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    
    
    <script>
        // Сабак кошуу уведомление
        @if (session('success'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            });
        @endif
        // Сабак кошуу уведомление х

        //  уведомление2
        @if (session('false'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'false',
                title: '{{ session('false') }}'
            });
        @endif
        // уведомление2 х
    </script>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $(function() {
                $(".for_nav_link").click(
                    function() {
                        $(".for_nav_link").removeClass('active');
                        $(this).addClass('active');
                    }
                );
                
                $(".step").click(
                    function() {
                        var href = $(this).attr('data-href');
                        $(location).attr('href',href);
                    }
                );
                
            });

        $(document).ready(function() {
            if ($('.step').hasClass('active')) {
                $(this).children('step-trigger').css("background-color", "#0000000f");
            }
        });

        $(function () {
            $('ul.pagination').hide();
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<div class="row" style="margin-bottom: 30px;"><div class="col"></div><div class="col-auto"><i class="fad fa-spinner fa-pulse fa-lg" style="--fa-primary-color: #1f62d6; --fa-secondary-color: #1f62d6; font-size: 50px;"></i></div><div class="col"></div></div>',
                padding: 100,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function () {
                    $('ul.pagination:visible:first').hide();
                }
            });
        });

        
        

    </script>
{{-- <i class="fad fa-spinner fa-pulse fa-lg" style="--fa-primary-color: #1f62d6; --fa-secondary-color: #1f62d6;"></i> --}}

@endsection
