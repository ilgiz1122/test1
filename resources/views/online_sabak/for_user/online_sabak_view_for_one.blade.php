@extends('layouts.ort_user_layouts')

@section('title', 'Онлайн сабак')

@section('content')
<link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
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

        .add-read-more.show-less-content .second-section,
        .add-read-more.show-less-content .read-less {
        display: none;
        }

        .add-read-more.show-more-content .read-more {
        display: none;
        }

        .add-read-more .read-more,
        .add-read-more .read-less {
            font-weight: bold;
            margin-left: 2px;
            color: #007bff;
            cursor: pointer;
            font-style: italic;
        }




        .numbers {
            font-family: 'Montserrat', sans-serif;
            color: #183059;
            font-size: 2.5em;
        }
        .tur_title {
            font-family: 'Montserrat', sans-serif;
            color: green;
            font-size: 1em;
        }
        .tur_title2 {
            font-family: 'Montserrat', sans-serif;
            color: red;
            font-size: 1em;
        }
        .countdown-text{
            font-family: 'Lato', sans-serif;
            text-transform: uppercase;
            font-size: .7em;
            letter-spacing: 1px;
            color: #183059;
        }

        .deadline-message{
            display: none;
            font-size: 24px;
            font-style: italic;
        }

        .visible{
            display: block;
        }
        .hidden{
            display: none;
        }

        .countdown002 {
            display: inline-block;
        }
        .countdown-number002 {
            display: inline-block;
        }
        .countdown-time002 {
            display: inline-block;
        }
        .deadline-message002{
            display: none;
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

@php
    $time = intval(date("m", time())); //из 1437556706 в 00.07.0000
    $aidyn_aty = array("авава","Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
@endphp

    <div class="page-header card margin1" style="margin-left: 10px; margin-right: 10px;">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Онлайн сабак</h5>
                        @if (Auth::user())
                            @if ($proverka != null)
                                <span>Сизде бул сабакка {{date('d-m-Y', $proverka->data_okonchanie_dostupa)}} чейин доступ бар</span>
                            @else
                                <span>Сабактарга катышып, билимиңди жогорулат!</span>
                            @endif
                        @else
                            <span>Сабактарга катышып, билимиңди жогорулат!</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title p-r-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('ort_view1', ['subdomain' => 'ort']) }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('user_online_sabak_view', ['subdomain' => 'ort']) }}">Онлайн сабак</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{$onlain_sabak->onlain_sabak_predmety->predmet_title}} ({{ $onlain_sabak->nomer_gruppy }}-г)</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="pcoded-inner-content">
        <div class="row">
            <div class="col-md-9">

                @if($onlain_sabak->akcia == 1 and $onlain_sabak->akcia_data_okonchanie > time())
                    <div class="card table-card">
                        <div class="card-header">
                            <h5 style="color: red; font-family: 'Montserrat', sans-serif; font-size: 1em;"><b>Шашылгыла АКЦИЯ</b>
                                <small></small>
                            </h5>
                        </div>
                        <div class="card-block pb-0 pl-5 pr-5">
                            <p class="text-center tur_title mt-15">Акциянын бүтүшүнө аз калды</p>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8 text-center">
                                    <div id="deadline-message" class="deadline-message">
                                    <b style="color: red;">Убакыт бүттү!</b>
                                    </div>
                                    <div id="countdown" class="row countdown">
                                        <div class="col mt-5 mb-5 mr-5 ml-15 pt-0 pb-5 pl-0 pr-0 text-center" style="background: #ffb64d; border-radius: 4px;">
                                            <span class="days numbers"></span><br>
                                            <b><span class="countdown-text mb-5">Күн</span></b>
                                        </div>
                                        <div class="col m-5 text-center pt-0 pb-5 pl-0 pr-0" style="background: #ffb64d; border-radius: 4px;">
                                            <span class="hours numbers"></span><br>
                                            <b><span class="countdown-text mb-5">Саат</span></b>
                                        </div>
                                        <div class="col m-5 text-center pt-0 pb-5 pl-0 pr-0" style="background: #ffb64d; border-radius: 4px;">
                                            <span class="minutes numbers"></span><br>
                                            <b><span class="countdown-text mb-5">Мүнөт</span></b>
                                        </div>
                                        <div class="col mt-5 mb-5 mr-15 ml-5 text-center pt-0 pb-5 pl-0 pr-0" style="background: #ffb64d; border-radius: 4px;">
                                            <span class="seconds numbers"></span><br>
                                            <b><span class="countdown-text mb-5">Секунд</span></b>
                                        </div>
                                    </div>
                                    <h5 class="mt-35">Бир айга болгону <span class="pr-5 pl-15" style="color: green; font-family: 'Montserrat', sans-serif; font-size: 2em;">{{$onlain_sabak->akcia_price / 100}}</span> сом</h5>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <div class="text-right mt-30">
                                @if (Auth::user())
                                    @if ($proverka != null)
                                        <p><b>Сизде бул сабакка {{date('d-m-Y', $proverka->data_okonchanie_dostupa)}} чейин доступ бар</b></p>
                                    @else
                                        <button class="btn waves-effect waves-light btn-primary btn-md btn-mat mb-10 mr-5" data-toggle="modal"
                                        data-target="#large-Modal" type="button">
                                            <span class="p-20"><i class="far fa-shopping-cart pr-10"></i> Сатып алуу</span>
                                        </button>
                                    @endif
                                @else
                                    <button class="btn waves-effect waves-light btn-primary btn-md btn-mat mb-10 mr-5" data-toggle="modal"
                                    data-target="#large-Modal" type="button">
                                        <span class="p-20"><i class="far fa-shopping-cart pr-10"></i> Сатып алуу</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif


                <div class="card table-card">
                    <div class="card-header">
                        <h5>{{$onlain_sabak->onlain_sabak_predmety->predmet_title}} ({{ $onlain_sabak->nomer_gruppy }}-г)
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
                                                    class="far fa-calendar-alt pr-10"></i> Маалымат</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col border-bottom p-0">
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link for_nav_link mb-0" id="for_nav_link2" data-toggle="tab"
                                                href="#nastroiki" role="tab" aria-selected="false" style="white-space: nowrap;"><i
                                                    class="feather icon-settings pr-10 pl-10"></i> Өтүлгөн сабактар</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
        
        
                            <div class="tab-content card-block pr-10 pl-10 pb-5">
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
                                                            <a type="button" class="click_day">
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
                                </div>
                                <div class="tab-pane active" id="raspisanie" role="tabpanel">
                                    @php
                                        $time = intval(date("m", time())); //из 1437556706 в 22.07.2015
                                        $aidyn_aty = array("0","Январь","Февраль","Март","Апрель","Май","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь");
                                    @endphp
                                    <div class=" mb-30 mt-50">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <p class="m-0 pb-5">Группадагы окуучулардын саны
                                                    <i class="fal fa-info-circle" type="button" data-toggle="tooltip"
                                                        data-placement="top"
                                                        title="Группадагы окуучулардын максималдуу саны {{ $onlain_sabak->col_uchenikov }}."
                                                        style="color: #007bff"></i>
                                                </p>
                                            </div>
                                            <div class="col">
                                                <hr class="m-0">
                                            </div>
                                            <div class="col-auto">
                                                <p class="m-0 pb-5">{{$col_pokupok}} / {{ $onlain_sabak->col_uchenikov }}</p>
                                            </div>
                                        </div>
                                        <div  id="readmore" class="mt-35 mb-35 add-read-more show-less-content"> 
                                            {!! $onlain_sabak->opisanie !!}
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="row">
                                            <div class="col-md pt-10 pb-10">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <p class="m-0 pb-5">Баасы <small>(бир ай үчүн)</small></p>
                                                    </div>
                                                    <div class="col border-bottom text-right">
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="m-0 pb-5">{{ $onlain_sabak->price / 100 }} сом</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto p-0 border-left border-right pt-10 pb-10"></div>
                                            @if ($onlain_sabak->old_price != null)
                                            <div class="col-md pt-10 pb-10">
                                                <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <p class="m-0 pb-5">Мурдагы баасы</p>
                                                    </div>
                                                    <div class="col border-bottom text-right">
                                                        
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="m-0 pb-5 text-danger"><del>{{ $onlain_sabak->old_price / 100 }} сом</del></p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>

                                       @if (($onlain_sabak->uch_ai_akcia + $onlain_sabak->alty_ai_akcia + $onlain_sabak->toguz_ai_akcia + $onlain_sabak->bir_jyl_akcia) > 0)
                                        <div class="row mt-35 pl-5 pr-5">
                                            <div class="col-xl-4 col-md-6 py-0 px-2">
                                                <div class="card prod-p-card mb-20" style="color: #007bff; border-top: solid 5px;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-30">
                                                            <div class="col">
                                                                <h6 class="mb-5 text-pink">1 ай</h6>
                                                                <h3 class="mb-0 f-w-700 text-pink">{{ $onlain_sabak->price / 100 }} сом</h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="fas fa-money-bill-alt text-c-blue f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 text-primary">
                                                            <span class="h6 f-w-500">-0%</span>
                                                            <span class="float-right">
                                                                <span class="h5 f-w-600">0</span> сом эконом
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($onlain_sabak->uch_ai_akcia > 0)
                                            <div class="col-xl-4 col-md-6 py-0 px-2">
                                                <div class="card prod-p-card mb-20" style="color: #007bff; border-top: solid 5px;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-30">
                                                            <div class="col">
                                                                <h6 class="mb-5 text-pink">3 ай</h6>
                                                                <h3 class="mb-0 f-w-700 text-pink">{{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->uch_ai_akcia) * 3) / 100) }} сом</h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="far fa-shopping-cart text-c-blue f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 text-primary">
                                                            <span class="h6 f-w-500">-{{$onlain_sabak->uch_ai_akcia}}%</span>
                                                            <span class="float-right">
                                                                <span class="h5 f-w-600">{{ round(((($onlain_sabak->price / 100) * $onlain_sabak->uch_ai_akcia) * 3) / 100)}}</span> сом эконом
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($onlain_sabak->alty_ai_akcia > 0)
                                            <div class="col-xl-4 col-md-6 py-0 px-2">
                                                <div class="card prod-p-card mb-20" style="color: #007bff; border-top: solid 5px;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-30">
                                                            <div class="col">
                                                                <h6 class="mb-5 text-pink">6 ай</h6>
                                                                <h3 class="mb-0 f-w-700 text-pink">
                                                                    {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->alty_ai_akcia) * 6) / 100) }} сом
                                                                </h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="far fa-shopping-cart text-c-blue f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 text-primary">
                                                            <span class="h6 f-w-500">-{{$onlain_sabak->alty_ai_akcia}}%</span>
                                                            <span class="float-right">
                                                                <span class="h5 f-w-600">{{ round(((($onlain_sabak->price / 100) * $onlain_sabak->alty_ai_akcia) * 6) / 100)}}</span> сом эконом
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($onlain_sabak->toguz_ai_akcia > 0)
                                            <div class="col-xl-4 col-md-6 py-0 px-2">
                                                <div class="card prod-p-card mb-20"  style="color: #dc3545; border-top: solid 5px;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-30">
                                                            <div class="col">
                                                                <h6 class="mb-5 text-danger">9 ай</h6>
                                                                <h3 class="mb-0 f-w-700 text-danger">
                                                                    {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->toguz_ai_akcia) * 9) / 100) }} сом
                                                                </h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="far fa-shopping-cart text-c-red f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 text-primary">
                                                            <span class="h6 f-w-500">-{{$onlain_sabak->toguz_ai_akcia}}%</span>
                                                            <span class="float-right">
                                                                <span class="h5 f-w-600">{{ round(((($onlain_sabak->price / 100) * $onlain_sabak->toguz_ai_akcia) * 9) / 100)}}</span> сом эконом
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @if ($onlain_sabak->bir_jyl_akcia > 0)
                                            <div class="col-xl-4 col-md-6 py-0 px-2">
                                                <div class="card prod-p-card mb-20" style="color: #dc3545; border-top: solid 5px;">
                                                    <div class="card-body">
                                                        <div class="row align-items-center mb-30">
                                                            <div class="col">
                                                                <h6 class="mb-5 text-danger">1 жыл</h6>
                                                                <h3 class="mb-0 f-w-700 text-danger">
                                                                    {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->bir_jyl_akcia) * 12) / 100) }} сом
                                                                </h3>
                                                            </div>
                                                            <div class="col-auto">
                                                                <i class="far fa-shopping-cart text-c-red f-18"></i>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0 text-primary">
                                                            <span class="h6 f-w-500">-{{$onlain_sabak->bir_jyl_akcia}}%</span>
                                                            <span class="float-right">
                                                                <span class="h5 f-w-600">{{ round(((($onlain_sabak->price / 100) * $onlain_sabak->bir_jyl_akcia) * 12) / 100)}}</span> сом эконом
                                                            </span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                        
                                        <div class="text-center mt-50">
                                            @if (Auth::user())
                                                @if ($proverka != null)
                                                    <p><b>Сизде бул сабакка {{date('d-m-Y', $proverka->data_okonchanie_dostupa)}} чейин доступ бар</b></p>
                                                @else
                                                    <button class="btn waves-effect waves-light btn-primary btn-md btn-mat mb-10 mr-5" data-toggle="modal"
                                                    data-target="#large-Modal" type="button">
                                                        <span class="p-20"><i class="far fa-shopping-cart pr-10"></i> Сатып алуу</span>
                                                    </button>
                                                @endif
                                            @else
                                                <button class="btn waves-effect waves-light btn-primary btn-md btn-mat mb-10 mr-5" data-toggle="modal"
                                                data-target="#large-Modal" type="button">
                                                    <span class="p-20"><i class="far fa-shopping-cart pr-10"></i> Сатып алуу</span>
                                                </button>
                                            @endif
                                        </div>
                                        

                                    </div>

                                    <p class="text-center mt-40"><b>Расписание </b>({{$aidyn_aty[$time]}})</p>
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
            <div class="col-md-3">
                <div class="card table-card stickme">
                    <div class="card-header">
                        <h5><b>Ментор</b>
                            <small></small>
                        </h5>
                    </div>
                    <div class="card-block pb-0 pl-5 pr-5">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8 text-center">
                                @if($onlain_sabak->user->img_600_600 == null)
                                    <img src="{{ asset('/admin/dist/img/user-icon.svg') }}" class="img-fluid img-circle"  alt="{{$onlain_sabak->user->name}}" style="border: 3px solid; border-radius: 50%; border-color: #4099ff;">
                                    @else
                                    <img src="{{ asset('/storage/users/org_img/') }}/{{ $onlain_sabak->user->org_img }}" class="img-fluid img-circle"  alt="{{$onlain_sabak->user->name}}" style="border: 3px solid; border-radius: 50%; border-color: #4099ff;">
                                @endif
                            </div>
                            <div class="col-2"></div>
                        </div>
                        <p class="mt-20 mb-40 text-center">
                            @if($onlain_sabak->user->f_fio != null)
                                <span>{{$onlain_sabak->user->f_fio}} {{$onlain_sabak->user->i_fio}} {{$onlain_sabak->user->o_fio}}</span>
                            @else
                                <span>{{$onlain_sabak->user->name}}</span>
                            @endif
                        </p>      
                        <p>
                                <span><i class="fas fa-map-marker-alt pr-5 pl-5 text-muted"></i></span>
                                @if($onlain_sabak->user->oblast_id != null)<span>{{$onlain_sabak->user->oblast->title}} обл.</span>@endif
                                @if($onlain_sabak->user->raion_shaar_id != null)<span> / {{$onlain_sabak->user->raion_shaar->title}}</span>@endif
                                @if($onlain_sabak->user->aiyl_title != null)<span> / {{$onlain_sabak->user->aiyl_title}}</span>@endif
                                @if($onlain_sabak->user->mektep_title != null)<span> / {{$onlain_sabak->user->mektep_title}}</span>@endif
                        </p>
                        @if($onlain_sabak->user->phone != null)
                            <p>
                                <span><i class="fas fa-phone pr-5 pl-5 text-muted"></i>
                                    <a href="tel:+996{{preg_replace('~[^0-9]+~','', substr($onlain_sabak->user->phone, 1))}}">{{$onlain_sabak->user->phone}}</a>
                                </span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$onlain_sabak->onlain_sabak_predmety->predmet_title}} ({{ $onlain_sabak->nomer_gruppy }}-г)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                            class="fal fa-times" style="font-size: 24px;"></i></button>
                </div>
                <form action="{{ route('ort_online_sabak_satyp_aluu', ['subdomain' => 'ort', 'onlain_sabak_id' => $onlain_sabak->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="col-12 mb-30 mt-20">
                            @php
                                $count_sabaks_v_nedelu = $onlain_sabak_days->count();
                            @endphp
                            <p class="text-center"><b>Сабак жумасына {{$count_sabaks_v_nedelu}} жолу өтүлөт.</b></p>
                            @if($onlain_sabak->akcia == 1 and $onlain_sabak->akcia_data_okonchanie > time())
                                <div class="border-checkbox-section border-bottom b_color mt-25">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox check_price" type="checkbox" id="checkbox_0_1" name="check_price" checked value="0">
                                        <label class="border-checkbox-label" for="checkbox_0_1">
                                            <span class="pl-10">1 ай үчүн - {{$onlain_sabak->akcia_price / 100}} сом <small>(акция менен)</small></span>
                                        </label>
                                    </div>
                                </div>
                            @else
                                <div class="border-checkbox-section border-bottom b_color mt-25">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox check_price" type="checkbox" id="checkbox_0_1" name="check_price" checked value="1">
                                        <label class="border-checkbox-label" for="checkbox_0_1">
                                            <span class="pl-10">1 ай үчүн - {{$onlain_sabak->price / 100}} сом</span>
                                        </label>
                                    </div>
                                </div>
                            @endif


                            @if ($onlain_sabak->uch_ai_akcia > 0)
                            <div class="border-checkbox-section border-bottom b_color mt-25">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input class="border-checkbox check_price" type="checkbox" id="checkbox_0_2" name="check_price" value="2">
                                    <label class="border-checkbox-label" for="checkbox_0_2">
                                        <span class="pl-10">3 ай үчүн - {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->uch_ai_akcia) * 3) / 100) }} сом <small>({{ round(((($onlain_sabak->price / 100) * $onlain_sabak->uch_ai_akcia) * 3) / 100)}} сом эконом)</small></span>
                                    </label>
                                </div>
                            </div>
                            @endif
                            @if ($onlain_sabak->alty_ai_akcia > 0)
                            <div class="border-checkbox-section border-bottom b_color mt-25">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input class="border-checkbox check_price" type="checkbox" id="checkbox_0_3" name="check_price" value="3">
                                    <label class="border-checkbox-label" for="checkbox_0_3">
                                        <span class="pl-10">6 ай үчүн - {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->alty_ai_akcia) * 6) / 100) }} сом <small>({{ round(((($onlain_sabak->price / 100) * $onlain_sabak->alty_ai_akcia) * 6) / 100)}} сом эконом)</small></span>
                                    </label>
                                </div>
                            </div>
                            @endif
                            @if ($onlain_sabak->toguz_ai_akcia > 0)
                            <div class="border-checkbox-section border-bottom b_color mt-25">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input class="border-checkbox check_price" type="checkbox" id="checkbox_0_4" name="check_price" value="4">
                                    <label class="border-checkbox-label" for="checkbox_0_4">
                                        <span class="pl-10">9 ай үчүн - {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->toguz_ai_akcia) * 9) / 100) }} сом <small>({{ round(((($onlain_sabak->price / 100) * $onlain_sabak->toguz_ai_akcia) * 9) / 100)}} сом эконом)</small></span>
                                    </label>
                                </div>
                            </div>
                            @endif
                            @if ($onlain_sabak->bir_jyl_akcia > 0)
                            <div class="border-checkbox-section border-bottom b_color mt-25">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input class="border-checkbox check_price" type="checkbox" id="checkbox_0_5" name="check_price" value="5">
                                    <label class="border-checkbox-label" for="checkbox_0_5">
                                        <span class="pl-10">9 ай үчүн - {{ round((($onlain_sabak->price - ($onlain_sabak->price / 100) * $onlain_sabak->bir_jyl_akcia) * 12) / 100) }} сом <small>({{ round(((($onlain_sabak->price / 100) * $onlain_sabak->bir_jyl_akcia) * 12) / 100)}} сом эконом)</small></span>
                                    </label>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Жабуу</button>
                        <button type="submit"
                            class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Сатып алуу</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

