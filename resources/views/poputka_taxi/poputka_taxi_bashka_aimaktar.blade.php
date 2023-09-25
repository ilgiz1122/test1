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
        .img_style{
            border-top-left-radius: 5px !important; 
            border-top-right-radius: 5px !important;
        }
        .text_phone{
            font-size: 16px;
            font-weight: 700;
            line-height: 1.1;
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


 
    <div class="pcoded-inner-content">
        sd
    </div>




    <div class="card ">

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
            $("#for_nav_link1").click(
                function() {
                    $("#for_nav_link1").addClass('active');
                    $("#for_nav_link2").removeClass('active');
                    $("#raspisanie").addClass('active');
                    $("#nastroiki").removeClass('active');
                }
            );
            $("#for_nav_link2").click(
                function() {
                    $("#for_nav_link2").addClass('active');
                    $("#for_nav_link1").removeClass('active');
                    $("#raspisanie").removeClass('active');
                    $("#nastroiki").addClass('active');
                }
            );
        });

        //  модальное окно
        $(function() {
            $(".td_div").click(
                function() {
                    var kunu = $(this).attr('data-kunu');
                    var ubaktysy = $(this).attr('data-ubaktysy');
                    var action = $(this).attr('data-action');

                    $(".kunu").text(kunu);
                    $(".ubaktysy").text(ubaktysy);
                    $(".plus_sabak_kunu").attr('href', action);
                })
        });
        //  модальное окно х
    </script>


@endsection
