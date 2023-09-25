@extends('layouts.ort_moderator_layouts')

@section('title', 'Панель')

@section('content')
    <style>
        .hover_b_color:hover .b_color {
            border-color: #007bff !important;
        }

        .for_focus {
            border-top: 1px solid #fff;
            border-left: 1px solid #fff;
            border-right: 1px solid #fff;
            border-bottom: 1px solid #dee2e6;
            border-radius: 0%;
            width: 100%;
            font-size: 1em;
        }

        .hover_for_focus:hover .for_focus {
            border: 1px solid #007bff;
            border-radius: 2px;
        }

        .for_focus_border {
            border: 1px solid #dee2e6;
            border-radius: 0%;
            width: 100%;
            font-size: 1em;
            color: #007bff;
        }

        .hover_for_focus:hover .for_focus_border {
            border: 1px solid #007bff;
            border-radius: 2px;
            background: #fff;
        }

        .for_focus_border:focus {
            color: #000000;
            background: #fff;
        }
        .for_focus_border2 {
            border: 1px solid #dee2e6;
            border-radius: 0%;
            width: 100%;
            font-size: 1em;
        }

        .hover_for_focus:hover .for_focus_border2 {
            border: 1px solid #007bff;
            border-radius: 2px;
            background: #fff;
        }

        .for_focus_border2:focus {
            background: #fff;
        }

        .btn-tool {
            background-color: transparent;
            color: #adb5bd;
            font-size: 0.875rem;
            margin: -0.75rem 0;
            padding: .25rem .5rem;
        }

        .btn-tool:hover {
            color: #495057;
            cursor: pointer;
        }

        .youtube:hover {
            background: #f2f7fb;
        }

        .frame:hover {
            background: #f2f7fb;
        }

        .youtube:hover .for_focus {
            background: #f2f7fb;
            border-top: 1px solid #f2f7fb;
            border-left: 1px solid #f2f7fb;
            border-right: 1px solid #f2f7fb;
        }

        .frame:hover .for_focus {
            background: #f2f7fb;
            border-top: 1px solid #f2f7fb;
            border-left: 1px solid #f2f7fb;
            border-right: 1px solid #f2f7fb;
        }

        .note-group-select-from-files {
            display: none;
        }

       

        


  

    </style>



    <div class="page-header card margin1" style="margin-left: 10px; margin-right: 10px;">
        <div class="row align-items-end">
            <div class="col-lg-6">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Модератор панель</h5>
                        <span>Онлайн сабак уюштурууга керектүү инструменттер</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title p-r-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('moderator_panel_ort') }}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="{{ route('moderator_panel_ort_online_sabak') }}">Онлайн сабак</a> </li>
                        <li class="breadcrumb-item"><a href="{{ route('moderator_panel_online_sabak_edit_kunu', $onlain_sabak_predmet_sabak->id)}}">{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}</a> </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ date('d-m-Y', $onlain_sabak_urok->data_uroka) }}</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <h5>{{ $onlain_sabak_predmet_sabak->onlain_sabak_predmety->predmet_title }}
                    <small>({{ $onlain_sabak_predmet_sabak->nomer_gruppy }}-группа)</small> /
                    {{ date('d-m-Y', $onlain_sabak_urok->data_uroka) }}
                </h5>
            </div>
            <div class="card-block pb-0 pl-5 pr-5">
                <div class="col-12 p-0">
                    <div class="row pr-15 pl-15 ">
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link active mb-0" id="for_nav_link1" data-toggle="tab"
                                        href="#tab_pole1" role="tab" aria-selected="true"
                                        style="white-space: nowrap;"><i class="fas fa-webcam pr-10"></i> Конференция</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link2" data-toggle="tab"
                                        href="#tab_pole2" role="tab" aria-selected="false"
                                        style="white-space: nowrap;"><i class="far fa-layer-group pr-10"></i> Маалымат</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link3" data-toggle="tab"
                                        href="#tab_pole3" role="tab" aria-selected="false"
                                        style="white-space: nowrap;"><i class="feather icon-settings pr-10 pl-10"></i></a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content card-block pr-0 pl-0 pb-5">
                        <div class="tab-pane active pr-5 pl-5" id="tab_pole1" role="tabpanel">
                            <form action="{{ route('ort_moderator_online_sabak_urok_conferens_ssylka_update', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id, 'online_sabak_kunu_id' => $onlain_sabak_urok->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <p class="mt-50">Сабакка шилтеме <span style="color: red">*</span></p>
                                <div class="col hover_for_focus p-0">
                                    <input name="ssylka_na_online_urok" type="text"
                                        class="for_focus_border pt-5 pb-5 pl-10 pr-15"
                                        placeholder="https://us04web.zoom.us/j/73249420194?pwd=SkVwN3JYTE11ekpyRDlMeU5Hc2dZdz09" autocomplete="off"
                                        title="Сабакка шилтеме" required
                                        oninvalid="this.setCustomValidity('Сабактын шилтемесин коюңуз!')"
                                        oninput="setCustomValidity('')"
                                        value="{{ $onlain_sabak_urok->ssylka_na_online_urok }}">
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="mt-50">Шилтемеге кошумча маалымат <small>(пароль, идентификатор ж.б.)</small></p>
                                        <div class="hover_for_focus">
                                            <textarea name="parol_i_identifikator_na_online_urok" class="frame_title for_focus_border2 pt-5 pb-5 pl-10 pr-15" placeholder="мис: пароль, идентификатор ж.б."
                                                cols="1" rows="1">{{$onlain_sabak_urok->parol_i_identifikator_na_online_urok}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4 hover_for_focus">
                                        <p class="mt-50">Сервис <small>(мис: zoom, google meet ж.б.)</small></p>
                                        <select name="service_online_uroka" class="for_focus_border2 pt-5 pb-5 pl-10 pr-15">
                                            <option selected disabled value="">Тандаңыз</option>
                                            <option value="1" @if ($onlain_sabak_urok->service_online_uroka == 1) selected @endif>Zoom</option>
                                            <option value="2" @if ($onlain_sabak_urok->service_online_uroka == 2) selected @endif>Google Meet</option>
                                            <option value="10" @if ($onlain_sabak_urok->service_online_uroka == 10) selected @endif>Башка</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="float-right mb-10 mt-20">
                                    <button type="submit"
                                        class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Сактоо</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pr-5 pl-5 " id="tab_pole2" role="tabpanel">
                            <div class="row align-items-center mt-50 stickme">
                                <div class="col"> </div>
                                <div class="col-auto">
                                    <div class="dropdown-primary dropdown open  dropleft">
                                        <button type="button" data-offset="0,4" id="dropdown-232" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="true"
                                            class="btn btn-outline-primary waves-effect waves-light btn-for-dropdown pr-20 pl-20"><i
                                                class="fas fa-plus"></i> Маалымат кошуу</button>
                                        <div class="dropdown-menu dropright for-dropdown-dropright"
                                            aria-labelledby="dropdown-232" data-dropdown-in="fadeIn"
                                            data-dropdown-out="fadeOut">
                                            <a class="dropdown-item waves-light waves-effect p-10 plus_youtube"
                                                type="button"><i class="fab fa-youtube pr-5"></i>Youtube видео</a>
                                            <a class="dropdown-item waves-light waves-effect p-10 plus_frame"
                                                type="button"><i class="fas fa-code"></i> Фрейм</a>
                                            <a class="ddff for_strelka dropdown-item waves-light waves-effect p-10"
                                                type="button" data-offset="0,4" id="dropdown-23" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="true">
                                                <i class="far fa-check-square pr-5" style="font-size: 16px;"></i> Тест <i
                                                    class="fas fa-chevron-right float-right pt-5"
                                                    style="font-size: 12px"></i>
                                            </a>
                                            <div class="dropdown-menu ddffrr" aria-labelledby="dropdown-23"
                                                data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                <a class="dropdown-item waves-light waves-effect pl-10 pt-5 pb-5 pr-15"
                                                    type="button">Тандоо <i class="fas fa-chevron-right float-right pt-5"
                                                        style="font-size: 12px"></i></a>
                                                <a class="dropdown-item waves-light waves-effect pl-10 pt-5 pb-5 pr-15"
                                                    href="#">Түзүү <i class="fas fa-plus float-right pt-5"
                                                        style="font-size: 12px"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form
                                action="{{ route('ort_moderator_online_sabak_urok_maalymat_update', ['online_sabak_id' => $onlain_sabak_predmet_sabak->id, 'online_sabak_kunu_id' => $onlain_sabak_urok->id]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <p class="mt-50 ">Кыскача маалымат</p>
                                <div class="col hover_for_focus p-0">
                                    <input name="short_title" type="text"
                                        class="for_focus_border2 pt-5 pb-5 pl-10 pr-15"
                                        placeholder="Кыскача маалымат" autocomplete="off"
                                        title="Кыскача маалымат!" value="{{ $onlain_sabak_urok->short_title }}">
                                </div>
                                <p class="mt-50">Тексттүү маалымат үчүн</p>
                                <textarea name="urok_text" id="summernote">{{ $onlain_sabak_urok->text }}</textarea>

                                <div class="youtube_parent mt-50 ">
                                    <div class="row align-items-center text_for_youtube">
                                        <div class="col border-bottom ml-15"></div>
                                        <div class="col-auto">
                                            <p class="mb-0">Ютуб видеолор: <span
                                                    class="col_for_youtube"></span></p>
                                        </div>
                                        <div class="col border-bottom mr-15"></div>
                                    </div>
                                    @foreach ($urok_youtubes as $urok_youtube)
                                        @php
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $urok_youtube->ssylka, $match);
                                            $youtube_id = $match[1];
                                        @endphp
                                        <div class="youtube  border pt-5 pb-5 pl-5 pr-5 mb-10 mt-40"
                                            style="border-radius: 2px;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mb-0 for_video_and_img"
                                                        style="background-image: url('{{ asset('/img/loader.gif') }}'); width:100%; height:100%;">
                                                        <img class="card-img-top img-fluid img_net_img"
                                                            src="{{ asset('/img/not_img.png') }}" alt="Сүрөт жок"
                                                            style="display: none;">
                                                        <div class="embed-responsive embed-responsive-16by9 youtube_embed"
                                                            style="border-radius: 2px;">
                                                            <iframe class="embed-responsive-item"
                                                                src="https://www.youtube.com/embed/{{ $youtube_id }}"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row align-items-center">
                                                        <div class="col dfr">
                                                        </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-trash btn-tool youtube_delet"></i>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mt-20">
                                                        <div class="col hover_for_focus">
                                                            <input name="youtube_title[]" type="text"
                                                                class="for_focus pt-5 pb-5 pl-10 pr-15"
                                                                placeholder="Видеонун аталышын жазыңыз" autocomplete="off"
                                                                required title="Видеонун аталышын жазыңыз!"
                                                                oninvalid="this.setCustomValidity('Видеонун аталышын жазыңыз!')"
                                                                oninput="setCustomValidity('')"
                                                                value="{{ $urok_youtube->title }}">
                                                            <div class="invalid-feedback">
                                                                Please choose a username.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mt-45">
                                                        <div class="col-auto pr-0">
                                                            <i class="fab fa-youtube pl-5"
                                                                style="color: red; font-size: 25px"></i>
                                                        </div>
                                                        <div class="col hover_for_focus">
                                                            <input name="youtube_link[]" type="text"
                                                                class="youtube_title for_focus_border pt-5 pb-5 pl-10 pr-15"
                                                                placeholder="https://www.youtube.com/watch?v=ZJwKlSRH5L0"
                                                                title="Видеонун шилтемесин коюңуз" autocomplete="off"
                                                                required title="Видеонун шилтемесин коюңуз!"
                                                                oninvalid="this.setCustomValidity('Видеонун шилтемесин коюңуз!')"
                                                                oninput="setCustomValidity('')"
                                                                value="{{ $urok_youtube->ssylka }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="frame_parent mt-50">
                                    <div class="row align-items-center text_for_frame">
                                        <div class="col border-bottom ml-15"></div>
                                        <div class="col-auto">
                                            <p class="mb-0">Фреймдер: <span class="col_for_frame"></span>
                                            </p>
                                        </div>
                                        <div class="col border-bottom mr-15"></div>
                                    </div>

                                    @foreach ($urok_frames as $urok_frame)
                                        <div class="frame border pt-5 pb-5 pl-5 pr-5 mb-10 mt-40"
                                            style="border-radius: 2px;">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card mb-0 for_video_and_img">
                                                        <img class="card-img-top img-fluid img_net_img" src="{{ asset('/img/no_frame.png') }}" alt="Сүрөт жок" style="display: none;">
                                                        <div class="frame_embed"  style="border-radius: 2px;">{!!$urok_frame->ssylka!!}</div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row align-items-center">
                                                        <div class="col dfr"></div>
                                                        <div class="col-auto"><i
                                                                class="fas fa-trash btn-tool frame_delet"></i></div>
                                                    </div>
                                                    <div class="row align-items-center mt-20">
                                                        <div class="col hover_for_focus">
                                                            <input name="frame_title[]"
                                                                type="text" class="for_focus pt-5 pb-5 pl-10 pr-15"
                                                                placeholder="Аталышын жазыңыз" autocomplete="off" required
                                                                title="Аталышын жазыңыз!" value="{{$urok_frame->title}}">
                                                        </div>
                                                    </div>
                                                    <div class="row align-items-center mt-45">
                                                        <div class="col-auto pr-0"><i class="fas fa-code pl-5"
                                                                style="color: #adb5bd; font-size: 20px"></i></div>
                                                        <div class="col hover_for_focus">
                                                            <textarea name="frame_link[]" class="frame_title for_focus_border pt-5 pb-5 pl-10 pr-15"
                                                                placeholder="&lt;iframe src=&quot;https://www.site.com/content&quot; width=&quot;100%&quot; height=&quot;100%&quot;&gt;&lt;/iframe&gt;"
                                                                cols="1" rows="3" required title="Кодду коюңуз">{{$urok_frame->ssylka}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                                <div class="float-right mb-10 mt-20">
                                    <button type="submit"
                                        class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Сактоо</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane pr-5 pl-5" id="tab_pole3" role="tabpanel">
                            <div class="row align-items-end mb-50 mt-50 hover_b_color">
                                <div class="col-auto pr-0">
                                    <p class="m-0 pb-5 border-bottom b_color">Сабак башталганга чейин көрүү
                                        <i class="fal fa-info-circle pl-10" type="button" data-toggle="tooltip"
                                            data-placement="top"
                                            title="Сабак башталганга чейин эле ушул сабакка тиешелүү маалыматтарды көрө алат. (мисалы: тест, видео, текст, ж.б.)"
                                            style="color: #007bff"></i>
                                    </p>
                                </div>
                                <div class="col pr-0 pl-0 border-bottom b_color"></div>
                                <div class="col-auto pl-0">
                                    <span class="pokaz_soderjimoe_do_nachalo_uroka float-right pb-5 border-bottom b_color"
                                        data-id="{{ $onlain_sabak_predmet_sabak->id }}"
                                        data-id1="{{ $onlain_sabak_urok->id }}">
                                        <input id="pokaz_soderjimoe_do_nachalo_uroka" type="checkbox"
                                            class="js-small js-switch js-primary pb-5"
                                            @if ($onlain_sabak_urok->pokaz_soderjimoe_do_nachalo_uroka == 1) checked @endif />
                                    </span>
                                </div>
                            </div>

                            <div class="row align-items-end mb-25 mt-50 hover_b_color">
                                <div class="col-auto pr-0">
                                    <div class="d-inline-block align-middle border-bottom b_color">
                                        <p class="mb-0"><b>Youtube плеер</b> <i class="fal fa-info-circle pl-10"
                                                type="button" data-toggle="tooltip" data-placement="top"
                                                title="Бул пунктта ютубга өтүп кетүүгө жана видео менен бөлүшүүгө болот"
                                                style="color: #007bff"></i></p>
                                        <p class="text-muted mb-0"><small>(ютубдун өзүнүн плеери көрсөтүлөт) </small></p>
                                    </div>
                                </div>
                                <div class="col pr-0 pl-0 border-bottom b_color"></div>
                                <div class="col-auto float-right pl-0">
                                    <div class="border-checkbox-section border-bottom b_color">
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" type="checkbox" id="checkbox_0_1"
                                                name="checkbox_0_0" @if ($onlain_sabak_urok->youtube_control_status == 1) checked @endif>
                                            <label class="border-checkbox-label m-0 pl-20 checkbox_0_1 checkbox_01"
                                                for="checkbox_0_1" data-id="{{ $onlain_sabak_predmet_sabak->id }}"
                                                data-id1="{{ $onlain_sabak_urok->id }}"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-end mb-25 mt-25 hover_b_color">
                                <div class="col-auto pr-0">
                                    <div class="d-inline-block align-middle border-bottom b_color">
                                        <p class="mb-0"><b>Сайттын плеери_1</b> <i class="fal fa-info-circle pl-10"
                                                type="button" data-toggle="tooltip" data-placement="top"
                                                title="Бул пунктта ютубга өтүп кетүүгө жана видео менен бөлүшүүгө болбойт, бирок ютубдун логотиби көрүнүп турат"
                                                style="color: #007bff"></i></p>
                                        <p class="text-muted mb-0"><small>(ютубка өтө албайт, бирок логотиби
                                                көрүнөт)</small></p>
                                    </div>
                                </div>
                                <div class="col pr-0 pl-0 border-bottom b_color"></div>
                                <div class="col-auto float-right pl-0">
                                    <div class="border-checkbox-section border-bottom b_color">
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" type="checkbox" id="checkbox_0_2"
                                                name="checkbox_0_0" @if ($onlain_sabak_urok->youtube_control_status == 0) checked @endif>
                                            <label class="border-checkbox-label m-0 pl-20 checkbox_0_2 checkbox_02"
                                                for="checkbox_0_2" data-id="{{ $onlain_sabak_predmet_sabak->id }}"
                                                data-id1="{{ $onlain_sabak_urok->id }}"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-end mb-25 mt-25 hover_b_color">
                                <div class="col-auto pr-0">
                                    <div class="d-inline-block align-middle border-bottom b_color">
                                        <p class="mb-0"><b>Сайттын плеери_2</b> <i class="fal fa-info-circle pl-10"
                                                type="button" data-toggle="tooltip" data-placement="top"
                                                title="Бул пунктта ютубга өтүп кетүүгө жана видео менен бөлүшүүгө болбойт жана логотип көрүнбөйт, бирок видеонун оң жана сол чети бир аз кесилет"
                                                style="color: #007bff"></i></p>
                                        <p class="text-muted mb-0"><small>(ютубдун логотиби көрүнбөйт, бирок видеонун эки
                                                чети кесилет)</small></p>
                                    </div>
                                </div>
                                <div class="col pr-0 pl-0 border-bottom b_color"></div>
                                <div class="col-auto float-right pl-0">
                                    <div class="border-checkbox-section border-bottom b_color">
                                        <div class="border-checkbox-group border-checkbox-group-primary">
                                            <input class="border-checkbox" type="checkbox" id="checkbox_0_3"
                                                name="checkbox_0_0" @if ($onlain_sabak_urok->youtube_control_status == 2) checked @endif>
                                            <label class="border-checkbox-label m-0 pl-20 checkbox_0_3 checkbox_03"
                                                for="checkbox_0_3" data-id="{{ $onlain_sabak_predmet_sabak->id }}"
                                                data-id1="{{ $onlain_sabak_urok->id }}"></label>
                                        </div>
                                    </div>
                                </div>
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
    <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
        window.onload = function() {
            autosize(document.querySelectorAll('textarea'));
        }
    </script>
    <script>
$(document).ready(function(){
    $.stickme({
        top: 30
    });
});


        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.text_for_youtube').hide();
        $('.text_for_frame').hide();

        $(function() {
            $(document).ready(function() {
                var col_youtube = $('.youtube').length;
                $(".col_for_youtube").html(col_youtube);
                if (col_youtube > 0) {
                    $('.text_for_youtube').show();
                } else {
                    $('.text_for_youtube').hide();
                }

                var col_frame = $('.frame').length;
                $(".col_for_frame").html(col_frame);
                if (col_frame > 0) {
                    $('.text_for_frame').show();
                } else {
                    $('.text_for_frame').hide();
                }
            });
        });



        $('.youtube_title').on('change keyup', function() {
            var $v1 = $(this).val()
            // Для youtube
            if ($v1.indexOf('youtube.com') + 1 || $v1.indexOf('youtu.be') + 1) {
                // Ищем и заменяем, чтобы проще обработать
                $v2 = $v1.replace('.com/embed/', '.com/watch?v=');
                $v1 = $v2.replace('.be/', '.com/watch?v=');
                //Отсеиваем ненужные части, чтобы получить чистый id
                $v2 = $v1.split(".com/watch?v=")[1];
                $v1 = $v2.split("&index")[0];
                $v2 = $v1.replace('&', '?');
                if ($v2.length == 11) {
                    //Получаем чистый id, вставляем его непосредственно в плеер col-md-4
                    $(this).parent().parent().parent().parent().children('.col-md-4').children().children(
                        '.img_net_img').hide();
                    $(this).parent().parent().parent().parent().children('.col-md-4').children().children(
                        '.youtube_embed').remove();
                    $(this).parent().parent().parent().parent().children('.col-md-4').children(".for_video_and_img")
                        .append(
                            '<div class="embed-responsive embed-responsive-16by9 youtube_embed" style="border-radius: 2px;"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' +
                            $v2 + '" allowfullscreen></iframe></div>');
                } else {
                    $(this).parent().parent().parent().parent().children('.col-md-4').children().children(
                        '.img_net_img').show();
                    $(this).parent().parent().parent().parent().children('.col-md-4').children().children(
                        '.youtube_embed').remove();
                }
            }
        });






        // var img = new Image(100, );
        // img.src = 'https://0lj.ru/wp-content/uploads/2009/03/d181d0bdd0b8d0bcd0bed0ba11.jpg';
        // img.onload = function() {
        //     $(".youtube_parent").append( img );
        // }

        $(".plus_youtube").click(function() {
            $(".youtube_parent").append(
                '<div class="youtube border pt-5 pb-5 pl-5 pr-5 mb-10 mt-40" style="border-radius: 2px;"><div class="row"><div class="col-md-4"><div class="card mb-0 for_video_and_img" style="background-image: url("https://ort.mugalim.edu.kg//img/loader.gif"); width:100%; height:100%;"><img class="card-img-top img-fluid img_net_img" src="{{ asset('/img/not_img.png') }}" alt="Сүрөт жок"></div></div><div class="col-md-8"><div class="row align-items-center"><div class="col"></div><div class="col-auto"><i class="fas fa-trash btn-tool youtube_delet"></i></div></div><div class="row align-items-center mt-20"><div class="col hover_for_focus"><input name="youtube_title[]" type="text" class="for_focus pt-5 pb-5 pl-10 pr-15" placeholder="Видеонун аталышын жазыңыз" required title="Видеонун аталышын жазыңыз" autocomplete="off"><div class="invalid-feedback">Видеонун аталышын жазыңыз!</div></div></div><div class="row align-items-center mt-45"><div class="col-auto pr-0"><i class="fab fa-youtube pl-5" style="color: red; font-size: 25px"></i></div><div class="col hover_for_focus"><input name="youtube_link[]" type="text" class="youtube_title for_focus_border pt-5 pb-5 pl-10 pr-15" placeholder="https://www.youtube.com/watch?v=ZJwKlSRH5L0" required title="Видеонун шилтемесин коюңуз" autocomplete="off"><div class="invalid-feedback">Видеонун шилтемесин коюңуз!</div></div></div></div></div></div>'
            );
            var col_youtube = $('.youtube').length;
            $(".col_for_youtube").html(col_youtube);
            if (col_youtube > 0) {
                $('.text_for_youtube').show();
            } else {
                $('.text_for_youtube').hide();
            }

            Toast.fire({
                icon: 'success',
                title: 'Кошулду'
            });
            $(".youtube_delet").click(function() {
                $(this).parent().parent().parent().parent().parent('.youtube').remove();
                Toast.fire({
                    icon: 'success',
                    title: 'Өчүрүлдү'
                });

                var col_youtube = $('.youtube').length;
                $(".col_for_youtube").html(col_youtube);
                if (col_youtube > 0) {
                    $('.text_for_youtube').show();
                } else {
                    $('.text_for_youtube').hide();
                }
            });
            $('.youtube_title').on('change keyup', function() {
                var $v1 = $(this).val()
                // Для youtube
                if ($v1.indexOf('youtube.com') + 1 || $v1.indexOf('youtu.be') + 1) {
                    // Ищем и заменяем, чтобы проще обработать
                    $v2 = $v1.replace('.com/embed/', '.com/watch?v=');
                    $v1 = $v2.replace('.be/', '.com/watch?v=');
                    //Отсеиваем ненужные части, чтобы получить чистый id
                    $v2 = $v1.split(".com/watch?v=")[1];
                    $v1 = $v2.split("&index")[0];
                    $v2 = $v1.replace('&', '?');
                    if ($v2.length == 11) {
                        //Получаем чистый id, вставляем его непосредственно в плеер col-md-4
                        $(this).parent().parent().parent().parent().children('.col-md-4').children()
                            .children('.img_net_img').hide();
                        $(this).parent().parent().parent().parent().children('.col-md-4').children()
                            .children('.youtube_embed').remove();
                        $(this).parent().parent().parent().parent().children('.col-md-4').children(
                            ".for_video_and_img").append(
                            '<div class="embed-responsive embed-responsive-16by9 youtube_embed"  style="border-radius: 2px;"><iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' +
                            $v2 + '" allowfullscreen></iframe></div>');
                    } else {
                        $(this).parent().parent().parent().parent().children('.col-md-4').children()
                            .children('.img_net_img').show();
                        $(this).parent().parent().parent().parent().children('.col-md-4').children()
                            .children('.youtube_embed').remove();
                    }
                }
            });
        });

        $(".youtube_delet").click(function() {
            $(this).parent().parent().parent().parent().parent('.youtube').remove();
            Toast.fire({
                icon: 'success',
                title: 'Өчүрүлдү'
            });
            var col_youtube = $('.youtube').length;
            $(".col_for_youtube").html(col_youtube);
            if (col_youtube > 0) {
                $('.text_for_youtube').show();
            } else {
                $('.text_for_youtube').hide();
            }
        });

        $(".plus_frame").click(function() {
            $(".frame_parent").append(
                '<div class="frame border pt-5 pb-5 pl-5 pr-5 mb-10 mt-40" style="border-radius: 2px;"><div class="row"><div class="col-md-4"><div class="card mb-0 for_video_and_img"><img class="card-img-top img-fluid img_net_img" src="{{ asset('/img/no_frame.png') }}" alt="Сүрөт жок"></div></div><div class="col-md-8"><div class="row align-items-center"><div class="col dfr"></div><div class="col-auto"><i class="fas fa-trash btn-tool frame_delet"></i></div></div><div class="row align-items-center mt-20"> <div class="col hover_for_focus"><input name="frame_title[]" type="text" class="for_focus pt-5 pb-5 pl-10 pr-15" placeholder="Аталышын жазыңыз" autocomplete="off" required title="Аталышын жазыңыз!"></div></div><div class="row align-items-center mt-45"><div class="col-auto pr-0"><i class="fas fa-code pl-5" style="color: #adb5bd; font-size: 20px"></i></div><div class="col hover_for_focus"><textarea name="frame_link[]" class="frame_title for_focus_border pt-5 pb-5 pl-10 pr-15" placeholder="&lt;iframe src=&quot;https://www.site.com/content&quot; width=&quot;100%&quot; height=&quot;100%&quot;&gt;&lt;/iframe&gt;" cols="1" rows="3" required title="Кодду коюңуз"></textarea></div></div></div></div></div>'
            );
            autosize($('textarea'));
            var col_frame = $('.frame').length;
            $(".col_for_frame").html(col_frame);
            if (col_frame > 0) {
                $('.text_for_frame').show();
            } else {
                $('.text_for_frame').hide();
            }
            Toast.fire({
                icon: 'success',
                title: 'Кошулду'
            });
            $(".frame_delet").click(function() {
                $(this).parent().parent().parent().parent().parent('.frame').remove();
                Toast.fire({
                    icon: 'success',
                    title: 'Өчүрүлдү'
                });
                var col_frame = $('.frame').length;
                $(".col_for_frame").html(col_frame);
                if (col_frame > 0) {
                    $('.text_for_frame').show();
                } else {
                    $('.text_for_frame').hide();
                }
            });
            $('.frame_title').on('change keyup', function() {
                var $frame_title = $(this).val()
                if ($frame_title.length > 26) {
                    //Получаем чистый id, вставляем его непосредственно в плеер col-md-4
                    $(this).parent().parent().parent().parent().children('.col-md-4').children()
                        .children('.img_net_img').hide();
                    $(this).parent().parent().parent().parent().children('.col-md-4').children()
                        .children('.frame_embed').remove();
                    $(this).parent().parent().parent().parent().children('.col-md-4').children(
                        ".for_video_and_img").append(
                        '<div class="frame_embed"  style="border-radius: 2px;">' + $frame_title +
                        '</div>');
                } else {
                    $(this).parent().parent().parent().parent().children('.col-md-4').children()
                        .children('.img_net_img').show();
                    $(this).parent().parent().parent().parent().children('.col-md-4').children()
                        .children('.frame_embed').remove();
                }
            });
        });

        $('.frame_title').on('change keyup', function() {
            var $frame_title = $(this).val()
            if ($frame_title.length > 26) {
                //Получаем чистый id, вставляем его непосредственно в плеер col-md-4
                $(this).parent().parent().parent().parent().children('.col-md-4').children()
                    .children('.img_net_img').hide();
                $(this).parent().parent().parent().parent().children('.col-md-4').children()
                    .children('.frame_embed').remove();
                $(this).parent().parent().parent().parent().children('.col-md-4').children(
                    ".for_video_and_img").append(
                    '<div class="frame_embed"  style="border-radius: 2px;">' + $frame_title + '</div>');
            } else {
                $(this).parent().parent().parent().parent().children('.col-md-4').children()
                    .children('.img_net_img').show();
                $(this).parent().parent().parent().parent().children('.col-md-4').children()
                    .children('.frame_embed').remove();
            }
        });

        $(".frame_delet").click(function() {
            $(this).parent().parent().parent().parent().parent('.frame').remove();
            Toast.fire({
                icon: 'success',
                title: 'Өчүрүлдү'
            });
            var col_frame = $('.frame').length;
            $(".col_for_frame").html(col_frame);
            if (col_frame > 0) {
                $('.text_for_frame').show();
            } else {
                $('.text_for_frame').hide();
            }
        });



        $(".for_strelka").click(
            function() {
                if ($(this).children('.for_strelka').hasClass('fa-rotate-90')) {
                    $(this).children('.fa-chevron-right').removeClass('fa-rotate-90');
                } else {
                    $(this).children('.fa-chevron-right').addClass('fa-rotate-90');
                }
            }
        );
        $(".btn-for-dropdown").click(
            function() {
                if ($('.for-dropdown-dropright').children().children('.fa-chevron-right').hasClass('fa-rotate-90')) {
                    $('.for-dropdown-dropright').children().children('.fa-chevron-right').removeClass('fa-rotate-90');
                }
            }
        );


        $(function() {
            $(document).ready(function() {
                $('.pokaz_soderjimoe_do_nachalo_uroka').click(function() {
                    var countryID1 = $(this).attr('data-id');
                    var countryID2 = $(this).attr('data-id1');
                    if (countryID1) {
                        jQuery.ajax({
                            url: '/moderator_panel_ort/online_sabak_edit/kunu_edit/chek_pokaz/' +
                                countryID1 + '/' + countryID2,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                if ($("#pokaz_soderjimoe_do_nachalo_uroka").is(
                                        ":checked")) {
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Сабак башталганга чейин көрө алат'
                                    });
                                } else {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Сабак башталганга чейин көрө албайт!'
                                    });
                                }
                            }
                        });
                    } else {}
                });
            });
        });
        $('input[name="checkbox_0_0"]').on('change', function() {
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
        });

        $(".checkbox_0_1").click(function() {
            var id_a1 = $(this).attr('data-id');
            var data_id2 = $(this).attr('data-id1');
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
            $.ajax({
                url: "/moderator_panel_ort/online_sabak_edit/kunu_edit/chek_youtube_1/" + id_a1 + '/' +
                    data_id2,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ютубдун өзүнүн плеери көрсөтүлөт'
                    });
                }
            });
        });
        $(".checkbox_0_2").click(function() {
            var id_a1 = $(this).attr('data-id');
            var data_id2 = $(this).attr('data-id1');
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
            $.ajax({
                url: "/moderator_panel_ort/online_sabak_edit/kunu_edit/chek_youtube_0/" + id_a1 + '/' +
                    data_id2,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ютубка өтө албайт, бирок логотиби көрүнөт'
                    });
                }
            });
        });
        $(".checkbox_0_3").click(function() {
            var id_a1 = $(this).attr('data-id');
            var data_id2 = $(this).attr('data-id1');
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
            $.ajax({
                url: "/moderator_panel_ort/online_sabak_edit/kunu_edit/chek_youtube_2/" + id_a1 + '/' +
                    data_id2,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Ютубдун логотиби көрүнбөйт, бирок видеонун эки чети кесилет'
                    });
                }
            });
        });

        $(function() {
            $("#for_nav_link1").click(
                function() {
                    $("#for_nav_link1").addClass('active');
                    $("#for_nav_link2").removeClass('active');
                    $("#for_nav_link3").removeClass('active');
                    $("#tab_pole1").addClass('active');
                    $("#tab_pole2").removeClass('active');
                    $("#tab_pole3").removeClass('active');
                }
            );
            $("#for_nav_link2").click(
                function() {
                    $("#for_nav_link2").addClass('active');
                    $("#for_nav_link1").removeClass('active');
                    $("#for_nav_link3").removeClass('active');
                    $("#tab_pole1").removeClass('active');
                    $("#tab_pole2").addClass('active');
                    $("#tab_pole3").removeClass('active');
                }
            );
            $("#for_nav_link3").click(
                function() {
                    $("#for_nav_link3").addClass('active');
                    $("#for_nav_link1").removeClass('active');
                    $("#for_nav_link2").removeClass('active');
                    $("#tab_pole1").removeClass('active');
                    $("#tab_pole2").removeClass('active');
                    $("#tab_pole3").addClass('active');
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
    <!-- для текстового редактора -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote({
                lang: 'ru-RU',
                minHeight: 150, // set minimum height of editor
                placeholder: 'Тексттүү маалымат үчүн',
                disableDragAndDrop: false,
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
@endsection