@if($onlain_sabak->akcia == 1 and $onlain_sabak->akcia_data_okonchanie > time())
    <script>
        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor((t / 1000) % 60);
            var minutes = Math.floor((t / 1000 / 60) % 60);
            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            return {
                total: t,
                days: days,
                hours: hours,
                minutes: minutes,
                seconds: seconds
            };
        }
        function initializeClock(id, endtime) {
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector(".days");
            var hoursSpan = clock.querySelector(".hours");
            var minutesSpan = clock.querySelector(".minutes");
            var secondsSpan = clock.querySelector(".seconds");

            function updateClock() {
                var t = getTimeRemaining(endtime);
                if (t.total <= 0) {
                    document.getElementById("countdown").className = "hidden";
                    document.getElementById("deadline-message").className = "visible";
                    clearInterval(timeinterval);
                    return true;
                }
                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ("0" + t.hours).slice(-2);
                minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
                secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
            }
            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }
        @php
        $mes = intval(date('m', $onlain_sabak->akcia_data_okonchanie)) - 1;
        @endphp
        
        var deadline = new Date(Date.parse(new Date({{date('Y', $onlain_sabak->akcia_data_okonchanie)}},{{$mes}},{{date('d', $onlain_sabak->akcia_data_okonchanie)}},{{date('H', $onlain_sabak->akcia_data_okonchanie)}},{{date('i', $onlain_sabak->akcia_data_okonchanie)}},0))); // for endless timer
        initializeClock("countdown", deadline);
    </script>
