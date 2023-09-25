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
    {{ asset('/storage/reklama/priloj_img_100_100/') }}/{{ $prilojenie_name->prilojenie_img }}
@endsection

@section('img480')
    {{ asset('/storage/reklama/priloj_img_480/') }}/{{ $prilojenie_name->prilojenie_small_title }}
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

        .jscroll-added {
            margin-left: 5px !important;
            margin-right: 5px !important;
        }

        .out {
            transform: translateY(-100%);
            transition: 3s;
        }

        .bs-stepper .step-trigger {
            font-weight: 600 !important;
        }

        .modal {
            top: auto;
            bottom: 0;
            height: auto;
            z-index: 99999999;
        }


        .modal-body {
            background: #333;
            color: #f2f7fb;
            font-weight: 550;
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


    <div id="" class="bs-stepper stepper3" style="margin-top: -25px;">
        <div id="test110" class="bs-stepper-header border-bottom" role="tablist"
            style="position: fixed; z-index: 100; background: #f2f7fb; margin-top: -1px; transition: all 1s ease; width:100%; height:auto;
            overflow-x: scroll;
            overflow-y: hidden;">

            <div class=" @if ($category_id == 0) active2 @endif" data-target="#test-nlf-01">
                <a href="{{ route('reklama_index_1', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}"
                    class="step-trigger"
                    data-href="{{ route('reklama_index_1', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}">
                    <i class="fas fa-layer-group fa-lg mt-15"></i>
                    <span class="bs-stepper-label">Жалпы</span>
                </a>
            </div>
            @foreach ($categorys as $category)
                <div class="step  @if ($category_id == $category->id) active2 fgfgfg1 @endif"
                    data-target="#test-nlf-0{{ $loop->iteration + 1 }}"
                    data-href="{{ route('reklama_index_2', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka, 'category_id' => $category->id]) }}">
                    <a href="{{ route('reklama_index_2', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka, 'category_id' => $category->id]) }}"
                        class="step-trigger">
                        {!! $category->category_img !!}
                        <span class="bs-stepper-label">{{ $category->category_big_title }}</span>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="bs-stepper-content p-5 mt-4" style="margin-top: 78px">
            <div id="test-nlf-01" role="tabpanel" class="bs-stepper-pane fade" aria-labelledby="stepper3trigger01">
                <div class="row">

                </div>
            </div>
            @foreach ($categorys as $category)
                <div id="test-nlf-0{{ $loop->iteration + 1 }}" role="tabpanel" class="bs-stepper-pane fade"
                    aria-labelledby="stepper3trigger0{{ $loop->iteration + 1 }}">
                    <div class="row">

                    </div>
                </div>
            @endforeach

            <div class="card pt-40"></div>
            @if (count($reklams) > 0)
                <div class="pcoded-inner-content row scroll infinite-scroll">
                    @foreach ($reklams as $reklama)
                        <div class="col-12" style="padding-left: 7px; padding-right: 7px;">
                            <div class="card " style="border-radius: 10px;">
                                @if ($reklama->poputka_taxi_img != null)
                                    @if (count($reklama->poputka_taxi_img) > 1)
                                        <div class="card-header p-0">
                                            <div id="Jalpy_c_{{ $reklama->id }}" class="carousel slide"
                                                data-ride="carousel" data-interval="false" data-wrap="false">
                                                <ol class="carousel-indicators mb-10">
                                                    @foreach ($reklama->poputka_taxi_img as $img)
                                                        <li data-target="#Jalpy_c_{{ $reklama->id }}"
                                                            data-slide-to="{{ $loop->iteration }}"
                                                            class=" @if ($loop->iteration == 1) active @endif li_carousel">
                                                        </li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner img_style" role="listbox">
                                                    @foreach ($reklama->poputka_taxi_img as $img)
                                                        <div
                                                            class="carousel-item @if ($loop->iteration == 1) active @endif">
                                                            <img class="d-block img-fluid w-100 img_style"
                                                                src="{{ asset('/storage/reklama/img/') }}/{{ $img->img }}"
                                                                alt="" loading="lazy">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#Jalpy_c_{{ $reklama->id }}"
                                                    role="button" data-slide="prev">
                                                    <i class="far fa-chevron-right fa-rotate-180" aria-hidden="true"
                                                        style="font-size: 35px; color: #4099FF;"></i>
                                                    <span class="sr-only">Мурунку</span>
                                                </a>
                                                <a class="carousel-control-next" href="#Jalpy_c_{{ $reklama->id }}"
                                                    role="button" data-slide="next">
                                                    <i class="far fa-chevron-right" aria-hidden="true"
                                                        style="font-size: 35px; color: #4099FF;"></i>
                                                    <span class="sr-only">Кийинки</span>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        @foreach ($reklama->poputka_taxi_img as $img)
                                            <img class=""
                                                src="{{ asset('/storage/reklama/img/') }}/{{ $img->img }}"
                                                loading="lazy" width="100%" alt="501 01 08 20"
                                                style="border-top-left-radius: 5px; border-top-right-radius: 5px">
                                        @endforeach
                                    @endif
                                @endif


                                <div class="card-block pb-0 pl-5 pr-5 pt-5">
                                    <div class="row">
                                        <div class="col">

                                        </div>
                                        <div class="col-auto">
                                            <p class="text-right mt-10"
                                                style="margin-bottom: 0; color: #ff5370; font-size: 20px; font-weight: 800; line-height: 1.1;">
                                                @if ($reklama->price == null)
                                                    Келишим баада
                                                @else
                                                    {{ number_format($reklama->price / 100, 0, '.', ' ') }} 
                                                    @if ($reklama->valuta == 1)
                                                    сом
                                                    @elseif($reklama->valuta == 2)
                                                    доллар 
                                                    @endif
                                                    
                                                @endif
                                            </p>

                                        </div>
                                    </div>
                                    @if ($reklama->oblast == null)
                                        <div class="row">
                                            <div class="col"></div>
                                            <div class="col-auto">
                                                <h5 class="text-right mt-15"
                                                    style="margin-bottom: 0; color: #333; font-size: 16px; font-weight: 700; line-height: 1.1;">
                                                    {{ $reklama->poputka_taxi_raion_shaar_c->raion_shaar }}<span><i
                                                            class="fas fa-angle-right pr-10 pl-10"
                                                            style="color: #4099FF"></i></span>{{ $reklama->poputka_taxi_raion_shaar_b->raion_shaar }}<span><i
                                                            class="fas fa-angle-right pr-10 pl-10"
                                                            style="color: #4099FF"></i></span>
                                                    {{ date('d.m.Y', $reklama->poputka_taxi_dop_info_for_taxi->jolgo_chyguu_datasy) }}
                                                </h5>
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                    @endif
                                    <p class="mt-20 mb-5" style="font-size: 14px;">{{ $reklama->text }}
                                    </p>
                                    <p class="mt-10 mb-5 text-right" style="font-size: 12px;">Жарыяланган убактысы:
                                        {{ date('d.m.Y / H:i', strtotime($reklama->created_at)) }}</p>

                                    <div class="col-12 p-0 border-top">
                                        <div class="row pr-15 pl-15">
                                            <div class="col p-0">
                                                @if ($reklama->phone_z != null)
                                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            @php
                                                                $nomer2 = preg_replace('~[^0-9]+~', '', $reklama->phone_z);
                                                                $nomer3 = substr($nomer2, 1);
                                                            @endphp
                                                            <a class="nav-link for_nav_link mb-0 text_phone"
                                                                href="tel:+996{{ $nomer3 }}"
                                                                style="white-space: nowrap;"><i
                                                                    class="fas fa-phone-volume pr-10"
                                                                    style="font-size: 20px; color: #25D366; font-weight: 800;"></i>
                                                                {{ $reklama->phone_z }}</a>
                                                            <div class="slide"></div>
                                                        </li>
                                                    </ul>
                                                @endif
                                            </div>
                                            <div class="col  p-0">
                                                <ul class="nav nav-tabs md-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        @php
                                                            $nomerw2 = preg_replace('~[^0-9]+~', '', $reklama->phone_w);
                                                            $nomerw3 = substr($nomerw2, 1);
                                                        @endphp
                                                        <a class="nav-link for_nav_link mb-0 text_phone"
                                                            href="https://wa.me/+996{{ $nomerw3 }}"
                                                            style="white-space: nowrap;"><i
                                                                class="fab fa-whatsapp pr-10 pl-10"
                                                                style="font-size: 20px; color: #25D366; font-weight: 800;"></i>{{ $reklama->phone_w }}</a>
                                                        <div class="slide"></div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{ $reklams->links() }}
                    {{-- <div id="next-cursor" style="">{{$nextCursor}}</div>
                <div id="new-reklams"></div> --}}
                </div>
            @else
                <div class="pcoded-inner-content" style="height: 90vh;">
                    <div class="row text-center align-items-center mt-50 ">
                        <div class="col-auto"></div>
                        <div class="col mt-50">
                            <i class="fad fa-bell-on fa-lg mt-50 pt-50" style="font-size: 50px"></i>
                            <h5 class="text-center mt-50">Азырынча жарнама кошула элек</h5>
                        </div>
                        <div class="col-auto"></div>
                    </div>
                </div>

            @endif

        </div>
    </div>



    <button class="btn waves-effect waves-light btn-primary btn-icon md-trigger " data-toggle="modal"
        data-target="#exampleModal"
        style="position:fixed; right:15px; bottom:15px; width: 60px;
        height: 60px;  z-index:99999998;"><i
            class="fas fa-plus m-0 fa-lg"></i></button>
    {{-- <p class="text-center" style="color: aliceblue">Жарыя берүү <a href="https://wa.me/+996505919600}}"><i
                    class="fab fa-whatsapp pr-10 pl-10"
                    style="font-size: 18px; color: #25D366; font-weight: 800;"></i><span style="color: white;">0505 919
                    600 </span></a></p> --}}

    <div class="modal fade modal_plus" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg m-0">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row align-items-center modal2">
                        <div class="col-auto"><i class="fas fa-layer-group fa-lg"></i></div>
                        <div class="col">Жарнама берүү</div>
                    </div>
                    <div class="row align-items-center mt-30">
                        <div class="col-auto"><i class="fas fa-layer-group fa-lg"></i></div>
                        <div class="col">Жарнаманы оңдоо / өчүрүү</div>
                    </div>
                    <a href="https://wa.me/+996505919600" style="color: #f2f7fb; font-weight: 550 !important; font-size: 0.9375rem">
                        <div class="row align-items-center mt-30">
                            <div class="col-auto"><i class="fas fa-layer-group fa-lg"></i></div>
                            <div class="col">Администраторго суроо берүү</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal_plus2" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2"
        aria-hidden="true">
        <div class="modal-dialog modal-lg m-0">
            <div class="modal-content">
                <div class="modal-body">
                    <a href="{{ route('jarya_koshuu', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}"
                        style="color: #f2f7fb;
                    font-weight: 550 !important; font-size: 0.9375rem">
                        <div class="row align-items-center">
                            <div class="col-auto"><i class="fas fa-layer-group fa-lg"></i></div>
                            <div class="col">Тиркемеден жиберүү</div>
                        </div>
                    </a>
                    <a href="https://wa.me/+996505919600"
                        style="color: #f2f7fb;
                    font-weight: 550 !important; font-size: 0.9375rem">
                        <div class="row align-items-center mt-30">
                            <div class="col-auto"><i class="fas fa-layer-group fa-lg"></i></div>
                            <div class="col">WhatsApp'ка жиберүү</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>


    <script>
        $('body').click(function(event) {
            if (!$(event.target).closest('#exampleModal').length && !$(event.target).is('#exampleModal')) {
                // $("#exampleModal").removeClass('show');
                $(".modal_plus").modal('hide')
            }
            if (!$(event.target).closest('#exampleModal2').length && !$(event.target).is('#exampleModal2')) {
                // $("#exampleModal").removeClass('show');
                $(".modal_plus2").modal('hide')
            }
        });

        $(function() {
            $(".modal2").click(
                function() {
                    $('#exampleModal').modal('hide');

                    function greet() {
                        $('#exampleModal2').modal('show');
                    }
                    setTimeout(greet, 300);
                }
            );
        });


        // Сабак кошуу уведомление
        @if (session('success'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
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
                timer: 5000
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
                    $(location).attr('href', href);
                }
            );

        });

        $(document).ready(function() {
            if ($('.step').hasClass('active')) {
                $(this).children('step-trigger').css("background-color", "#0000000f");
            }
        });

        $(function() {
            $('ul.pagination').hide();
            $('.infinite-scroll').jscroll({
                autoTrigger: true,
                loadingHtml: '<div class="row" style="margin-bottom: 30px;"><div class="col"></div><div class="col-auto"><i class="fad fa-spinner fa-pulse fa-lg" style="--fa-primary-color: #1f62d6; --fa-secondary-color: #1f62d6; font-size: 50px;"></i></div><div class="col"></div></div>',
                padding: 500,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.infinite-scroll',
                callback: function() {
                    $('ul.pagination:visible:first').hide();
                }
            });
        });

        // меню появляется при прокрутке вверх
        var header = $('.bs-stepper-header'),
            scrollPrev = 0;
        $(window).scroll(function() {
            var scrolled = $(window).scrollTop();
            if (scrolled > 100 && scrolled > scrollPrev) {
                header.addClass('out');
            } else {
                header.removeClass('out');
            }
            scrollPrev = scrolled;
        });
        // меню появляется при прокрутке вверх



        // window.addEventListener('DOMContentLoaded', (e) => {
        //    window.addEventListener('scroll', (e) => {
        //     console.log('sc');
        //         if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight){
        //             let url = window.location.href;
        //             let nextCursor = document.getElementById('next-cursor').innerHTML || null;

        //             if(nextCursor)
        //             {
        //                 console.log('error1');
        //                 axios({
        //                     method: 'get',
        //                     url: url+'?cursor='+nextCursor,
        //                     responseType: 'json',
        //                     data: {
        //                         nextCursor: nextCursor,
        //                     }
        //                 })
        //                 .then((response) => {
        //                     console.log('error3');
        //                     document.getElementById('new-reklams').insertAdjacentHTML('beforeend', response.data.html+'<hr>');
        //                         document.getElementById('next-cursor').innerHTML = response.data.nextCursor;
        //                 })
        //                 .catch((error) => {
        //                     console.log(error);
        //                 })
        //             }
        //         }
        //         else{
        //             console.log('error2');
        //         }
        //     })
        // })
    </script>
    {{-- <i class="fad fa-spinner fa-pulse fa-lg" style="--fa-primary-color: #1f62d6; --fa-secondary-color: #1f62d6;"></i> --}}

@endsection
