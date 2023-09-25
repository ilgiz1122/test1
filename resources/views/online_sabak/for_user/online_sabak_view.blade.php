@extends('layouts.ort_user_layouts')

@section('title', 'Онлайн сабак')

@section('content')
    <style>
        .margin1 {
            margin-left: 10px;
            margin-right: 10px;

        }

        @media screen and (min-width: 768px) {
            .overflow-x {
                overflow: auto;
            }
        }

        @media screen and (max-width: 768px) {
            .td_div {
                padding: 5px !important;
            }

            .for-padding {
                padding-top: 40px;
            }

            .td_div2 {
                padding: 5px !important;
            }

            th {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
        }

        .for_one_table
        td {
            padding: 0px !important;
            text-align: center !important;
        }

        .for_one_table
        th {
            text-align: center !important;
        }


        .td_div {
            padding: 10px;
            border: 2px solid #fff;
        }

        .td_div2 {
            padding: 10px;
        }

        .td_div:hover {
            border: 2px solid #007bff;
            background: #fff;
            cursor: pointer;
        }

       

        .td_div:hover .sabak_text {
            transition: transform 300ms;
            transform: translateX(-5px);
        }

        .sabak_text {
            will-change: transform;
            transition: transform 400ms;
        }



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
    </style>



    <div class="page-header card margin1" style="margin-left: 10px; margin-right: 10px;">
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
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title p-r-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('ort_view1', ['subdomain' => 'ort']) }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Онлайн сабак</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    

    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <h5>Маалымат тактасы
                    <small></small>
                </h5>
            </div>
            <div class="card-block pb-0 pl-5 pr-5">
                <div class="col-12 p-0">
                    <div class="row pr-15 pl-15">
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link active mb-0"
                                        id="for_nav_link1" data-toggle="tab" href="#raspisanie" role="tab"
                                        aria-selected="true" style="white-space: nowrap;"><i
                                            class="far fa-calendar-alt pr-10"></i> Расписание</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link2" data-toggle="tab"
                                        href="#nastroiki" role="tab" aria-selected="false" style="white-space: nowrap;"><i
                                            class="feather icon-settings pr-10 pl-10"></i></a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="tab-content card-block pr-0 pl-0 pb-5">
                        <div class="tab-pane  pr-5 pl-5" id="nastroiki" role="tabpanel">
                            
                        </div>
                        <div class="tab-pane active" id="raspisanie"
                            role="tabpanel">
                            @php
                                $time = intval(date("m", time())); //из 1437556706 в 22.07.2015
                                $aidyn_aty = array("0","Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
                            @endphp
                            <p class="text-center mt-40">{{$aidyn_aty[$time]}}</p>
                            <div class="table-responsive border-top">
                                <table class="table table-hover  table-bordered align-middle overflow-x mb-0 for_one_table">
                                    <thead>
                                        <tr>
                                            <th class="pl-15 pr-15">
                                                <div class="d-inline-block align-middle">
                                                    <p class="mb-0"><i class="fas fa-chevron-left pr-15 pb-10" style="font-size: 20px;"></i> <i class="fas fa-chevron-right pl-15 pb-10" style="font-size: 20px;"></i></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('Monday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle">
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('Monday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Пн</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('Monday this week'))}}</small></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('Tuesday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle">
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('Tuesday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Вт</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('Tuesday this week'))}}</small></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('Wednesday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle">
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('Wednesday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Ср</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('Wednesday  this week'))}}</small></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('Thursday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle">
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('Thursday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Чт</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('Thursday  this week'))}}</small></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('Friday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle">
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('Friday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Пт</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('Friday this week'))}}</small></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('Saturday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle">
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('Saturday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Сб</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('Saturday  this week'))}}</small></p>
                                                </div>
                                            </th>
                                            <th @if (strtotime('sunday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif>
                                                <div class="d-inline-block align-middle" >
                                                    <div class="row align-items-center">
                                                        <div class="col p-0"></div>
                                                        @if (strtotime('sunday this week') == strtotime(date("Y-m-d", time())))
                                                        <div class="col-auto float-right pl-0 pr-10">
                                                            <div class="blob blue"></div>
                                                        </div>
                                                        @endif
                                                        <div class="col-auto p-0"><p class="mb-0">Вс</p></div>
                                                        <div class="col p-0"></div>
                                                    </div>
                                                    <p class="text-muted mb-0"><small>{{date("d-m-Y", strtotime('sunday this week'))}}</small></p>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="ddffdd">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    
        <script>
            
            
            @foreach ($onlain_sabak_days as $onlain_sabak_day)
                @if($onlain_sabak_day->onlain_sabak_predmet_sabak->status == 1)

                if($('.ddffdd').children('.vv{{ $onlain_sabak_day->nachalo_uroka }}').length > 0) {
                    $(".{{ $onlain_sabak_day->den_nedeli }}_{{ $onlain_sabak_day->nachalo_uroka }}").append(
                        '<div class="td_div for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" data-id_hover="for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}"><a href="{{ route('user_online_sabak_one_view', ['subdomain' => 'ort', 'onlain_sabak_id' => $onlain_sabak_day->onlain_sabak_predmet_sabak->id]) }}"> <p class="mb-0 sabak_text"> <small>{{ $onlain_sabak_day->onlain_sabak_predmety->predmet_title }} ({{ $onlain_sabak_day->onlain_sabak_predmet_sabak->nomer_gruppy }}-г)</small></p><p class="mb-0 sabak_text"><small><i class="fas fa-user-tie btn-tool pr-5"></i> {{ $onlain_sabak_day->user->name }}</small></p></a></div>'
                    );
                    $( ".for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" ).mouseover(function() {
                        $('.for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}').css({
                            'border': '2px solid #007bff',
                            'background': '#fff',
                            'cursor': 'pointer',
                        });
                    });
                    $( ".for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" ).mouseout(function() {
                        $('.for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}').attr('style', '');
                    });
                }else{
                    $(".ddffdd").append(
                        '<tr class="vv{{ $onlain_sabak_day->nachalo_uroka }}"><td class="align-middle"><div class="td_div2"><p class="mb-0 pt-5">@if ($onlain_sabak_day->nachalo_uroka < 10) 0{{ $onlain_sabak_day->nachalo_uroka }}:00 / 0{{ $onlain_sabak_day->nachalo_uroka }}:50 @else {{ $onlain_sabak_day->nachalo_uroka }}:00 / {{ $onlain_sabak_day->nachalo_uroka }}:50 @endif</p></div></td><td @if (strtotime('Monday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="1_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td><td @if (strtotime('Tuesday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="2_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td><td @if (strtotime('Wednesday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="3_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td><td @if (strtotime('Thursday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="4_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td><td @if (strtotime('Friday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="5_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td><td @if (strtotime('Saturday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="6_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td><td @if (strtotime('sunday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="7_{{ $onlain_sabak_day->nachalo_uroka }} align-middle"></td></tr>'
                    );

                    $(".{{ $onlain_sabak_day->den_nedeli }}_{{ $onlain_sabak_day->nachalo_uroka }}").append(
                        '<div class="td_div for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" data-id_hover="for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}"><a href="{{ route('user_online_sabak_one_view', ['subdomain' => 'ort', 'onlain_sabak_id' => $onlain_sabak_day->onlain_sabak_predmet_sabak->id]) }}"> <p class="mb-0 sabak_text"> <small>{{ $onlain_sabak_day->onlain_sabak_predmety->predmet_title }} ({{ $onlain_sabak_day->onlain_sabak_predmet_sabak->nomer_gruppy }}-г)</small></p><p class="mb-0 sabak_text"><small><i class="fas fa-user-tie btn-tool pr-5"></i> {{ $onlain_sabak_day->user->name }}</small></p></a></div>'
                    );
                    $( ".for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" ).mouseover(function() {
                        $('.for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}').css({
                            'border': '2px solid #007bff',
                            'background': '#fff',
                            'cursor': 'pointer',
                        });
                    });
                    $( ".for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" ).mouseout(function() {
                        $('.for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}').attr('style', '');
                    });
                }
                @endif
            @endforeach
        </script>
@endsection