@endif
    <script>
        $(document).ready(function() {
            $.stickme({
                top: 80
            });
        });


        $('input[name="check_price"]').on('change', function() {
            $('input[name="check_price"]').not(this).prop('checked', false);
            if ($(this).is(":checked")) {

            } else {
                $(this).prop('checked', true);
            }
        });



        jQuery(function ($) {
        function AddReadMore() {
            var carLmt = 200;
            var readMoreTxt = " ... толук көрүү";
            var readLessTxt = " жашыруу";
            $(".add-read-more").children().each(function () {
                if ($(this).find(".first-section").length)
                    return;
                var allstr = $(this).html();
                if (allstr.length > carLmt) {
                    if(allstr.indexOf('</') > 0 ){
                        var b = allstr.split('>')[1]; // $100
                        var a = b.split('>')[0]; // 50ml
                        var a2 = allstr.split('>')[0]; // 50ml
                        var a3 = a2 + '>' + a + '>';
                        var b2 = allstr.split(a3)[1]; // $100
                        
                        var strtoadd = a3 + "<span class='second-section'>" + b2 + "</span><span class='read-more'>" + readMoreTxt + "</span><span class='read-less'>" + readLessTxt + "</span>";
                        $(this).html(strtoadd);
                    } else {
                        var firstSet = allstr.substring(0, carLmt);
                        var secdHalf = allstr.substring(carLmt, allstr.length);
                        var strtoadd = firstSet + "<span class='second-section'>" + secdHalf + "</span><span class='read-more'  title='Click to Show More'>" + readMoreTxt + "</span><span class='read-less' title='Click to Show Less'>" + readLessTxt + "</span>";
                        $(this).html(strtoadd);
                    }
                }
            });
            $(document).on("click", ".read-more,.read-less", function () {
                $(this).closest(".add-read-more").toggleClass("show-less-content show-more-content");
            });
        }
        AddReadMore();
        });
    </script>
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
                icon: 'error',
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
                $(".click_day").click(
                    function() {
                        Toast.fire({
                            icon: 'error',
                            title: 'Сиз бул сабакты сатып алган эмессиз!'
                        });
                    }
                );



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
                        '<div class="td_div for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" data-id_hover="for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}"> <p class="mb-0 sabak_text"> <small>{{ $onlain_sabak_day->onlain_sabak_predmety->predmet_title }} ({{ $onlain_sabak_day->onlain_sabak_predmet_sabak->nomer_gruppy }}-г)</small></p><p class="mb-0 sabak_text"><small>{{ $onlain_sabak_day->user->name }}</small></p></div>'
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
                        '<div class="td_div for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}" data-id_hover="for_hover_{{ $onlain_sabak_day->onlain_sabak_predmet_sabak->id }}"> <p class="mb-0 sabak_text"> <small>{{ $onlain_sabak_day->onlain_sabak_predmety->predmet_title }} ({{ $onlain_sabak_day->onlain_sabak_predmet_sabak->nomer_gruppy }}-г)</small></p><p class="mb-0 sabak_text"><small>{{ $onlain_sabak_day->user->name }}</small></p></div>'
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
