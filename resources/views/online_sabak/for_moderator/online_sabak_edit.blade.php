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

        .for_akcia__1 {
            border-top: 1px solid #dee2e6;
            border-left: 1px solid #dee2e6;
            border-right: none;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
            color: #007bff;
        }

        .for_akcia__2 {
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
        $onlain_sabak_days_count = $onlain_sabak_days->where('status', 1)->count();
    @endphp

    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5>{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}
                            <small>({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-группа)</small>
                        </h5>
                    </div>
                    <div class="col-md-auto for-padding">
                        <div class="">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <p class="m-0 pr-10">Статус</p>
                                </div>
                                <div class="col border-bottom"></div>
                                <div class="col-auto pb-5 ">
                                    <span class=" float-right pb-5"
                                        @if ($onlain_sabak_days_count > 0) @if ($onlain_sabak_predmet_sabak->price != 99999999999) id="swal_status" @else id="swal_status_price" @endif
                                    @else id="swal_status_count" @endif
                                        data-id1="{{ $onlain_sabak_predmet_sabak->id }}">
                                        <input id="swal_status_input" type="checkbox"
                                            class="js-small js-switch js-primary pb-5"
                                            @if ($onlain_sabak_predmet_sabak->status == 1) checked @endif
                                            @if ($onlain_sabak_days_count > 0) @if ($onlain_sabak_predmet_sabak->price != 99999999999) @else disabled @endif
                                        @else disabled @endif/>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block pb-0 pl-5 pr-5">
                <div class="col-12 p-0">
                    <div class="row pr-15 pl-15">
                        <div class="col border-bottom  p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link @if ($onlain_sabak_predmet_sabak->price == 99999999999) active @endif mb-0"
                                        id="for_nav_link1" data-toggle="tab" href="#tuuraloolor" role="tab"
                                        aria-selected="false" style="white-space: nowrap;"><i
                                            class="far fa-layer-group pr-10"></i> Маалымат</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom  p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link @if ($onlain_sabak_predmet_sabak->price != 99999999999) active @endif mb-0"
                                        id="for_nav_link2" data-toggle="tab" href="#raspisanie" role="tab"
                                        aria-selected="true" style="white-space: nowrap;"><i
                                            class="far fa-calendar-edit pr-10"></i> Расписание</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom  p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link3" data-toggle="tab"
                                        href="#akcia" role="tab" aria-selected="false" style="white-space: nowrap;"><i
                                            class="far fa-tags pr-10"></i> Акция</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto border-bottom  p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link4" data-toggle="tab"
                                        href="#nastroiki" role="tab" aria-selected="false"
                                        style="white-space: nowrap;"><i class="feather icon-settings pr-10 pl-10"></i></a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="tab-content card-block pr-0 pl-0 pb-5">
                        <div class="tab-pane  pr-5 pl-5" id="nastroiki" role="tabpanel">
                            <div class="row align-items-top mt-40">
                                <div class="col">
                                    <div class="row align-items-center mb-25 ">
                                        <div class="col-auto">
                                            <p class="m-0 pb-5">Бир нече айга сатып алууга мүмкүндүк <i
                                                    class="fal fa-info-circle pl-10" type="button" data-toggle="tooltip"
                                                    data-placement="top"
                                                    title="Эгер бул функция иштеп турса, анда окуучулар бир нече айга сатып алууда көрсөтүлгөн скидканы колдоно алышат"
                                                    style="color: #007bff"></i></p>
                                        </div>
                                        <div class="col">
                                            <hr class="m-0">
                                        </div>
                                        {{-- <div class="col-auto">
                                            <span class="swal_dos_na_nes_mes float-right pb-5" data-id1="{{$onlain_sabak_predmet_sabak->id}}">
                                                <input type="checkbox" id="dd_akcia" class=" js-small js-switch js-primary pb-5"
                                                    @if ($onlain_sabak_predmet_sabak->dostup_na_pokupku_za_neskolko_mesyacev == 1) checked @endif/>
                                            </span>
                                        </div> --}}
                                    </div>
                                    <div class="row align-items-end akcia mt-40">
                                        <div class="col-auto pr-0">
                                            <div class="border-checkbox-section border-bottom b_color">
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input class="border-checkbox" type="checkbox" disabled checked>
                                                    <label class="border-checkbox-label"><span class="pl-10">1 ай үчүн
                                                            <small></small></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col pr-0 pl-0 border-bottom b_color">
                                            <p class="m-0 float-right mr-25"
                                                style="padding-bottom: 8px; font-weight: 650">
                                                <span>
                                                    @if ($onlain_sabak_predmet_sabak->price != 99999999999)
                                                        {{ $onlain_sabak_predmet_sabak->price / 100 }}
                                                    @endif
                                                </span> сом
                                            </p>
                                        </div>
                                        <div class="col-auto pl-0">
                                            <div class="row">
                                                <div class="col p-0">
                                                    <input type="number" style="width: 70px;"
                                                        class="for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                        placeholder="0" pattern="\d+" readonly value="100">
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <input type="text" style="width: 30px;"
                                                        class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="%" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form class="needs-validation" novalidate method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-end akcia mt-30">

                                            <div class="col-auto pr-0">
                                                <div class="border-checkbox-section border-bottom b_color">
                                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                                        <input class="border-checkbox" type="checkbox" id="checkbox_0_1"
                                                            name="checkbox_0_1"
                                                            data-id="{{ $onlain_sabak_predmet_sabak->id }}" data-id2="3"
                                                            @if ($onlain_sabak_predmet_sabak->uch_ai_akcia != null) checked @endif>
                                                        <label class="border-checkbox-label" for="checkbox_0_1"><span
                                                                class="pl-10">3 ай үчүн <small>(min:
                                                                    5%)</small></span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col pr-0 pl-0 border-bottom b_color">
                                                <p class="m-0 float-right mr-25 uch_ai_akcia_price_sh"
                                                    style="padding-bottom: 8px;"><span id="uch_ai_akcia_price1">
                                                        @if ($onlain_sabak_predmet_sabak->uch_ai_akcia != null)
                                                            {{ (($onlain_sabak_predmet_sabak->price - ($onlain_sabak_predmet_sabak->price / 100) * $onlain_sabak_predmet_sabak->uch_ai_akcia) * 3) / 100 }}
                                                        @else
                                                            @if ($onlain_sabak_predmet_sabak->price != 99999999999)
                                                                {{ ($onlain_sabak_predmet_sabak->price / 100) * 3 }}
                                                            @endif
                                                        @endif
                                                    </span> сом</p>
                                            </div>
                                            <div class="col-auto pl-0">
                                                <div class="row">
                                                    <div class="col p-0">
                                                        <input data-id="3" id="uch_ai_akcia_price"
                                                            name="uch_ai_akcia_price" type="number" style="width: 70px;"
                                                            class="for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                            placeholder="0" min="5" max="99" maxlength="2"
                                                            pattern="\d+" required
                                                            @if ($onlain_sabak_predmet_sabak->price != 99999999999) value="{{ $onlain_sabak_predmet_sabak->uch_ai_akcia }}" @endif>
                                                    </div>
                                                    <div class="col-auto pl-0">
                                                        <input type="text" style="width: 30px;"
                                                            class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="%"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                    <div class="row align-items-end akcia mt-30">
                                        <div class="col-auto pr-0">
                                            <div class="border-checkbox-section border-bottom b_color">
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox_0_2"
                                                        name="checkbox_0_2"
                                                        data-id="{{ $onlain_sabak_predmet_sabak->id }}" data-id2="6"
                                                        @if ($onlain_sabak_predmet_sabak->alty_ai_akcia != null) checked @endif>
                                                    <label class="border-checkbox-label" for="checkbox_0_2"><span
                                                            class="pl-10">6 ай үчүн <small>(min:
                                                                10%)</small></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col pr-0 pl-0 border-bottom b_color">
                                            <p class="m-0 float-right mr-25 alty_ai_akcia_price_sh"
                                                style="padding-bottom: 8px;"><span id="alty_ai_akcia_price1">
                                                    @if ($onlain_sabak_predmet_sabak->alty_ai_akcia != null)
                                                        {{ (($onlain_sabak_predmet_sabak->price - ($onlain_sabak_predmet_sabak->price / 100) * $onlain_sabak_predmet_sabak->alty_ai_akcia) * 6) / 100 }}
                                                    @else
                                                        @if ($onlain_sabak_predmet_sabak->price != 99999999999)
                                                            {{ ($onlain_sabak_predmet_sabak->price / 100) * 6 }}
                                                        @endif
                                                    @endif
                                                </span> сом</p>
                                        </div>
                                        <div class="col-auto pl-0">
                                            <div class="row">
                                                <div class="col p-0">
                                                    <input data-id="6" id="alty_ai_akcia_price"
                                                        name="alty_ai_akcia_price" type="number" style="width: 70px;"
                                                        class="for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                        placeholder="0" min="10" max="99" maxlength="2"
                                                        pattern="\d+" required
                                                        value="{{ $onlain_sabak_predmet_sabak->alty_ai_akcia }}">
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <input type="text" style="width: 30px;"
                                                        class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="%" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-end akcia mt-30">
                                        <div class="col-auto pr-0">
                                            <div class="border-checkbox-section border-bottom b_color">
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox_0_3"
                                                        name="checkbox_0_3"
                                                        data-id="{{ $onlain_sabak_predmet_sabak->id }}" data-id2="9"
                                                        @if ($onlain_sabak_predmet_sabak->toguz_ai_akcia != null) checked @endif>
                                                    <label class="border-checkbox-label" for="checkbox_0_3"><span
                                                            class="pl-10">9 ай үчүн <small>(min:
                                                                15%)</small></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col pr-0 pl-0 border-bottom b_color">
                                            <p class="m-0 float-right mr-25 toguz_ai_akcia_price_sh"
                                                style="padding-bottom: 8px;"><span id="toguz_ai_akcia_price1">
                                                    @if ($onlain_sabak_predmet_sabak->toguz_ai_akcia != null)
                                                        {{ (($onlain_sabak_predmet_sabak->price - ($onlain_sabak_predmet_sabak->price / 100) * $onlain_sabak_predmet_sabak->toguz_ai_akcia) * 9) / 100 }}
                                                    @else
                                                        @if ($onlain_sabak_predmet_sabak->price != 99999999999)
                                                            {{ ($onlain_sabak_predmet_sabak->price / 100) * 9 }}
                                                        @endif
                                                    @endif
                                                </span> сом</p>
                                        </div>
                                        <div class="col-auto pl-0">
                                            <div class="row">
                                                <div class="col p-0">
                                                    <input data-id="9" id="toguz_ai_akcia_price"
                                                        name="toguz_ai_akcia_price" type="number" style="width: 70px;"
                                                        class="for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                        placeholder="0" min="15" max="99" maxlength="2"
                                                        pattern="\d+" required
                                                        value="{{ $onlain_sabak_predmet_sabak->toguz_ai_akcia }}">
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <input type="text" style="width: 30px;"
                                                        class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="%" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row align-items-end akcia mt-30">
                                        <div class="col-auto pr-0">
                                            <div class="border-checkbox-section border-bottom b_color">
                                                <div class="border-checkbox-group border-checkbox-group-primary">
                                                    <input class="border-checkbox" type="checkbox" id="checkbox_0_4"
                                                        name="checkbox_0_4"
                                                        data-id="{{ $onlain_sabak_predmet_sabak->id }}" data-id2="12"
                                                        @if ($onlain_sabak_predmet_sabak->bir_jyl_akcia != null) checked @endif>
                                                    <label class="border-checkbox-label" for="checkbox_0_4"><span
                                                            class="pl-10">1 жыл үчүн <small>(min:
                                                                20%)</small></span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col pr-0 pl-0 border-bottom b_color">
                                            <p class="m-0 float-right mr-25 bir_jyl_ai_akcia_price_sh"
                                                style="padding-bottom: 8px;"><span id="bir_jyl_ai_akcia_price1">
                                                    @if ($onlain_sabak_predmet_sabak->bir_jyl_akcia != null)
                                                        {{ (($onlain_sabak_predmet_sabak->price - ($onlain_sabak_predmet_sabak->price / 100) * $onlain_sabak_predmet_sabak->bir_jyl_akcia) * 12) / 100 }}
                                                    @else
                                                        @if ($onlain_sabak_predmet_sabak->price != 99999999999)
                                                            {{ ($onlain_sabak_predmet_sabak->price / 100) * 12 }}
                                                        @endif
                                                    @endif
                                                </span> сом</p>
                                        </div>
                                        <div class="col-auto pl-0">
                                            <div class="row">
                                                <div class="col p-0">
                                                    <input data-id="12" id="bir_jyl_ai_akcia_price"
                                                        name="bir_jyl_ai_akcia_price" type="number" style="width: 70px;"
                                                        class="for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                        placeholder="0" min="20" max="99" maxlength="2"
                                                        pattern="\d+" required
                                                        value="{{ $onlain_sabak_predmet_sabak->bir_jyl_akcia }}">
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <input type="text" style="width: 30px;"
                                                        class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="%" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto border-right"></div>
                                <div class="col">

                                </div>
                            </div>

                        </div>
                        <div class="tab-pane " id="akcia" role="tabpanel">
                            <div style="background: #f2f7fb"">
                                <div class="row align-items-end pb-40">
                                    <div class="col-md-4 pt-40">
                                        <div class="card proj-t-card mb-0 ml-10 mr-10">
                                            <div class="card-body">
                                                <div class="row align-items-center mb-30">
                                                    <div class="col-auto">
                                                        <i class="far fa-calendar-check text-c-red f-30"></i>
                                                    </div>
                                                    <div class="col pl-0">
                                                        <h6 class="mb-5">Акция</h6>
                                                        <h6 class="mb-0 text-c-red">
                                                            <span id="x_date1">
                                                                @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
                                                                    {{ date('d', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }}@else{{ date('d') }}
                                                                @endif
                                                            </span>.<span id="x_date2">
                                                                @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
                                                                    {{ date('m', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }}@else{{ date('m') }}
                                                                @endif
                                                            </span>.<span id="x_date3">
                                                                @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
                                                                    {{ date('Y', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }}@else{{ date('Y') }}
                                                                @endif
                                                            </span> / <span id="x_date4">
                                                                @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
                                                                    {{ date('H', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }}@else{{ date('H') }}
                                                                @endif
                                                            </span>:<span id="x_date5">
                                                                @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
                                                                    {{ date('i', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }}@else{{ date('i') }}
                                                                @endif
                                                            </span>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center text-center">
                                                    <div class="col">
                                                        <h6 class="mb-0" id="x_price">
                                                            {{ $onlain_sabak_predmet_sabak->akcia_price / 100 }} сом</h6>
                                                    </div>
                                                    <div class="col"><i
                                                            class="fas fa-exchange-alt text-c-red f-18"></i>
                                                    </div>
                                                    <div class="col">
                                                        <h6 class="mb-0"><span class="primerno"
                                                                style="font-size: 18px;">≈</span> <span id="x_kun">
                                                                @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
                                                                    {{ (date('Y', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) - date('Y')) * 365 + (date('m', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) - date('m')) * 30 + (date('d', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) - date('d')) }}
                                                                @else
                                                                    0
                                                                @endif
                                                            </span> күн</h6>
                                                    </div>
                                                </div>
                                                <h6 class="pt-badge bg-c-red">-<span id="x_akcia_pr1">
                                                        @if ($onlain_sabak_predmet_sabak->akcia_price != null)
                                                            @if ($onlain_sabak_predmet_sabak->price > 0)
                                                                (100 - ((100 * $onlain_sabak_predmet_sabak->akcia_price /
                                                                100) / $onlain_sabak_predmet_sabak->price / 100))
                                                            @else
                                                                0
                                                            @endif
                                                        @else
                                                            0
                                                        @endif
                                                    </span>%</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 pt-40">
                                        <div class=" ml-10 mr-10">
                                            <h4 class="sub-title">Акциянын статусу
                                                <span
                                                    @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null) @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie > time()) @if ($onlain_sabak_predmet_sabak->price != 99999999999) @if ($onlain_sabak_predmet_sabak->price > 0) id="swal_akcia" @else id="swal_akcia_price0" @endif
                                                @else id="swal_akcia_price9" @endif
                                                @else
                                                    id="swal_akcia_null1" @endif
                                                @else
                                                    id="swal_akcia_null2" @endif
                                                    class="swal_akcia float-right"
                                                    data-id1="{{ $onlain_sabak_predmet_sabak->id }}">
                                                    <input type="checkbox" id="dd_akcia"
                                                        class=" js-small js-switch js-primary pb-5"
                                                        @if ($onlain_sabak_predmet_sabak->akcia == 1) checked @endif
                                                        @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null) @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie > time()) @if ($onlain_sabak_predmet_sabak->price != 99999999999) @if ($onlain_sabak_predmet_sabak->price > 0) @else disabled @endif
                                                    @else disabled @endif
                                                @else
                                                    disabled @endif
                                                @else
                                                    disabled @endif/>
                                                </span>
                                            </h4>
                                            <form
                                                action="{{ route('ort_moderator_sabak_edit_akcia', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id]) }}"
                                                method="POST" class="needs-validation" novalidate>
                                                @csrf
                                                @method('PUT')
                                                <div class="row align-items-end akcia mt-40">
                                                    <div class="col-auto pr-0">
                                                        <p class="mb-0">Акция учурундагы баа</p>
                                                    </div>
                                                    <div class="col pr-0 pl-0 border-bottom">
                                                        <p><small class="pr-10 float-right">(max:
                                                                @if ($onlain_sabak_predmet_sabak->price != 99999999999)
                                                                    {{ round(($onlain_sabak_predmet_sabak->price / 100) * 0.95) }}
                                                                @else
                                                                    0 @endif, min:
                                                                0)
                                                            </small></p>
                                                    </div>
                                                    <div class="col-auto pl-0">
                                                        <input id="akcia_price" name="akcia_price" type="text"
                                                            style="width: 100px;"
                                                            class="for_akcia autonumber fill form-control-right text-right pt-5 pb-5 pl-5 pr-15"
                                                            data-a-sign="  сом" data-p-sign="s" data-a-Sep=""
                                                            data-a-Pad="false" data-l-Zero="deny" data-v-Min="0"
                                                            @if ($onlain_sabak_predmet_sabak->price != 99999999999) data-v-Max="{{ round(($onlain_sabak_predmet_sabak->price / 100) * 0.95) }}" @else data-v-Max="0" @endif
                                                            placeholder="0  сом"
                                                            value="{{ $onlain_sabak_predmet_sabak->akcia_price / 100 }}"
                                                            onkeyUp="document.getElementById('x_price').innerHTML = this.value">

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        @if (session('false_price'))
                                                            <p class="m-0 text-danger float-right">
                                                                <small>{{ session('false_price') }}</small>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="row align-items-center">
                                                    <div class="col akcia">
                                                        <div class="row align-items-center">
                                                            <div class="col pt-40">
                                                                <p class="mb-0">Акциянын бүткөн датасы</p>
                                                            </div>
                                                            <div class="col-auto pt-40">
                                                                <input id="xx_date" name="data"
                                                                    class="for_akcia pt-5 pb-5 pl-15 pr-15"
                                                                    type="datetime-local" />

                                                            </div>
                                                        </div>
                                                        @if (session('false_data'))
                                                            <p class="m-0 text-danger float-right">
                                                                <small>{{ session('false_data') }}</small>
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-auto pt-40">
                                                        <div class="float-right">
                                                            <button type="submit"
                                                                class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Сактоо</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane @if ($onlain_sabak_predmet_sabak->price == 99999999999) active @endif pr-5 pl-5" id="tuuraloolor"
                            role="tabpanel">
                            <div class="row align-items-center mb-25 mt-40">
                                <div class="col-auto">
                                    <p class="m-0 pb-5">Администратордун уруксаты</p>
                                </div>
                                <div class="col">
                                    <hr class="m-0">
                                </div>
                                <div class="col-auto">
                                    @if ($onlain_sabak_predmet_sabak->status_admin == 1)
                                        <i class="fal fa-check-circle" data-toggle="tooltip" data-placement="top"
                                            type="button" title="Уруксат берилген"
                                            style="color: #2ECC71; font-size: 20px;"></i>
                                    @else
                                        <i class="fal fa-times-circle" data-toggle="tooltip" data-placement="top"
                                            type="button"
                                            title="Убактылуу токтотулган. Уруксат алуу үчүн администраторго кайрылыңыз"
                                            style="color: #E74C3C; font-size: 20px;"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="row align-items-center mb-50">
                                <div class="col-auto">
                                    <p class="m-0 pb-5">Окуучулардын саны <small
                                            class="pl-5  pr-10">({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-группа)</small>
                                        <i class="fal fa-info-circle" type="button" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Группадагы окуучулардын максималдуу саны 20. Эгерде көбөйтүүнү кааласаңыз администраторго байланышыңыз."
                                            style="color: #007bff"></i>
                                    </p>
                                </div>
                                <div class="col">
                                    <hr class="m-0">
                                </div>
                                <div class="col-auto">
                                    <p class="m-0 pb-5">{{ $onlain_sabak_predmet_sabak->col_uchenikov }}</p>
                                </div>
                            </div>


                            <p class="">Сабак тууралуу маалымат</p>
                            <form
                                action="{{ route('ort_moderator_sabak_edit', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id]) }}"
                                method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')
                                <textarea name="opisanie" id="summernote">{{ $onlain_sabak_predmet_sabak->opisanie }}</textarea>
                                <div class="row align-items-center mb-5 mt-50">
                                    <div class="col-md-6 price">
                                        <div class="row align-items-end mt-25">
                                            <div class="col-auto">
                                                <p class="mb-0">Баасы <small class="pl-10">(бир ай үчүн)</small></p>
                                            </div>
                                            <div class="col pr-0">
                                                <hr class="m-0">
                                            </div>
                                            <div class="col-auto pl-0">
                                                <input name="price" type="text" style="width: 125px;"
                                                    class="for_focus autonumber fill form-control-right text-right pt-5 pb-5 pl-15 pr-15"
                                                    data-a-sign="  сом" data-p-sign="s" data-a-Sep=""
                                                    data-a-Pad="false" data-l-Zero="deny" data-v-Min="0"
                                                    data-v-Max="100000" placeholder="0  сом"
                                                    @if ($onlain_sabak_predmet_sabak->price != 99999999999) value="{{ $onlain_sabak_predmet_sabak->price / 100 }}" @endif>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($onlain_sabak_predmet_sabak->old_price >= 0)
                                        <div class="col-md-6 old_price">
                                            <div class="row align-items-end mt-25">
                                                <div class="col-auto">
                                                    <p class="mb-0">Эски баасы</p>
                                                </div>
                                                <div class="col pr-0">
                                                    <hr class="m-0">
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <input type="text" name="old_price"
                                                        style="width: 125px; text-decoration: line-through;"
                                                        class="for_focus autonumber fill form-control-right text-right pt-5 pb-5 pl-15 pr-15"
                                                        data-a-sign="  сом" data-p-sign="s" data-a-Sep=""
                                                        data-a-Pad="false" data-l-Zero="deny" data-v-Min="0"
                                                        data-v-Max="100000" placeholder="0  сом" style="" readonly
                                                        value="{{ $onlain_sabak_predmet_sabak->old_price / 100 }}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="float-right pb-10 pt-25">
                                    <button type="submit"
                                        class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Сактоо</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane @if ($onlain_sabak_predmet_sabak->price != 99999999999) active @endif" id="raspisanie"
                            role="tabpanel">
                            <div class="table-responsive border-top mt-40">
                                <table class="table table-hover  table-bordered align-middle overflow-x mb-0">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Пн</th>
                                            <th>Вт</th>
                                            <th>Ср</th>
                                            <th>Чт</th>
                                            <th>Пт</th>
                                            <th>Сб</th>
                                            <th>Вс</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">08:00 / 08:50</p>
                                                </div>
                                            </td>
                                            <td class="1_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="08:00 / 08:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="08:00 / 08:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="08:00 / 08:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="08:00 / 08:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="08:00 / 08:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="08:00 / 08:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_8">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '8']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="08:00 / 08:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">09:00 / 09:50</p>
                                                </div>
                                            </td>
                                            <td class="1_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="09:00 / 09:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="09:00 / 09:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="09:00 / 09:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="09:00 / 09:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="09:00 / 09:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="09:00 / 09:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_9">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '9']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="09:00 / 09:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">10:00 / 10:50</p>
                                                </div>
                                            </td>
                                            <td class="1_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="10:00 / 10:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="10:00 / 10:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="10:00 / 10:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="10:00 / 10:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="10:00 / 10:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="10:00 / 10:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_10">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '10']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="10:00 / 10:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">11:00 / 11:50</p>
                                                </div>
                                            </td>
                                            <td class="1_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="11:00 / 11:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="11:00 / 11:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="11:00 / 11:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="11:00 / 11:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="11:00 / 11:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="11:00 / 11:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_11">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '11']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="11:00 / 11:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">12:00 / 12:50</p>
                                                </div>
                                            </td>
                                            <td class="1_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="12:00 / 12:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="12:00 / 12:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="12:00 / 12:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="12:00 / 12:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="12:00 / 12:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="12:00 / 12:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_12">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '12']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="12:00 / 12:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">13:00 / 13:50</p>
                                                </div>
                                            </td>
                                            <td class="1_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="13:00 / 13:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="13:00 / 13:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="13:00 / 13:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="13:00 / 13:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="13:00 / 13:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="13:00 / 13:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_13">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '13']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="13:00 / 13:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">14:00 / 14:50</p>
                                                </div>
                                            </td>
                                            <td class="1_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="14:00 / 14:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="14:00 / 14:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="14:00 / 14:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="14:00 / 14:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="14:00 / 14:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="14:00 / 14:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_14">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '14']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="14:00 / 14:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">15:00 / 15:50</p>
                                                </div>
                                            </td>
                                            <td class="1_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="15:00 / 15:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="15:00 / 15:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="15:00 / 15:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="15:00 / 15:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="15:00 / 15:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="15:00 / 15:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_15">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '15']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="15:00 / 15:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">16:00 / 16:50</p>
                                                </div>
                                            </td>
                                            <td class="1_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="16:00 / 16:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="16:00 / 16:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="16:00 / 16:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="16:00 / 16:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="16:00 / 16:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="16:00 / 16:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_16">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '16']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="16:00 / 16:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">17:00 / 17:50</p>
                                                </div>
                                            </td>
                                            <td class="1_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="17:00 / 17:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="17:00 / 17:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="17:00 / 17:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="17:00 / 17:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="17:00 / 17:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="17:00 / 17:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_17">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '17']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="17:00 / 17:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">18:00 / 18:50</p>
                                                </div>
                                            </td>
                                            <td class="1_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="18:00 / 18:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="18:00 / 18:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="18:00 / 18:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="18:00 / 18:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="18:00 / 18:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="18:00 / 18:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_18">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '18']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="18:00 / 18:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">19:00 / 19:50</p>
                                                </div>
                                            </td>
                                            <td class="1_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="19:00 / 19:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="19:00 / 19:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="19:00 / 19:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="19:00 / 19:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="19:00 / 19:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="19:00 / 19:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_19">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '19']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="19:00 / 19:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">20:00 / 20:50</p>
                                                </div>
                                            </td>
                                            <td class="1_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="20:00 / 20:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="20:00 / 20:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="20:00 / 20:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="20:00 / 20:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="20:00 / 20:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="20:00 / 20:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_20">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '20']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="20:00 / 20:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">21:00 / 21:50</p>
                                                </div>
                                            </td>
                                            <td class="1_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="21:00 / 21:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="21:00 / 21:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="21:00 / 21:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="21:00 / 21:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="21:00 / 21:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="21:00 / 21:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_21">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '21']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="21:00 / 21:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">22:00 / 22:50</p>
                                                </div>
                                            </td>
                                            <td class="1_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="22:00 / 22:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="22:00 / 22:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="22:00 / 22:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="22:00 / 22:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="22:00 / 22:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="22:00 / 22:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_22">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '22']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="22:00 / 22:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="td_div2">
                                                    <p class="mb-0 pt-5">23:00 / 23:50</p>
                                                </div>
                                            </td>
                                            <td class="1_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '1', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Дүйшөмбү / Пн." data-ubaktysy="23:00 / 23:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="2_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '2', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Шейшемби / Вт." data-ubaktysy="23:00 / 23:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="3_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '3', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Шаршемби / Ср." data-ubaktysy="23:00 / 23:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="4_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '4', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Бейшенби / Чт." data-ubaktysy="23:00 / 23:50"
                                                    height="100%">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="5_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '5', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Жума / Пт." data-ubaktysy="23:00 / 23:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="6_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '6', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Ишемби / Сб." data-ubaktysy="23:00 / 23:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                            <td class="7_23">
                                                <div class="td_div" data-toggle="modal" data-target="#large-Modal"
                                                    data-action="{{ route('ort_moderator_online_sabak_plus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'kunu' => '7', 'ubaktysy' => '23']) }}"
                                                    data-kunu="Жекшемби / Вс." data-ubaktysy="23:00 / 23:50">
                                                    <i class="far fa-plus sabak_plus"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Сабак кошуу</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                                class="fal fa-times" style="font-size: 24px;"></i></button>
                    </div>
                    <div class="modal-body">
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
                            class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20 plus_sabak_kunu"
                            href=""><i class="far fa-plus pr-10"></i>Кошуу</a>
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
                        <a id="udalit_day" type="button"
                            class="btn btn-mat waves-effect waves-light btn-danger float-right pr-20 pl-20 plus_sabak_kunu"
                            href=""><i class="far fa-trash pr-10"></i>Өчүрүү</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="sabak_kunu_izmenit" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Сабактын күнүн жана убактысын өзгөртүү</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <i
                                class="fal fa-times" style="font-size: 24px;"></i></button>
                    </div>
                    <form action="{{ route('ort_moderator_online_sabak_dni_izmenit', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id,]) }}" method="POST" class="needs-validation sabak_dni_izmenit" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <p class="text-center">{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}
                            <small>({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-г.)</small>
                        </p>
                        <input id="onlain_sabak_day_id_00" name="onlain_sabak_day_id" type="number" required hidden>
                        <div class="row align-items-end mb-25 mt-30">
                            <div class="col-auto">
                                <p class="m-0 pb-5">Күнү</p>
                            </div>
                            <div class="col pr-0">
                                <hr class="m-0">
                            </div>
                            <div class="col-auto pl-0">
                                <select name="kunu" class="form-control select2" required>
                                    <option selected disabled value="">Тандаңыз</option>
                                    <option value="1">Дүйшөмбү / Пн.</option>
                                    <option value="2">Шейшемби / Вт.</option>
                                    <option value="3">Шаршемби / Ср.</option>
                                    <option value="4">Бейшенби / Чт.</option>
                                    <option value="5">Жума / Пт.</option>
                                    <option value="6">Ишемби / Сб.</option>
                                    <option value="7">Жекшемби / Вс.</option>
                                </select>
                            </div>
                        </div>
                        <div class="row align-items-end mb-25">
                            <div class="col-auto">
                                <p class="m-0 pb-5">Убактысы</p>
                            </div>
                            <div class="col pr-0">
                                <hr class="m-0">
                            </div>
                            <div class="col-auto pl-0">
                                <select name="ubaktysy" class="form-control select" required>
                                    <option selected disabled value="">Тандаңыз</option>
                                    <option value="8">08:00 / 08:50</option>
                                    <option value="9">09:00 / 09:50</option>
                                    <option value="10">10:00 / 10:50</option>
                                    <option value="11">11:00 / 11:50</option>
                                    <option value="12">12:00 / 12:50</option>
                                    <option value="13">13:00 / 13:50</option>
                                    <option value="14">14:00 / 14:50</option>
                                    <option value="15">15:00 / 15:50</option>
                                    <option value="16">16:00 / 16:50</option>
                                    <option value="17">17:00 / 17:50</option>
                                    <option value="18">18:00 / 18:50</option>
                                    <option value="19">19:00 / 19:50</option>
                                    <option value="20">20:00 / 20:50</option>
                                    <option value="21">21:00 / 21:50</option>
                                    <option value="22">22:00 / 22:50</option>
                                    <option value="23">23:00 / 23:50</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect "
                            data-dismiss="modal">Жабуу</button>
                            <button type="submit"
                                class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20"><i class="fad fa-exchange pr-10"></i>Өзгөртүү</button>
                    </div>
                    </form>
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


        @if ($onlain_sabak_predmet_sabak->price != 99999999999)

            $("#checkbox_0_1").click(function() {
                var id_a1 = $(this).attr('data-id');
                var data_id2 = $(this).attr('data-id2');
                if ($("#checkbox_0_1").is(":checked")) {
                    let uch_ai_akcia = $("input[name=uch_ai_akcia_price]").val();
                    if (uch_ai_akcia.length > 0) {
                        if (uch_ai_akcia >= 5) {
                            $.ajax({
                                url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek2/" + id_a1 + '/' +
                                    data_id2,
                                type: "PUT",
                                data: {
                                    uch_ai_akcia: uch_ai_akcia,
                                    data_id2: data_id2,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: '3 айга сатып алууга болот'
                                    });
                                }
                            });
                        } else {
                            $('input[id="checkbox_0_1"]').prop('checked', false);
                            Toast.fire({
                                icon: 'error',
                                title: 'Жок дегенде 5% болуш керек!'
                            });
                        }
                    } else {
                        $('input[id="checkbox_0_1"]').prop('checked', false);
                        Toast.fire({
                            icon: 'error',
                            title: 'Алгач процентин көрсөтүңүз!'
                        });
                    }
                } else {
                    jQuery.ajax({
                        url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek/" + id_a1 + '/' +
                            data_id2,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#uch_ai_akcia_price").val("");
                            Toast.fire({
                                icon: 'error',
                                title: 'Эми 3 айга сатып алууга болбойт!'
                            });
                        }
                    });
                }
            });

            $("#checkbox_0_2").click(function() {
                var id_a1 = $(this).attr('data-id');
                var data_id2 = $(this).attr('data-id2');
                if ($("#checkbox_0_2").is(":checked")) {
                    let alty_ai_akcia = $("input[name=alty_ai_akcia_price]").val();
                    if (alty_ai_akcia.length > 0) {
                        if (alty_ai_akcia >= 10) {
                            $.ajax({
                                url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek2/" + id_a1 + '/' +
                                    data_id2,
                                type: "PUT",
                                data: {
                                    alty_ai_akcia: alty_ai_akcia,
                                    data_id2: data_id2,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: '6 айга сатып алууга болот'
                                    });
                                }
                            });
                        } else {
                            $('input[id="checkbox_0_2"]').prop('checked', false);
                            Toast.fire({
                                icon: 'error',
                                title: 'Жок дегенде 10% болуш керек!'
                            });
                        }
                    } else {
                        $('input[id="checkbox_0_2"]').prop('checked', false);
                        Toast.fire({
                            icon: 'error',
                            title: 'Алгач процентин көрсөтүңүз!'
                        });
                    }
                } else {
                    jQuery.ajax({
                        url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek/" + id_a1 + '/' +
                            data_id2,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#alty_ai_akcia_price").val("");
                            Toast.fire({
                                icon: 'error',
                                title: 'Эми 6 айга сатып алууга болбойт!'
                            });
                        }
                    });
                }
            });

            $("#checkbox_0_3").click(function() {
                var id_a1 = $(this).attr('data-id');
                var data_id2 = $(this).attr('data-id2');
                if ($("#checkbox_0_3").is(":checked")) {
                    let toguz_ai_akcia = $("input[name=toguz_ai_akcia_price]").val();
                    if (toguz_ai_akcia.length > 0) {
                        if (toguz_ai_akcia >= 15) {
                            $.ajax({
                                url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek2/" + id_a1 + '/' +
                                    data_id2,
                                type: "PUT",
                                data: {
                                    toguz_ai_akcia: toguz_ai_akcia,
                                    data_id2: data_id2,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: '9 айга сатып алууга болот'
                                    });
                                }
                            });
                        } else {
                            $('input[id="checkbox_0_3"]').prop('checked', false);
                            Toast.fire({
                                icon: 'error',
                                title: 'Жок дегенде 15% болуш керек!'
                            });
                        }
                    } else {
                        $('input[id="checkbox_0_3"]').prop('checked', false);
                        Toast.fire({
                            icon: 'error',
                            title: 'Алгач процентин көрсөтүңүз!'
                        });
                    }
                } else {
                    jQuery.ajax({
                        url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek/" + id_a1 + '/' +
                            data_id2,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#toguz_ai_akcia_price").val("");
                            Toast.fire({
                                icon: 'error',
                                title: 'Эми 9 айга сатып алууга болбойт!'
                            });
                        }
                    });
                }
            });

            $("#checkbox_0_4").click(function() {
                var id_a1 = $(this).attr('data-id');
                var data_id2 = $(this).attr('data-id2');
                if ($("#checkbox_0_4").is(":checked")) {
                    let bir_jyl_akcia = $("input[name=bir_jyl_ai_akcia_price]").val();
                    if (bir_jyl_akcia.length > 0) {
                        if (bir_jyl_akcia >= 20) {
                            $.ajax({
                                url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek2/" + id_a1 + '/' +
                                    data_id2,
                                type: "PUT",
                                data: {
                                    bir_jyl_akcia: bir_jyl_akcia,
                                    data_id2: data_id2,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(data) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: '1 жылга сатып алууга болот'
                                    });
                                }
                            });
                        } else {
                            $('input[id="checkbox_0_4"]').prop('checked', false);
                            Toast.fire({
                                icon: 'error',
                                title: 'Жок дегенде 20% болуш керек!'
                            });
                        }
                    } else {
                        $('input[id="checkbox_0_4"]').prop('checked', false);
                        Toast.fire({
                            icon: 'error',
                            title: 'Алгач процентин көрсөтүңүз!'
                        });
                    }
                } else {
                    jQuery.ajax({
                        url: "/moderator_panel_ort/online_sabak_edit_nes_mes/chek/" + id_a1 + '/' +
                            data_id2,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#bir_jyl_ai_akcia_price").val("");
                            Toast.fire({
                                icon: 'error',
                                title: 'Эми 1 жылга сатып алууга болбойт!'
                            });
                        }
                    });
                }
            });




            $('#uch_ai_akcia_price').on('change keyup', function() {
                var res = $(this).val()
                console.log(res.length);
                $('input[id="checkbox_0_1"]').prop('checked', false);
                if (res.length > 2) {
                    $(this).val(res.substring(0, 2));
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("uch_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 3);
                    document.getElementById("uch_ai_akcia_price1").innerHTML = xx_dd_procent;
                } else {
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("uch_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 3);
                    document.getElementById("uch_ai_akcia_price1").innerHTML = xx_dd_procent;
                }
            });

            $('#alty_ai_akcia_price').on('change keyup', function() {
                var res = $(this).val()
                console.log(res.length);
                $('input[id="checkbox_0_2"]').prop('checked', false);
                if (res.length > 2) {
                    $(this).val(res.substring(0, 2));
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("alty_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 6);
                    document.getElementById("alty_ai_akcia_price1").innerHTML = xx_dd_procent;
                } else {
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("alty_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 6);
                    document.getElementById("alty_ai_akcia_price1").innerHTML = xx_dd_procent;
                }
            });

            $('#toguz_ai_akcia_price').on('change keyup', function() {
                var res = $(this).val()
                console.log(res.length);
                $('input[id="checkbox_0_3"]').prop('checked', false);
                if (res.length > 2) {
                    $(this).val(res.substring(0, 2));
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("toguz_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 9);
                    document.getElementById("toguz_ai_akcia_price1").innerHTML = xx_dd_procent;
                } else {
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("toguz_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 9);
                    document.getElementById("toguz_ai_akcia_price1").innerHTML = xx_dd_procent;
                }
            });

            $('#bir_jyl_ai_akcia_price').on('change keyup', function() {
                var res = $(this).val()
                console.log(res.length);
                $('input[id="checkbox_0_4"]').prop('checked', false);
                if (res.length > 2) {
                    $(this).val(res.substring(0, 2));
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("bir_jyl_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 12);
                    document.getElementById("bir_jyl_ai_akcia_price1").innerHTML = xx_dd_procent;
                } else {
                    let a_ss_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                    let xx_ss_procent = document.getElementById("bir_jyl_ai_akcia_price").value;
                    let xx_dd_procent = Math.round((a_ss_price - (a_ss_price / 100 * xx_ss_procent)) * 12);
                    document.getElementById("bir_jyl_ai_akcia_price1").innerHTML = xx_dd_procent;
                }
            });
        @else
            $("#checkbox_0_1").click(function() {
                $('input[id="checkbox_0_1"]').prop('checked', false);
                Toast.fire({
                    icon: 'error',
                    title: 'Алгач сабактын баасын көрсөтүңүз!'
                });
            });
            $("#checkbox_0_2").click(function() {
                $('input[id="checkbox_0_2"]').prop('checked', false);
                Toast.fire({
                    icon: 'error',
                    title: 'Алгач сабактын баасын көрсөтүңүз!'
                });
            });
            $("#checkbox_0_3").click(function() {
                $('input[id="checkbox_0_3"]').prop('checked', false);
                Toast.fire({
                    icon: 'error',
                    title: 'Алгач сабактын баасын көрсөтүңүз!'
                });
            });
            $("#checkbox_0_4").click(function() {
                $('input[id="checkbox_0_4"]').prop('checked', false);
                Toast.fire({
                    icon: 'error',
                    title: 'Алгач сабактын баасын көрсөтүңүз!'
                });
            });
        @endif




        $(function() {
            var Toast23 = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $(document).ready(function() {
                $('#swal_akcia').click(function() {
                    var countryID1 = $(this).attr('data-id1');
                    if (countryID1) {
                        jQuery.ajax({
                            url: '/moderator_panel_ort/online_sabak_edit_akcia/chek/' +
                                countryID1,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                if ($("#dd_akcia").is(":checked")) {
                                    Toast23.fire({
                                        icon: 'success',
                                        title: 'Акция ачылды'
                                    });
                                } else {
                                    Toast23.fire({
                                        icon: 'error',
                                        title: 'Акция жабылды'
                                    });
                                }
                            }
                        });
                    } else {}
                });

                $('#swal_akcia_null1').click(function() {
                    Toast23.fire({
                        icon: 'error',
                        text: 'Акциянын бүткөн датасы бүгүнкү датадан кийин болушу керек!'
                    });
                });
                $('#swal_akcia_null2').click(function() {
                    Toast23.fire({
                        icon: 'error',
                        text: 'Акциянын датасын көрсөтүңүз!'
                    });
                });
                $('#swal_akcia_price0').click(function() {
                    Toast23.fire({
                        icon: 'error',
                        text: 'Акцияны иштетүү үчүн сабактын баасы 0 сомдон жогору болушу керек!'
                    });
                });
                $('#swal_akcia_price9').click(function() {
                    Toast23.fire({
                        icon: 'error',
                        text: 'Алгач сабактын баасын коюу керек!'
                    });
                });
            });
        });




        // для даты
        @if ($onlain_sabak_predmet_sabak->akcia_data_okonchanie != null)
            window.addEventListener("load", function() {
                var year = {{ date('Y', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }};
                var month = {{ date('m', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }};
                var day = {{ date('d', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }};
                var hour = {{ date('H', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }};
                var minute = {{ date('i', $onlain_sabak_predmet_sabak->akcia_data_okonchanie) }};
                var localDatetime = year + "-" +
                    (month < 10 ? "0" + month.toString() : month) + "-" +
                    (day < 10 ? "0" + day.toString() : day) + "T" +
                    (hour < 10 ? "0" + hour.toString() : hour) + ":" +
                    (minute < 10 ? "0" + minute.toString() : minute);
                var datetimeField = document.getElementById("xx_date");
                datetimeField.value = localDatetime;
            });
        @else
            $('.primerno').hide();
        @endif

        function calc() {
            let xx_date = document.getElementById("xx_date").value;
            let jyl = xx_date.substring(0, 4); //jyl
            let ai = xx_date.substring(5, 7); //ai
            let kun = xx_date.substring(8, 10); //kun
            let saat = xx_date.substring(11, 13); //saat
            let min = xx_date.substring(14, 16); //min
            document.getElementById("x_date1").innerHTML = kun;
            document.getElementById("x_date2").innerHTML = ai;
            document.getElementById("x_date3").innerHTML = jyl;
            document.getElementById("x_date4").innerHTML = saat;
            document.getElementById("x_date5").innerHTML = min;

            var newDate = new Date();
            var k_jyl = {{ date('Y') }}; //2019
            var k_ai = {{ date('m') }}; // 10
            var k_kun = {{ date('d') }}; // 11

            var kkk = ((jyl - k_jyl) * 365) + ((ai - k_ai) * 30) + (kun - k_kun);
            document.getElementById("x_kun").innerHTML = kkk;
            $('.primerno').show();
        }
        document.getElementById("xx_date").addEventListener("input", function() {
            calc(this.value);
        });




        @if ($onlain_sabak_predmet_sabak->price != 0)
            $(function() {
                $(".pcoded-inner-content").mousemove(
                    function() {
                        let a_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                        var a_price1 = $("#x_price").text();
                        var iNum = parseInt(a_price1);
                        if (iNum > 0) {
                            let pr2 = (100 - ((100 * iNum) / a_price));
                            let pr1 = Math.round(pr2);
                            document.getElementById("x_akcia_pr1").innerHTML = pr1;
                        } else {
                            if (iNum == 0) {
                                let pr2 = 100;
                                let pr1 = Math.round(pr2);
                                document.getElementById("x_akcia_pr1").innerHTML = pr1;
                            } else {
                                let pr2 = 0;
                                let pr1 = Math.round(pr2);
                                document.getElementById("x_akcia_pr1").innerHTML = pr1;
                            }
                        }
                    }
                );
            });

            $(function() {
                $("#akcia_price").mousemove(
                    function() {
                        let a_price = parseInt({{ $onlain_sabak_predmet_sabak->price / 100 }});
                        var a_price1 = $("#x_price").text();
                        var iNum = parseInt(a_price1);
                        if (iNum > 0) {
                            let pr2 = (100 - ((100 * iNum) / a_price));
                            let pr1 = Math.round(pr2);
                            document.getElementById("x_akcia_pr1").innerHTML = pr1;
                        } else {
                            if (iNum == 0) {
                                let pr2 = 100;
                                let pr1 = Math.round(pr2);
                                document.getElementById("x_akcia_pr1").innerHTML = pr1;
                            } else {
                                let pr2 = 0;
                                let pr1 = Math.round(pr2);
                                document.getElementById("x_akcia_pr1").innerHTML = pr1;
                            }
                        }
                    }
                );
            });
        @endif


        // для даты 


        $(function() {
            $("#for_nav_link1").click(
                function() {
                    $("#for_nav_link1").addClass('active');
                    $("#for_nav_link2").removeClass('active');
                    $("#for_nav_link3").removeClass('active');
                    $("#for_nav_link4").removeClass('active');
                    $("#tuuraloolor").addClass('active');
                    $("#raspisanie").removeClass('active');
                    $("#akcia").removeClass('active');
                    $("#nastroiki").removeClass('active');
                    $("#for_nav_link1").attr('aria-selected', 'true');
                    $("#for_nav_link2").attr('aria-selected', 'false');
                    $("#for_nav_link3").attr('aria-selected', 'false');
                }
            );
            $("#for_nav_link2").click(
                function() {
                    $("#for_nav_link2").addClass('active');
                    $("#for_nav_link1").removeClass('active');
                    $("#for_nav_link3").removeClass('active');
                    $("#for_nav_link4").removeClass('active');
                    $("#raspisanie").addClass('active');
                    $("#tuuraloolor").removeClass('active');
                    $("#akcia").removeClass('active');
                    $("#nastroiki").removeClass('active');
                }
            );
            $("#for_nav_link3").click(
                function() {
                    $("#for_nav_link3").addClass('active');
                    $("#for_nav_link1").removeClass('active');
                    $("#for_nav_link2").removeClass('active');
                    $("#for_nav_link4").removeClass('active');
                    $("#akcia").addClass('active');
                    $("#tuuraloolor").removeClass('active');
                    $("#raspisanie").removeClass('active');
                    $("#nastroiki").removeClass('active');
                }
            );
            $("#for_nav_link4").click(
                function() {
                    $("#for_nav_link4").addClass('active');
                    $("#for_nav_link1").removeClass('active');
                    $("#for_nav_link2").removeClass('active');
                    $("#for_nav_link3").removeClass('active');
                    $("#nastroiki").addClass('active');
                    $("#tuuraloolor").removeClass('active');
                    $("#raspisanie").removeClass('active');
                    $("#akcia").removeClass('active');
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
        $(function() {
            var Toast233 = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            $(document).ready(function() {

                $('#swal_status').click(function() {
                    var countryID1 = $(this).attr('data-id1');
                    if (countryID1) {
                        jQuery.ajax({
                            url: '/moderator_panel_ort/online_sabak_edit/chek_status/' +
                                countryID1,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                if ($("#swal_status_input").is(":checked")) {
                                    Toast233.fire({
                                        icon: 'success',
                                        title: 'Сабак баарына көрүндү'
                                    });
                                } else {
                                    Toast233.fire({
                                        icon: 'error',
                                        title: 'Сабак эч кимге көрүнбөйт'
                                    });
                                }
                            }
                        });
                    } else {}
                });
                $('#swal_status_count').click(function() {
                    Toast233.fire({
                        icon: 'error',
                        text: 'Алгач кайсыл күндөрү сабак болоорун белгилөө керек!'
                    });
                });
                $('#swal_status_price').click(function() {
                    Toast233.fire({
                        icon: 'error',
                        text: 'Алгач сабактын баасын коюу керек!'
                    });
                });
            });
        });
    </script>

    <!-- для текстового редактора -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                lang: 'ru-RU',
                minHeight: 150, // set minimum height of editor
                placeholder: 'Онлайн сабак тууралуу маалымат жазыңыз',
                disableDragAndDrop: true,
                tooltip: false,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'italic', 'strikethrough', 'superscript',
                        'subscript', 'height', 'clear'
                    ]],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table', 'hr']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['undo', 'redo', 'fullscreen', 'help']],
                ],
            });
            $('.note-btn').removeAttr('title');
            $('.note-toolbar').css({
                'background': '#f2f7fb',
            });
            $('.dropdown-item').css({
                'padding': '1',
                'white-space': 'nowrap'
            });
            $(function() {
                const screenWidth = window.screen.width;
                if (screenWidth <= 480) {
                    $('.note-btn').css({
                        'padding-right': '0',
                    });
                }
            });
        });
    </script>
    <!-- для текстового редактора -->
    <script>
        @foreach ($onlain_sabak_days as $onlain_sabak_day)
            $(".{{ $onlain_sabak_day->den_nedeli }}_{{ $onlain_sabak_day->nachalo_uroka }}").children().remove();
            $(".{{ $onlain_sabak_day->den_nedeli }}_{{ $onlain_sabak_day->nachalo_uroka }}").append(
                '<div class="td_div" id="dark-toolbar_{{$onlain_sabak_day->id}}"><p class="mb-0 sabak_text"> <small>{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }} ({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-г)</small></p></div><div id="toolbar-options_{{$onlain_sabak_day->id}}" class="hidden"><a class="btns" data-option="{{ $onlain_sabak_day->nachalo_uroka }}" data-option2="{{ $onlain_sabak_day->den_nedeli }}" data-action2="{{$onlain_sabak_day->id}}" type="button" data-toggle="modal" data-target="#sabak_kunu_izmenit"><i class="fa fa-exchange"></i></a><a class="btns2" data-kunu="@if ($onlain_sabak_day->den_nedeli == 1) Дүйшөмбү / Пн. @endif @if ($onlain_sabak_day->den_nedeli == 2) Шейшемби / Вт. @endif @if ($onlain_sabak_day->den_nedeli == 3) Шаршемби / Ср. @endif @if ($onlain_sabak_day->den_nedeli == 4) Бейшенби / Чт. @endif @if ($onlain_sabak_day->den_nedeli == 5) Жума / Пт. @endif @if ($onlain_sabak_day->den_nedeli == 6) Ишемби / Сб. @endif @if ($onlain_sabak_day->den_nedeli == 7) Жекшемби / Вс. @endif" @if ($onlain_sabak_day->nachalo_uroka < 10) data-ubaktysy="0{{ $onlain_sabak_day->nachalo_uroka }}:00 / 0{{ $onlain_sabak_day->nachalo_uroka }}:50" @else data-ubaktysy="{{ $onlain_sabak_day->nachalo_uroka }}:00 / {{ $onlain_sabak_day->nachalo_uroka }}:50" @endif data-action="{{ route('ort_moderator_online_sabak_dni_udalit', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id, 'onlain_sabak_day_id' => $onlain_sabak_day->id]) }}" type="button" data-toggle="modal" data-target="#sabak_kunu_delet"><i class="fa fa-trash"></i></a></div>'
            );
            $(document).ready(function () {
                $("#dark-toolbar_{{$onlain_sabak_day->id}}").toolbar({ content: "#toolbar-options_{{$onlain_sabak_day->id}}", style: "dark"});
            });
        @endforeach

        $(document).ready(function() {
            $('.btns').on('click', function() {
                option = $(this).data('option');
                option2 = $(this).data('option2');
                $('.select option[value="' + option + '"]').prop('selected', true);
                $('.select2 option[value="' + option2 + '"]').prop('selected', true);

                var action2 = $(this).attr('data-action2');
                $("#onlain_sabak_day_id_00").attr('value', action2);
            });
        });
        $(document).ready(function() {
            $('.btns2').on('click', function() {
                var kunu = $(this).attr('data-kunu');
                var ubaktysy = $(this).attr('data-ubaktysy');
                var action = $(this).attr('data-action');

                $(".kunu").text(kunu);
                $(".ubaktysy").text(ubaktysy);
                $("#udalit_day").attr('href', action);
            });
        });
    </script>
@endsection
<!--
1 сабакты очуруу
2 кунду алмаштыруу
3 кунду очуруу
4 статус
{{-- data-toggle="modal" data-target="#sabak_kunu_delet" data-action="{{ route('ort_moderator_online_sabak_minus_kunu', ['sabak_id' => $onlain_sabak_predmet_sabak->id, 'onlain_sabak_day_id' => $onlain_sabak_day->id]) }}" data-kunu="@if ($onlain_sabak_day->den_nedeli == 1) Дүйшөмбү / Пн. @endif @if ($onlain_sabak_day->den_nedeli == 2) Шейшемби / Вт. @endif @if ($onlain_sabak_day->den_nedeli == 3) Шаршемби / Ср. @endif @if ($onlain_sabak_day->den_nedeli == 4) Бейшенби / Чт. @endif @if ($onlain_sabak_day->den_nedeli == 5) Жума / Пт. @endif @if ($onlain_sabak_day->den_nedeli == 6) Ишемби / Сб. @endif @if ($onlain_sabak_day->den_nedeli == 7) Жекшемби / Вс. @endif" @if ($onlain_sabak_day->nachalo_uroka < 10) data-ubaktysy="0{{ $onlain_sabak_day->nachalo_uroka }}:00 / 0{{ $onlain_sabak_day->nachalo_uroka }}:50" @else data-ubaktysy="{{ $onlain_sabak_day->nachalo_uroka }}:00 / {{ $onlain_sabak_day->nachalo_uroka }}:50" @endif --}}
-->