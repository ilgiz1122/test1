@extends('layouts.ort_moderator_layouts')

@section('title', 'Панель')

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

            #summernote {
                padding-left: -25px;
                padding-right: -25px;
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

        .for_akcia {
            border-top: none;
            border-left: none;
            border-right: none;
            border: 1px solid #dee2e6;
            border-radius: 2px;
            width: 100%;
            width: 190px;
        }

        .for_akcia__1{
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: none;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
            color: #007bff;
        }
        .for_akcia__2{
            border-top: 1px solid #dee2e6;
            border-left: none;
            border-right: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
            color: #007bff;
        }

        .akcia:hover .for_akcia__1 {
            border-color: #007bff;
            color: #007bff;
            font-weight: 650;
        } 

        .akcia:hover .for_akcia__2 {
            border-color: #007bff;
            color: #007bff;
            font-weight: 650;
        }

        .akcia:hover .for_akcia {
            border: 1px solid #007bff;
            border-radius: 2px;
            color: #007bff;
            font-weight: 650;
        }

        .akcia:hover .b_color {
            border-color: #007bff !important;
        }

        

        .for_focus {
            border-top: none;
            border-left: none;
            border-right: none;
            border: 1px solid #dee2e6;
            border-radius: 0%;
            width: 100%;
            font-size: 1em;
            color: #007bff;
        }

        .price:hover .for_focus {
            border: 1px solid #007bff;
            border-radius: 2px;
        }

        .old_price:hover .for_focus {
            border: 1px solid #007bff;
            border-radius: 2px;
        }

        .for_focus:focus {
            border: 1px solid #007bff;
            background: #f2f7fb;
            border-radius: 2px;
            font-weight: 650;
            color: #007bff;
        }

        .note-group-select-from-files {
            display: none;
        }

        .note-toolbar {
            background: #f2f7fb;
        }

        table,
        td {
            padding: 0px !important;
            text-align: center;
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

        .td_div:hover .sabak_plus {
            transition: transform 300ms;
            transform: translateY(-5px);
            /* color: #3498DB; */
        }

        .sabak_plus {
            /* color: #fff; */
            color: #3498DB;
            will-change: transform;
            transition: transform 400ms;
        }

        .td_div:hover .sabak_text {
            transition: transform 300ms;
            transform: translateX(-5px);
        }

        .sabak_text {
            will-change: transform;
            transition: transform 400ms;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none; // Yeah, yeah everybody write about it
        }

        input[type='number'],
        input[type="number"]:hover,
        input[type="number"]:focus {
            appearance: none;
            -moz-appearance: textfield;
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

        .for_accordion_color{
            background: #93b0ff;
        }

        .for_accordion_text_color{
            color: black;
        }
        .for_accordion_text_color:hover{
            color: black;
        }
        .scale_active{
            color: black !important;
        }
        .date:hover{
            -webkit-box-shadow: 0 5px 25px -5px #ccc, 0 1px 5px 0 rgba(0, 0, 0, 0.1),
                0 0 0 0 transparent;
            box-shadow: 0 5px 25px -5px #ccc, 0 1px 5px 0 rgba(0, 0, 0, 0.1),
                0 0 0 0 transparent;
        }

        .date:hover .text_for_date{
            font-weight: 600;
            transition: transform 300ms;
            transform: translateX(-5px);
        }
        .text_for_date{
            color: #333;
            font-size: 15px;
            line-height: 1.1;
            will-change: transform;
            transition: transform 400ms;

            white-space: nowrap; /* Текст не переносится */
            overflow: hidden; /* Обрезаем всё за пределами блока */
            text-overflow: ellipsis; /* Добавляем многоточие */
        }

        .date-color{
            -webkit-box-shadow: 0 5px 25px -5px #ccc, 0 1px 5px 0 rgba(0, 0, 0, 0.1),
                0 0 0 0 transparent;
            box-shadow: 0 5px 25px -5px #ccc, 0 1px 5px 0 rgba(0, 0, 0, 0.1),
                0 0 0 0 transparent;
            color: green;
        }
        .date-text{
            color: green;
            font-weight: 600;
        }
    </style>



    <div class="page-header card margin1" style="margin-left: 10px; margin-right: 10px;">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="far fa-laptop-house bg-c-blue pt-5"></i>
                    <div class="d-inline">
                        <h5>Онлайн сабак</h5>
                        <span>Сабактын кошумча инструменттерин тууралоо</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title p-r-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('moderator_panel_ort') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('moderator_panel_ort_online_sabak') }}">Онлайн сабак</a> </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

 
@php
    $time = intval(date("m", time())); //из 1437556706 в 00.07.0000
    $aidyn_aty = array("авава","Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
@endphp
@php
    $onlain_sabak_urok_maks_data = $onlain_sabak_uroks->max('data_uroka');
    if ($onlain_sabak_urok_maks_data == null) {
        $j_jyl = date("Y", time());
        $j_ai = date("m", time());
    }else{
        $col_dney = date('t',$onlain_sabak_urok_maks_data);
        $f_jyl = date('Y',$onlain_sabak_urok_maks_data);
        $f_ai = date('m',$onlain_sabak_urok_maks_data);
        $posled_data = $f_jyl.'-'.$f_ai.'-'.$col_dney;
        $plus_ai = strtotime('+1 day', strtotime($posled_data));
        $j_jyl = date("Y", $plus_ai);
        $j_ai = date("m", $plus_ai);
    }
    
@endphp

    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <h5>{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}
                    <small>({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-группа)</small>
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
                                            class="far fa-stream pr-10"></i> Сабактардын тизмеси</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content card-block pr-0 pl-0 pb-5">
                        <div class="tab-pane  pr-5 pl-5" id="nastroiki" role="tabpanel"> 
                            

                            <div class="card-block accordion-block mt-40">
                                <div class="border-bottom" id="accordion" role="tablist" aria-multiselectable="true">
                                    
                                    @foreach($events as $key => $value)
                                    <div class="accordion-panel">
                                        <div class="accordion-heading @if($key == date("m", time())) for_accordion_color @endif" role="tab" id="heading_{{$loop->iteration}}">
                                            <div class="row align-items-center for_strelka">
                                                <div class="col pr-0">
                                                    <h3 class="card-title accordion-title">
                                                        <a class="accordion-msg @if($key == date("m", time())) for_accordion_text_color @endif" data-toggle="collapse" data-parent="#accordion"
                                                            href="#collapse_{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse_{{$loop->iteration}}" style="font-size: 16px">
                                                            {{$aidyn_aty[(int)$key]}}
                                                        </a>
                                                    </h3>
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <h3 class="card-title accordion-title">
                                                        <a class="accordion-msg" data-toggle="collapse" data-parent="#accordion"
                                                        href="#collapse_{{$loop->iteration}}" aria-expanded="true" aria-controls="collapse_{{$loop->iteration}}" style="font-size: 16px"><i class="far fa-chevron-right for_strelka2 @if($key == date("m", time())) fa-rotate-90 @endif"></i></a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="collapse_{{$loop->iteration}}" class="panel-collapse collapse in @if($key == date("m", time())) show @endif" role="tabpanel"
                                            aria-labelledby="heading_{{$loop->iteration}}">
                                            <div class="accordion-content accordion-desc pt-20 pl-0 pr-0">
                                                @foreach($value as $event)
                                                    <a href="{{ route('ort_moderator_online_sabak_kunu_edit', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id, 'online_sabak_kunu_id' => $event->id]) }}">
                                                        <div class="date @if(date("d-m-Y", $event->data_uroka) == date("d-m-Y", time())) date-color @endif pt-15 pb-15 pr-20 pl-20">
                                                            <h6 class="text_for_date @if(date("d-m-Y", $event->data_uroka) == date("d-m-Y", time())) date-text @endif mb-0">{{date("d-m-Y", $event->data_uroka)}}</h6>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @php
                                $onlain_sabak_days_count = $onlain_sabak_days->count();
                            @endphp
                            @if ($onlain_sabak_days_count > 0)
                            <div class="row pt-40 mb-10">
                                <div class="col"></div>
                                <div class="col-auto">
                                    <button class="btn waves-effect waves-light btn-primary btn-md btn-mat" data-toggle="modal" data-target="#pluse_dni">
                                        <span class="p-10"><i class="fas fa-plus pr-10"></i> @if ($onlain_sabak_urok_maks_data == null) {{$aidyn_aty[(int)$time]}} @else {{$aidyn_aty[(int)$j_ai]}} @endif айы үчүн сабак кошуу
                                        </span>
                                    </button>
                                </div>
                            </div>
                            @else
                            <p class="mt-50 text-center mb-50">Азырынча күндөрдү белгилей элексиз</p>
                            @endif
                        </div>
                        <div class="tab-pane active" id="raspisanie"
                            role="tabpanel">
                            <p class="text-center mt-40">{{$aidyn_aty[$time]}}</p>
                            <div class="table-responsive border-top">
                                <table class="table table-hover  table-bordered align-middle overflow-x mb-0">
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
        


        <div class="modal fade" id="pluse_dni" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Күндөрдү түзүү</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                                class="fal fa-times" style="font-size: 24px;"></i></button>
                    </div>
                    <div class="modal-body">
                        <div class="row align-items-center mb-25 mt-30">
                            <div class="col-auto">
                                <p class="m-0 pb-5">Айы</p>
                            </div>
                            <div class="col">
                                <hr class="m-0">
                            </div>
                            <div class="col-auto">
                                <p class="m-0 pb-5">@if ($onlain_sabak_urok_maks_data == null) {{$aidyn_aty[(int)$time]}} @else {{$aidyn_aty[(int)$j_ai]}} @endif</p>
                            </div>
                        </div>
                        <div class="row align-items-center mb-25">
                            <div class="col-auto">
                                <p class="m-0 pb-5">Күндөрү</p>
                            </div>
                            <div class="col pr-0">
                                <hr class="m-0">
                            </div>
                            <div class="col-auto text-right border-left pl-0">
                                @foreach ($onlain_sabak_days as $onlain_sabak_day) @if ($onlain_sabak_day->den_nedeli == 1) <p class="m-0 pb-5 pl-10">Дүйшөмбү / Пн.</p> @endif @if ($onlain_sabak_day->den_nedeli == 2) <p class="m-0 pb-5 pl-10">Шейшемби / Вт.</p> @endif @if ($onlain_sabak_day->den_nedeli == 3) <p class="m-0 pb-5 pl-10">Шаршемби / Ср.</p> @endif @if ($onlain_sabak_day->den_nedeli == 4) <p class="m-0 pb-5 pl-10">Бейшенби / Чт.</p> @endif @if ($onlain_sabak_day->den_nedeli == 5) <p class="m-0 pb-5 pl-10">Жума / Пт.</p> @endif @if ($onlain_sabak_day->den_nedeli == 6) <p class="m-0 pb-5 pl-10">Ишемби / Сб.</p> @endif @if ($onlain_sabak_day->den_nedeli == 7) <p class="m-0 pb-5 pl-10">Жекшемби / Вс.</p> @endif @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect"
                            data-dismiss="modal">Жабуу</button>
                        <a type="button" class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20 plus_sabak_kunu" href="{{ route('ort_moderator_sabak_plus_dni', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id]) }}"><i class="far fa-plus pr-10"></i>Кошуу</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sabak_kunu_delet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Сабакты өчүрүү</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                                class="fal fa-times" style="font-size: 24px;"></i></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}
                            <small>({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-г.)</small>
                        </p>
                        <div class="row align-items-center mb-25 mt-30">
                            <div class="col-auto">
                                <p class="m-0 pb-5">Күнү</p>
                            </div>
                            <div class="col">
                                <hr class="m-0">
                            </div>
                            <div class="col-auto">
                                <p class="m-0 pb-5 kunu"></p>
                            </div>
                        </div>
                        <div class="row align-items-center mb-25">
                            <div class="col-auto">
                                <p class="m-0 pb-5">Убактысы</p>
                            </div>
                            <div class="col">
                                <hr class="m-0">
                            </div>
                            <div class="col-auto">
                                <p class="m-0 pb-5 ubaktysy"></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect "
                            data-dismiss="modal">Жабуу</button>
                        <a type="button"
                            class="btn btn-mat waves-effect waves-light btn-danger float-right pr-20 pl-20 plus_sabak_kunu"
                            href=""><i class="far fa-trash pr-10"></i>Өчүрүү</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card ">

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
    <script>
        window.onload = function() {
            autosize(document.querySelectorAll('textarea'));
        }
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
            $(".for_strelka").click(
                function() {
                    if($(this).children('.col-auto').children().children().children('.for_strelka2').hasClass('fa-rotate-90')){
                        $(this).children('.col-auto').children().children().children('.for_strelka2').removeClass('fa-rotate-90');
                    }else{
                        $(this).children('.col-auto').children().children().children('.for_strelka2').addClass('fa-rotate-90');
                    }
                    if($(this).children('.col').children().children('.accordion-msg').hasClass('fa-rotate-90')){
                        $(this).children('.col').children().children('.accordion-msg').removeClass('for_accordion_text_color');
                    }else{
                        $(this).children('.col').children().children('.accordion-msg').addClass('for_accordion_text_color');
                    }
                }
            );
            $(".accordion-heading").click(
                function() {
                    if($(this).hasClass('for_accordion_color')){
                        $(this).removeClass('for_accordion_color');
                    }else{
                        $(this).addClass('for_accordion_color');
                    }
                }
            );
        });

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
                text: '{{ session('success') }}'
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
                icon: 'error',
                text: '{{ session('false') }}'
            });
        @endif
        // уведомление2 х
        //  уведомление2
        @if (session('false_price'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'error',
                text: '{{ session('false_price') }}'
            });
        @endif
        // уведомление2 х
        //  уведомление2
        @if (session('false_data'))
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            Toast.fire({
                icon: 'error',
                text: '{{ session('false_data') }}'
            });
        @endif
        // уведомление2 х

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
        @foreach ($onlain_sabak_days1 as $onlain_sabak_day)
            $(".ddffdd").append(
                '<tr><td><div class="td_div2"><p class="mb-0 pt-5">@if ($onlain_sabak_day->nachalo_uroka < 10) 0{{ $onlain_sabak_day->nachalo_uroka }}:00 / 0{{ $onlain_sabak_day->nachalo_uroka }}:50 @else {{ $onlain_sabak_day->nachalo_uroka }}:00 / {{ $onlain_sabak_day->nachalo_uroka }}:50 @endif</p></div></td><td @if (strtotime('Monday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="1_{{ $onlain_sabak_day->nachalo_uroka }}"></td><td @if (strtotime('Tuesday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="2_{{ $onlain_sabak_day->nachalo_uroka }}"></td><td @if (strtotime('Wednesday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="3_{{ $onlain_sabak_day->nachalo_uroka }}"></td><td @if (strtotime('Thursday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="4_{{ $onlain_sabak_day->nachalo_uroka }}"></td><td @if (strtotime('Friday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="5_{{ $onlain_sabak_day->nachalo_uroka }}"></td><td @if (strtotime('Saturday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="6_{{ $onlain_sabak_day->nachalo_uroka }}"></td><td @if (strtotime('sunday this week') == strtotime(date("Y-m-d", time()))) style="background-color: #ebf5ff;" @endif class="7_{{ $onlain_sabak_day->nachalo_uroka }}"></td></tr>'
            );
        @endforeach
        @foreach ($onlain_sabak_days as $onlain_sabak_day)
            $(".{{ $onlain_sabak_day->den_nedeli }}_{{ $onlain_sabak_day->nachalo_uroka }}").children().remove();
            $(".{{ $onlain_sabak_day->den_nedeli }}_{{ $onlain_sabak_day->nachalo_uroka }}").append(
                '<div class="td_div"> <p class="mb-0 sabak_text"> <small>{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }} ({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-г)</small></p></div>'
            );
        @endforeach
    </script>
@endsection
<!--


-->
