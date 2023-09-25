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
            display: block;
            width: 100%;
            height: calc(2.25rem + 2px);
            padding: 0.375rem 0.75rem;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            box-shadow: inset 0 0 0 rgb(0 0 0 / 0%);
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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

        .number {
            display: inline-block;
            position: relative;
            width: 110px;
        }

        .number input[type="number"] {
            display: block;
            height: 32px;
            line-height: 32px;
            width: 100%;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            text-align: center;
            -moz-appearance: textfield;
            -webkit-appearance: textfield;
            appearance: textfield;
            border: none;
            font-weight: bold;
            color: green;
        }

        .number input[type="number"]::-webkit-outer-spin-button,
        .number input[type="number"]::-webkit-inner-spin-button {
            display: none;
        }

        .number-minus {
            position: absolute;
            top: 1px;
            left: 2px;
            bottom: 1px;
            width: 30px;
            padding: 0;
            display: block;
            text-align: center;
            border: none;
            border-right: 1px solid #ddd;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }

        .number-plus {
            position: absolute;
            top: 1px;
            right: 2px;
            bottom: 1px;
            width: 30px;
            padding: 0;
            display: block;
            text-align: center;
            border: none;
            border-left: 1px solid #ddd;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
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

        .strelki::-webkit-outer-spin-button,
        .strelki::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .sos-st-card1 h3 {
            display: inline-block;
        }

        .sos-st-card1 h3 i {
            color: #fff;
            font-size: 14px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            padding: 6px 0;
            text-align: center;
            margin-right: 0px;
            border: 8px solid transparent;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .sos-st-card1.twitter h3 {
            color: #42c0fb;
        }

        .sos-st-card1.twitter h3 i {
            background-color: #42c0fb;
            border-color: #bfeafe;
        }

        .sos-st-card1:hover h3 i {
            -webkit-transform: scale(1.2) rotate(35deg);
            transform: scale(1.2) rotate(35deg);
            cursor: pointer;
        }

        .remove-img {
            font-size: 14px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            padding: 9px 0;
            text-align: center;
            margin-right: 0px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            background-color: #fa0000;
            border-color: #ff0000;
        }

        .delet_variant {
            font-size: 14px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            padding: 0px 0;
            text-align: center;
            margin-right: 0px;
            border: 10px solid transparent;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
            display: none;
        }

        .delet_variant1:hover {
            background-color: #f2f7fb;
            border-color: #f2f7fb;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .variant_hover:hover .delet_variant {
            display: block;
        }

        .text11:hover {
            outline: 0;
            width: 100%;
            resize: none;
            border-bottom: 1px solid #17a2b8;
        }

        .variant_hover:hover .text11 {
            outline: 0;
            width: 100%;
            resize: none;
            border-bottom: 1px solid #17a2b8;
        }

        .text11:focus {
            background: #f8f9fa;
            outline: 0;
            width: 100%;
            resize: none;
        }

        .text11 {
            outline: 0;
            border-top: 0;
            border-left: 0;
            border-right: 0;
            border-bottom: 0;
            width: 100%;
            resize: none;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
            border-bottom: 1px solid white;
        }

        .foto1 {
            position: relative;
            width: 100%;
        }

        .foto1 img {
            width: 100%;
            height: auto;
        }

        .foto1 .foto2 {
            position: absolute;
            top: 7px;
            left: 5px;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            cursor: pointer;
            text-align: center;
        }

        .foto1 .foto2:hover {}

        .for_foto1 .for_foto2 {
            display: none;
        }

        .for_foto1:hover .for_foto2 {
            display: inline-block;
        }

        @media screen and (max-width: 768px) {
            .for-padding {
                padding-top: 40px;
            }
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
                        <li class="breadcrumb-item">
                            <a href="{{ route('ort_moderator_online_test_view') }}">Тесттер</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $test->title }}</a> </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h5>{{ $test->title }}</h5>
                    </div>
                    <div class="col-md-auto for-padding ">
                        <div class="">
                            <div class="row align-items-center">
                                <div class="col-auto pr-0">
                                    <p class="m-0 pr-10">Статус</p>
                                </div>
                                <div class="col border-bottom"></div>
                                <div class="col-auto pb-5 ">
                                    <span class="float-right pb-5 test_status" data-test_id="{{ $test->id }}">
                                        <input id="test_status" type="checkbox"
                                            class="js-small js-switch js-primary pb-5"
                                            @if ($test->status == 1) checked @endif />
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-block pb-0 pl-5 pr-5">
                <div class="col-12 p-0">
                    <div class="row pr-15 pl-15 ">
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link1" data-toggle="tab"
                                        href="#tab_pole1" role="tab" aria-selected="true"
                                        style="white-space: nowrap;"><i class="far fa-check-square pr-10"></i> Маалымат</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link active mb-0" id="for_nav_link2" data-toggle="tab"
                                        href="#tab_pole2" role="tab" aria-selected="false"
                                        style="white-space: nowrap;"><i class="far fa-layer-group pr-10"></i> Суроолор</a>
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
                        <div class="tab-pane pr-5 pl-5" id="tab_pole1" role="tabpanel">
                            <div class="row  mt-50">
                                <div class="col-md-9">
                                    <form action="{{ route('ort_moderator_online_test_update', $test->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-material mt-30">
                                            <div class="right-icon-control">
                                                <div class="form-group form-primary">
                                                    <input type="text" name="title"
                                                        class="form-control add_task_todo fill" required=""
                                                        value="{{ $test->title }}" title="Темасы"
                                                        oninvalid="this.setCustomValidity('Темасын жазыңыз!')"
                                                        oninput="setCustomValidity('')">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Темасы <span
                                                            style="color: red">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-50">Тест тууралуу маалымат <small class="pl-10">(сөзсүз эмес)</small>
                                        </p>
                                        <textarea name="opisanie" id="summernote">{{ $test->opisanie }}</textarea>
                                        <div class="form-row form-group">
                                            <div class="form-group col-md-4 mt-30 hover_for_focus">
                                                <label>Категория <span style="color: red">*</span></label>
                                                <select name="test_category_id" id="test_category_id"
                                                    class="for_focus_border2 productcategory" required=""
                                                    value="{{ old('test_category_id') }}" title="Категория"
                                                    oninvalid="this.setCustomValidity('Категорияны тандаңыз!')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="" disabled="true" selected="true">Категорияны
                                                        тандаңыз</option>
                                                    @foreach ($test_categories as $test_category)
                                                        <option value="{{ $test_category['id'] }}"
                                                            @if ($test_category->id == $test->test_category_id) selected @endif>
                                                            {{ $test_category['title'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 mt-30 hover_for_focus">
                                                <label>Подкатегория <span style="color: red">*</span></label>
                                                <select name="test_podcategory_id" id="test_podcategory_id"
                                                    class="for_focus_border2 productcategory" required=""
                                                    value="{{ old('test_podcategory_id') }}" title="Подкатегория"
                                                    oninvalid="this.setCustomValidity('Подкатегорияны тандаңыз!')"
                                                    oninput="setCustomValidity('')">
                                                    @php
                                                        $test_podcategory = $test_podcategories->where('id', $test->test_podcategory_id)->first();
                                                    @endphp
                                                    <option value="" disabled="true" selected="true">Алгач
                                                        категорияны тандаңыз</option>
                                                    <option selected value="{{ $test_podcategory->id }}">
                                                        {{ $test_podcategory->title }}</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 mt-30 hover_for_focus">
                                                <label>Тили <span style="color: red">*</span></label>
                                                <select name="language" class="for_focus_border2" required=""
                                                    value="{{ old('language') }}" title="Тили"
                                                    oninvalid="this.setCustomValidity('Тилди тандаңыз!')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="" disabled="true" selected="true">Тилди тандаңыз
                                                    </option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}"
                                                            @if ($language->id == $test->language) selected @endif>
                                                            {{ $language->language }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 mt-30">
                                                <div class="card mb-0 for_video_and_img" type="button">
                                                    <img class="card-img-top img-fluid img_net_img"
                                                        @if ($test->img != null) src="{{ asset('public/storage/testy/images/thumbnail/') }}/{{ $test->img }}" @else src="{{ asset('public/img/not_test.png') }}" @endif
                                                        alt="Сүрөт жок" id="rebate_old_imag">
                                                </div>
                                                <div class="form-group img_hide">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="rebate_imag"
                                                            name="rebate_imag"
                                                            accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                                        <span class="custom-file-label" for="rebate_imag"
                                                            data-browse="Выбрать">Сүрөт тандалган жок</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="row align-items-end mt-20 akcia hover_b_color">
                                                    <div class="col-auto">
                                                        <p class="mb-0">Баасы <small class="pl-5">(бир ай
                                                                үчүн)</small> <span style="color: red">*</span></p>
                                                    </div>
                                                    <div class="col pr-0 pl-0  border-bottom b_color text-right">
                                                        @if ($test->oldprice > 0)
                                                            <p class="mb-0 pr-30"><del>{{ $test->oldprice / 100 }}
                                                                    сом</del></p>
                                                        @endif
                                                    </div>
                                                    <div class="col-auto pl-0">
                                                        <div class="row">
                                                            <div class="col p-0">
                                                                <input style="width: 90px;"
                                                                    class="strelki for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                                    placeholder="0" type="number" pattern="\d+"
                                                                    name="price" min="0" max="99999"
                                                                    maxlength="5" required
                                                                    value="{{ $test->price / 100 }}" title="Баасы"
                                                                    oninvalid="this.setCustomValidity('Баасын көрсөтүңүз!')"
                                                                    oninput="setCustomValidity('')" autocomplete="off">
                                                            </div>
                                                            <div class="col-auto pl-0">
                                                                <input type="text" style="width: 50px;"
                                                                    class="for_akcia__2 pt-5 pb-5 pl-0 pr-15"
                                                                    value="сом" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-end mt-30 akcia hover_b_color">
                                                    <div class="col-auto">
                                                        <p class="mb-0">Узактыгы <small class="pl-5">(минута
                                                                менен)</small> <span style="color: red">*</span></p>
                                                    </div>
                                                    <div class="col pr-0 pl-0  border-bottom b_color"></div>
                                                    <div class="col-auto pl-0">
                                                        <div class="row">
                                                            <div class="col p-0">
                                                                <input style="width: 90px;"
                                                                    class="strelki for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                                    placeholder="0" type="number" pattern="\d+"
                                                                    name="prodoljitelnost" min="0" max="99999"
                                                                    maxlength="5" required
                                                                    value="{{ $test->time / 60 }}" title="Узактыгы"
                                                                    oninvalid="this.setCustomValidity('Убактысын көрсөтүңүз!')"
                                                                    oninput="setCustomValidity('')" autocomplete="off">
                                                            </div>
                                                            <div class="col-auto pl-0">
                                                                <input type="text" style="width: 80px;"
                                                                    class="for_akcia__2 pt-5 pb-5 pl-0 pr-15"
                                                                    value="минута" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-end mt-40 hover_b_color">
                                                    <div class="col-auto">
                                                        <div class="d-inline-block align-middle">
                                                            <p class="mb-0"><b>Мүмкүндүктөрдүн саны <span
                                                                        style="color: red">*</span></b></p>
                                                            <p class="text-muted mb-0"><small></small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col pr-5 pl-0 border-bottom b_color"></div>
                                                    <div class="col-auto float-right p-0">
                                                        <div class="border-checkbox-section">
                                                            <div
                                                                class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" type="checkbox"
                                                                    id="checkbox_0_1" name="checkbox_0_0"
                                                                    @if ($test->kol_popytkov == 0) checked @endif>
                                                                <label class="border-checkbox-label checkbox_popytki1 mb-0"
                                                                    for="checkbox_0_1">
                                                                    <p>чексиз</p>
                                                                </label>
                                                            </div>
                                                            <div
                                                                class="border-checkbox-group border-checkbox-group-primary pl-10">
                                                                <input class="border-checkbox" type="checkbox"
                                                                    id="checkbox_0_2" name="checkbox_0_0"
                                                                    @if ($test->kol_popytkov != 0) checked @endif>
                                                                <label class="border-checkbox-label checkbox_popytki2 mb-0"
                                                                    for="checkbox_0_2">
                                                                    <p>чектүү</p>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mt-30 for_col_popytkov"
                                                    @if ($test->kol_popytkov == 0) style="display: none;" @endif>
                                                    <div class="col-auto text-center ml-15">
                                                        <div class="form-group mb-0 required align-items-top">
                                                            <div class="row align-items-center">
                                                                <div class="col pl-0">
                                                                    <div class="number border" style="border-radius: 4px">
                                                                        <i class="fal fa-minus number-minus pt-2"
                                                                            onclick="this.nextElementSibling.stepDown()"></i>
                                                                        <input id="popytki" name="popytki"
                                                                            type="number"
                                                                            class="form-control form-control-border color1 color11"
                                                                            min="0" max="15" readonly
                                                                            style="background: none;" required=""
                                                                            value="{{ $test->kol_popytkov }}"
                                                                            title="Мүмкүндүктөрдүн саны"
                                                                            oninvalid="this.setCustomValidity('Мүмкүндүктөрдүн санын көрсөтүңүз!')"
                                                                            oninput="setCustomValidity('')">
                                                                        <i class="fal fa-plus number-plus pt-2"
                                                                            onclick="this.previousElementSibling.stepUp()"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col pr-0 pl-0">
                                                        <hr>
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="m-0"> <span>жолу</span> тапшыра алат</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right mb-10 mt-40">
                                            <button type="submit"
                                                class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20">Сактоо</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-auto border-right pr-0 pl-0"></div>
                                <div class="col">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content card-block pr-0 pl-0 pb-5">
            <div class="tab-pane" id="tab_pole3" role="tabpanel">
                <div class="card mt-50">
                    <div class="card-block">
                        <div class="row align-items-end mb-15 hover_b_color">
                            <div class="col-auto pr-0 mt-15">
                                <div class="d-inline-block align-middle border-bottom b_color">
                                    <p class="mb-0"><b>Туура жообу</b> <i class="fal fa-info-circle pl-10"
                                            type="button" data-toggle="tooltip" data-placement="top"
                                            title="Тесттин туура жообун качан көрсөтүү керектигин көзөмөлдөөгө болот."
                                            style="color: #007bff"></i></p>
                                    <p class="text-muted mb-0"><small>(туура жообун канча убакыттан кийин көрсө болот?)
                                        </small></p>
                                </div>
                            </div>
                            <div class="col pr-0 pl-0 border-bottom b_color  mt-15"></div>
                            <div class="col-md-auto  mt-15 float-right text-right">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" type="checkbox" id="checkbox_pokaz_otvetov_1"
                                            name="checkbox_pokaz_otvetov" data-test_id="{{ $test->id }}" @if ($test->pokaz_otvetov === null) checked @endif>
                                        <label class="border-checkbox-label checkbox_pokaz_otvetov_1 mb-0"
                                            for="checkbox_pokaz_otvetov_1" data-test_id="{{ $test->id }}">
                                            <p>көргөнгө болбойт</p>
                                        </label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary pl-10">
                                        <input class="border-checkbox" type="checkbox" id="checkbox_pokaz_otvetov_2"
                                            name="checkbox_pokaz_otvetov" @if ($test->pokaz_otvetov === null) @else checked @endif>
                                        <label class="border-checkbox-label checkbox_pokaz_otvetov_2 mb-0 mr-0"
                                            for="checkbox_pokaz_otvetov_2">
                                            <p>убакытты белгилөө</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $day01 = floor($test->pokaz_otvetov / 86400);
                        $hour01 = floor(($test->pokaz_otvetov - $day01 * 86400) / 3600);
                        $minute01 = floor(($test->pokaz_otvetov - $day01 * 86400 - $hour01 * 3600) / 60);
                        ?>
                        <div class="form-row form-group mt-50 align-items-end mb-0 show_checkbox_pokaz_otvetov" @if ($test->pokaz_otvetov === null) style="display: none;" @else  @endif>
                            <div class="form-group col mb-0">
                                <span class="">күн</span>
                                <select name="pokaz_otvetov_day" class="for_focus_border2" id="pokaz_otvetov_day">
                                    <option value="0">0</option>
                                    @foreach ($days as $day)
                                        <option value="{{ $day['day'] }}"
                                            @if ($day01 == $day['day']) selected @endif>{{ $day['title'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col mb-0">
                                <span class="">саат</span>
                                <select name="pokaz_otvetov_hour" class="for_focus_border2" id="pokaz_otvetov_hour">
                                    <option value="0">0</option>
                                    @foreach ($hours as $hour)
                                        <option value="{{ $hour['hour'] }}"
                                            @if ($hour01 == $hour['hour']) selected @endif>{{ $hour['title'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col mb-0">
                                <span class="">мүнөт</span>
                                <select name="pokaz_otvetov_minute" class="for_focus_border2" id="pokaz_otvetov_minute">
                                    <option value="0">0</option>
                                    @foreach ($minutes as $minute)
                                        <option value="{{ $minute['minute'] }}"
                                            @if ($minute01 == $minute['minute']) selected @endif>{{ $minute['title'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-auto text-right mb-0">
                                <button type="button" data-test_id="{{ $test->id }}"
                                    class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20 save_checkbox_pokaz_otvetov"
                                    style="padding: 0.375rem 0.75rem; height: calc(2.25rem + 2px); border: 1px solid #ced4da; border-radius: 2px;">Сактоо</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" @if ($test->price == 0) style="display: none;" @endif>
                    <div class="card-block">
                        <div class="row align-items-end mb-15 hover_b_color">
                            <div class="col-auto pr-0 mt-15">
                                <div class="d-inline-block align-middle border-bottom b_color">
                                    <p class="mb-0"><b>Колдонуу убактысы</b> <i class="fal fa-info-circle pl-10"
                                            type="button" data-toggle="tooltip" data-placement="top"
                                            title="Көрсөтүлгөн убакыттан кийин тест жабылат. Ал эми колдонуу үчүн кайрадан сатып алууга туура келет."
                                            style="color: #007bff"></i></p>
                                    <p class="text-muted mb-0"><small>(сатып алгандан кийин канча убакыт ачык болот?)
                                        </small></p>
                                </div>
                            </div>
                            <div class="col pr-0 pl-0 border-bottom b_color  mt-15"></div>
                            <div class="col-md-auto  mt-15 float-right text-right">
                                <div class="border-checkbox-section">
                                    <div class="border-checkbox-group border-checkbox-group-primary">
                                        <input class="border-checkbox" type="checkbox" id="checkbox_srok_dostupa_1"
                                            name="checkbox_srok_dostupa" data-test_id="{{ $test->id }}"
                                            @if ($test->srok_dostupa == 0) checked @endif>
                                        <label class="border-checkbox-label checkbox_srok_dostupa1 mb-0"
                                            for="checkbox_srok_dostupa_1" data-test_id="{{ $test->id }}">
                                            <p>чексиз</p>
                                        </label>
                                    </div>
                                    <div class="border-checkbox-group border-checkbox-group-primary pl-10">
                                        <input class="border-checkbox" type="checkbox" id="checkbox_srok_dostupa_2"
                                            name="checkbox_srok_dostupa" data-test_id="{{ $test->id }}"
                                            @if ($test->srok_dostupa != 0) checked @endif>
                                        <label class="border-checkbox-label checkbox_srok_dostupa2 mb-0 mr-0"
                                            for="checkbox_srok_dostupa_2" data-test_id="{{ $test->id }}">
                                            <p>чектүү</p>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        $god1 = floor($test->srok_dostupa / 31536000);
                        $mounth1 = floor(($test->srok_dostupa - $god1 * 31536000) / 2592000);
                        $day1 = floor(($test->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000) / 86400);
                        $hour1 = floor(($test->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400) / 3600);
                        $minute1 = floor(($test->srok_dostupa - $god1 * 31536000 - $mounth1 * 2592000 - $day1 * 86400 - $hour1 * 3600) / 60);
                        ?>
                        <div class="row mt-50 show_checkbox_srok_dostupa" @if ($test->srok_dostupa == 0) style="display: none;" @endif>
                            <div class="col-md">
                                <div class="form-row form-group mt-30 align-items-end mb-0">
                                    <div class="form-group col mb-0">
                                        <span class="">жыл</span>
                                        <select name="srok_dostupa_god" class="for_focus_border2" id="srok_dostupa_god">
                                            <option value="0">0</option>
                                            @foreach ($gods as $god)
                                                <option value="{{ $god['god'] }}"
                                                    @if ($god1 == $god['god']) selected @endif>{{ $god['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col mb-0">
                                        <span class="">ай</span>
                                        <select name="srok_dostupa_mounth" class="for_focus_border2" id="srok_dostupa_mounth">
                                            <option value="0">0</option>
                                            @foreach ($mounths as $mounth)
                                                <option value="{{ $mounth['mounth'] }}"
                                                    @if ($mounth1 == $mounth['mounth']) selected @endif>
                                                    {{ $mounth['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col mb-0">
                                        <span class="">күн</span>
                                        <select name="srok_dostupa_day" class="for_focus_border2" id="srok_dostupa_day">
                                            <option value="0">0</option>
                                            @foreach ($days as $day)
                                                <option value="{{ $day['day'] }}"
                                                    @if ($day1 == $day['day']) selected @endif>{{ $day['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-row form-group mt-30 align-items-end mb-0">
                                    <div class="form-group col mb-0">
                                        <span class="">саат</span>
                                        <select name="srok_dostupa_hour" class="for_focus_border2" id="srok_dostupa_hour">
                                            <option value="0">0</option>
                                            @foreach ($hours as $hour)
                                                <option value="{{ $hour['hour'] }}"
                                                    @if ($hour1 == $hour['hour']) selected @endif>
                                                    {{ $hour['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col mb-0">
                                        <span class="">мүнөт</span>
                                        <select name="srok_dostupa_minute" class="for_focus_border2" id="srok_dostupa_minute">
                                            <option value="0">0</option>
                                            @foreach ($minutes as $minute)
                                                <option value="{{ $minute['minute'] }}"
                                                    @if ($minute1 == $minute['minute']) selected @endif>
                                                    {{ $minute['title'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col text-right mb-0">
                                        <button type="button" data-test_id="{{ $test->id }}"
                                            class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20 save_checkbox_srok_dostupa"
                                            style="padding: 0.375rem 0.75rem; height: calc(2.25rem + 2px); border: 1px solid #ced4da; border-radius: 2px;">Сактоо</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="tab-content card-block pr-0 pl-0 pb-5">
            <div class="tab-pane active" id="tab_pole2" role="tabpanel">
                <div class="card stickme">
                    <div class="card-header pt-10 pb-10 pr-10">
                        <div class="row align-items-center">
                            <div class="col-auto pr-0">
                                <h5>Тесттин суроолору:</h5>
                            </div>
                            <div class="col pl-0">
                                @php
                                    $col_voprosov = $test_voprosys->count();
                                @endphp
                                <h5 id="col_vseh_voprosov">{{ $col_voprosov }}</h5>
                            </div>
                            <div class="col-auto">
                                <button type="button"
                                    class="btn btn-mat waves-effect waves-light btn-primary float-right pr-20 pl-20 plus_novyi_vopros"
                                    data-test_id="{{ $test->id }}" data-id_scroll="#m1"><i class="fas fa-plus pr-10"></i> Кошуу</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div><!-- /.col -->
                    <div class="col-md-9 append_vopros">
                        @foreach ($test_voprosys as $key => $value)
                            <div class="card" id="{{ $test_voprosys[$key]->id }}">
                                <div class="card-header pr-15 pl-15 pb-10 pt-10 border-bottom">
                                    <div class="row">
                                        <div class="col">
                                            <p class="m-0">№
                                                <input name="katar_nomeri" type="text"
                                                    style="background: none; border: none;"
                                                    data-test_id="{{ $test->id }}"
                                                    data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                    class="strelki autonumber num_nomber"
                                                    id="num_nomber{{ $test_voprosys[$key]->id }}" data-a-sign=""
                                                    data-p-sign="s" data-a-Sep="" data-a-Pad="false" data-l-Zero="deny"
                                                    data-v-Min="0" data-v-Max="100000" readonly
                                                    value="{{ $test_voprosys[$key]->katar_nomeri }}">
                                            </p>
                                        </div>
                                        <div class="col-auto text-muted">
                                            <i class="fas fa-grip-horizontal"></i>
                                        </div>
                                        <div class="col text-right">
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool remove-vopros"
                                                    data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                    data-test_id="{{ $test->id }}"><i
                                                        class="fas fa-trash"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-block pb-2 pt-2 pr-3 pl-3 class11 parent_variant">
                                    <div class="row align-items-top mt-15">
                                        <div class="col pr-0">
                                            <textarea class="text11 pt-5 pb-5 vopros_testa" rows="1" placeholder="Тесттин суроосун жазыңыз"
                                                name="vopros_testa" data-id="{{ $test_voprosys[$key]->id }}" data-test_id="{{ $test->id }}">{{ $test_voprosys[$key]->text_voprosa }}</textarea>
                                        </div>
                                        <div class="col-auto  sos-st-card1 twitter">
                                            <form action="#" method="POST" enctype="multipart/form-data"
                                                class="form1" data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                data-test_id="{{ $test->id }}">
                                                @csrf
                                                <label class="custom-file-upload p-0 m-0">
                                                    <input type="file" class="upload vopros_img_click"
                                                        name="rebate_image1" readonly=""
                                                        accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" hidden
                                                        data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                        data-test_id="{{ $test->id }}">

                                                    <h3 class="mb-0"><i class="fas fa-image"></i></h3>
                                                </label>
                                                <input type="number" name="id"
                                                    value="{{ $test_voprosys[$key]->id }}" hidden
                                                    class="input_test_vop_{{ $test_voprosys[$key]->id }}">
                                                <button hidden type="submit" id="submit{{ $test_voprosys[$key]->id }}"
                                                    class="btn btn-success"
                                                    data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                    data-test_id="{{ $test->id }}">Save img</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="progress progress-xs mt-15 progress_{{ $test_voprosys[$key]->id }}"
                                        style="display: none;">
                                        <div class="progress-bar" role="progressbar" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                    <div class="foto1 for_foto1 mt-20"
                                        @if ($test_voprosys[$key]->img_voprosa == null) style="display: none;" @endif>
                                        <img class="vopros_img"
                                            @if ($test_voprosys[$key]->img_voprosa != null) src="{{ asset('public/storage/testy/images/imgvoprosa/') }}/{{ $test_voprosys[$key]->img_voprosa }}" @else src="" @endif
                                            alt="" style="width: 100%; border-radius: 4px;">
                                        <div class="timeline foto2 for_foto2">
                                            <div>
                                                <i class="fas fa-times remove-img"
                                                    data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                    data-test_id="{{ $test->id }}" type="button"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-40"></div>
                                    @foreach ($test_otvetys->where('test_voprosy_id', $test_voprosys[$key]->id) as $test_otvety)
                                        <div class="row align-items-center variant_hover mt-20"
                                            id="test_otvety{{ $test_otvety->id }}">
                                            <div class="col-auto pr-0">
                                                <div class="checkbox-zoom zoom-primary mr-0">
                                                    <label class="mb-0">
                                                        <input type="checkbox" value="1" class="variant_check"
                                                            name="{{ $test_voprosys[$key]->id }}"
                                                            @if ($test_otvety->status_otveta == 1) checked @endif
                                                            data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"
                                                            data-test_otvety_id="{{ $test_otvety->id }}">
                                                        <span class="cr mr-0" style="border-radius: 50%;">
                                                            <i class="cr-icon icofont icofont-ui-check txt-default"
                                                                style="font-size: 9px; padding-top: 1px;"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col pr-0">
                                                <textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Бош вариант" name="variant_text"
                                                    data-test_otvety_id="{{ $test_otvety->id }}" data-test_id="{{ $test->id }}">{{ $test_otvety->test_otvety }}</textarea>
                                            </div>
                                            <div class="col-auto card-tools">
                                                <i role="button"
                                                    class="fas fa-times btn-tool delet_variant delet_variant1"
                                                    data-test_otvety_id="{{ $test_otvety->id }}"
                                                    data-test_id="{{ $test->id }}"></i>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="card-footer border-top pb-2 pt-2 pr-3 pl-3 ">
                                    <div class="row">
                                        <div class="col">
                                            <p class="mb-0 text-center variant_plus" data-test_id="{{ $test->id }}"
                                                data-test_voprosy_id="{{ $test_voprosys[$key]->id }}"><i
                                                    class="fas fa-plus btn-tool" role="button"> <span
                                                        class="pl-10">Вариант кошуу</span></i></p>
                                        </div>
                                        <div class="col-auto">
                                            <p class="mb-0 float-right"><input type="number" pattern="\d+"
                                                    name="vopros_ball" min="0" max="999" maxlength="3"
                                                    class="text11 text-right vopros_ball" placeholder="0"
                                                    value="{{ $test_voprosys[$key]->ball }}"
                                                    style="background: none; width: 45px;"
                                                    data-test_id="{{ $test->id }}"
                                                    data-test_voprosy_id="{{ $test_voprosys[$key]->id }}">балл</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- /.col -->
                    <div class="col"></div><!-- /.col -->
                    
                </div><!-- /.row -->
                <p id="m1"></p>
            </div>
        </div>



    </div>

    <div class="card ">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

    <script>
        window.onload = function() {
            autosize(document.querySelectorAll('textarea'));
        }
    </script>
    <script>
        $('.img_hide').hide();

        $(document).ready(function() {
            $.stickme({
                top: 70
            });
        });
        //<!-- для инпут тайп файл --> 
        $(document).ready(function() {
            bsCustomFileInput.init()
        })
        //<!-- для инпут тайп файл --> 

        var Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
        });

        
        $(".test_status").click(function() {
            var test_id = $(this).attr('data-test_id');
            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/status',
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        Toast.fire({
                            icon: 'error',
                            title: 'Тест жабылды'
                        });
                    }else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Тест ачылды'
                        });
                    }
                    
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


        $('input[name="checkbox_0_0"]').on('change', function() {
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
        });

        $(".checkbox_popytki2").click(function() {
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
            $(".for_col_popytkov").show();
            $("#popytki").attr('min', '1');
            $("#popytki").attr('value', '1');
        });
        $(".checkbox_popytki1").click(function() {
            $('input[name="checkbox_0_0"]').not(this).prop('checked', false);
            $(".for_col_popytkov").hide();
            $("#popytki").attr('min', '0');
            $("#popytki").attr('value', '0');
        });

        $(".checkbox_pokaz_otvetov_1").click(function() {
            $('input[name="checkbox_pokaz_otvetov"]').not(this).prop('checked', false);
            var test_id = $(this).attr('data-test_id');
            if ($('#checkbox_pokaz_otvetov_1').is(":checked")) {
                $(this).prop('checked', true);
            } else {
                $.ajax({
                    url: "/moderator_panel_ort/test/" + test_id + '/pokaz_otvetov_1/',
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $(".show_checkbox_pokaz_otvetov").animate({
                            height: "0px",
                            opacity: 0,
                        }, "linear");
                        
                        setTimeout(function() {
                            $(".show_checkbox_pokaz_otvetov").hide();
                        }, 1000);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });

        $(".checkbox_pokaz_otvetov_2").click(function() {
            $('input[name="checkbox_pokaz_otvetov"]').not(this).prop('checked', false);
            $(".show_checkbox_pokaz_otvetov").show();
            setTimeout(function() {
                $(".show_checkbox_pokaz_otvetov").animate({
                    height: "100%",
                    opacity: 1,
                }, "linear");
            }, 1000);
        });

        $(".save_checkbox_pokaz_otvetov").click(function() {
            event.preventDefault();
            var test_id = $(this).attr('data-test_id');
            let pokaz_otvetov_day = $("#pokaz_otvetov_day").val();
            let pokaz_otvetov_hour = $("#pokaz_otvetov_hour").val();
            let pokaz_otvetov_minute = $("#pokaz_otvetov_minute").val();

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/pokaz_otvetov_2/',
                type: "PUT",
                data: {
                    pokaz_otvetov_day: pokaz_otvetov_day,
                    pokaz_otvetov_hour: pokaz_otvetov_hour,
                    pokaz_otvetov_minute: pokaz_otvetov_minute,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        Toast.fire({
                            icon: 'success',
                            title: 'Туура жооптору тест тапшырып бүткөндө көрүнөт'
                        });
                    }else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Туура жооптору белгиленген убакыттан кийин көрүнөт'
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        
        $(".checkbox_srok_dostupa1").click(function() {
            $('input[name="checkbox_srok_dostupa"]').not(this).prop('checked', false);
            var test_id = $(this).attr('data-test_id');
            if ($('#checkbox_srok_dostupa_1').is(":checked")) {
                $(this).prop('checked', true);
            } else {
                $.ajax({
                    url: "/moderator_panel_ort/test/" + test_id + '/srok_dostupa_1/',
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        $(".show_checkbox_srok_dostupa").animate({
                            height: "0px",
                            opacity: 0,
                        }, "linear");
                        
                        setTimeout(function() {
                            $(".show_checkbox_srok_dostupa").hide();
                        }, 1000);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });

        $(".checkbox_srok_dostupa2").click(function() {
            $('input[name="checkbox_srok_dostupa"]').not(this).prop('checked', false);
            $(".show_checkbox_srok_dostupa").show();
            setTimeout(function() {
                $(".show_checkbox_srok_dostupa").animate({
                    height: "100%",
                    opacity: 1,
                }, "linear");
            }, 1000);
        });

        $(".save_checkbox_srok_dostupa").click(function() {
            event.preventDefault();
            var test_id = $(this).attr('data-test_id');
            let srok_dostupa_god = $("#srok_dostupa_god").val();
            let srok_dostupa_mounth  = $("#srok_dostupa_mounth ").val();
            let srok_dostupa_day = $("#srok_dostupa_day").val();
            let srok_dostupa_hour = $("#srok_dostupa_hour").val();
            let srok_dostupa_minute = $("#srok_dostupa_minute").val();

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/srok_dostupa_2/',
                type: "PUT",
                data: {
                    srok_dostupa_god: srok_dostupa_god,
                    srok_dostupa_mounth: srok_dostupa_mounth,
                    srok_dostupa_day: srok_dostupa_day,
                    srok_dostupa_hour: srok_dostupa_hour,
                    srok_dostupa_minute: srok_dostupa_minute,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    if (response == 0) {
                        $('#checkbox_srok_dostupa_1').prop('checked', true);
                        $('#checkbox_srok_dostupa_2').prop('checked', false);
                        $(".show_checkbox_srok_dostupa").animate({
                            height: "0px",
                            opacity: 0,
                        }, "linear");
                        setTimeout(function() {
                            $(".show_checkbox_srok_dostupa").hide();
                        }, 1000);
                        Toast.fire({
                            icon: 'success',
                            title: 'Тестти чексиз колдоно алат'
                        });
                    }else{
                        Toast.fire({
                            icon: 'success',
                            title: 'Тестти белгиленген убакытка чейин колдоно алат'
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
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
                placeholder: 'Тест тууралуу маалымат',
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

    <!-- для селектов-->
    <script type="text/javascript">
        jQuery(document).ready(function() {

            jQuery('select[name="test_category_id"]').on('change', function() {
                var countryID = jQuery(this).val();
                if (countryID) {
                    jQuery.ajax({
                        url: '/moderator_panel/testy/findProductName/' + countryID,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            jQuery('select[name="test_podcategory_id"]').empty();
                            $('select[name="test_podcategory_id"]').append(
                                '<option value="" disabled="true" selected="true">Подкатегорияны тандаңыз</option>'
                            );
                            jQuery.each(data, function(key, value) {
                                $('select[name="test_podcategory_id"]').append(
                                    '<option value="' + key + '">' + value +
                                    '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="test_podcategory_id"]').empty();
                }
            });
        });
    </script>
    <!-- для селектов-->

    <script type="text/javascript">
        //<!-- Для добавления картинки -->
        // отображения картинки
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#rebate_old_imag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#rebate_imag").change(function() {
                readURL(this);
            });
        });
        // отображения картинки

        // Картинка как кнопка для загрузки картинку
        $("#rebate_old_imag").click(function() {
            $("#rebate_imag").trigger('click');
        });
        // Картинка как кнопка для загрузки картинку
    </script>

    <script type="text/javascript">

    
        $(".remove-vopros").click(function() {
            event.preventDefault();
            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
            var test_id = $(this).attr('data-test_id');

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/vopros_delet/' + test_voprosy_id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#' + test_voprosy_id).animate({
                            height: "0px",
                            opacity: 0,
                            right: "+=1050px",
                        }, "linear");

                        setTimeout(function() {
                            $('#' + test_voprosy_id).remove();
                            var col = $('.append_vopros').find('.card').length;
                            document.getElementById("col_vseh_voprosov").innerHTML = col;
                            // Для нумерации вопросов теста
                            $('.num_nomber').each(function(i) {
                                $(this).val(i + 1 + '');
                            });
                            // Для нумерации вопросов теста 
                        }, 1500);
                        $(".num_nomber").autoNumeric('init');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(".remove-img").click(function() {
            event.preventDefault();
            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
            var test_id = $(this).attr('data-test_id');

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/img_delet/' + test_voprosy_id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response) {
                        $('#' + test_voprosy_id).children('.parent_variant').children('.foto1').hide();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        // отображения картинки
        $(document).ready(function() {
            $(".vopros_img_click").change(function() {
                var test_voprosy_id = $(this).attr('data-test_voprosy_id');
                var img_class = $('#' + test_voprosy_id).children('.parent_variant').children('.foto1')
                    .children('.vopros_img');
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        $(img_class).attr("src", event.target.result);
                    };
                    reader.readAsDataURL(file);
                }
                $('#' + test_voprosy_id).children('.parent_variant').children('.foto1').show();

                $('#submit' + test_voprosy_id).trigger('click');

                $('.progress_' + test_voprosy_id).show();
            });
        });
        // отображения картинки

        $('input[class="variant_check"]').on('change', function() {
            var vopros_testa_id = $(this).attr('data-test_voprosy_id');
            var test_otvety_id = $(this).attr('data-test_otvety_id');
            if ($(this).is(":checked")) {
                $('input[name="' + vopros_testa_id + '"]').not(this).prop('checked', false);
                $.ajax({
                    url: "/moderator_panel_ort/test/" + vopros_testa_id + '/vopros_checked/' +
                        test_otvety_id,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        console.log(response);
                        if (response != 0) {
                            $('input[name="' + vopros_testa_id + '"]').prop('checked', false);
                            $('input[data-test_otvety_id="' + response + '"]').prop('checked', true);
                            Toast.fire({
                                icon: 'error',
                                title: 'Бош вариантты белгилегенге болбойт!'
                            });
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });

            } else {
                $(this).prop('checked', true);
            }
        });

        $(".vopros_testa").change(function() {
            event.preventDefault();
            var vopros_testa_id = $(this).attr('data-id');
            var test_id = $(this).attr('data-test_id');
            let vopros_testa = $(this).val();

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/vopros_testa/' + vopros_testa_id +
                    '/update',
                type: "PUT",
                data: {
                    vopros_testa: vopros_testa,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    if (response) {}
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


        $(document).ready(function() {

        });


        $(".form1").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
            var test_id = $(this).attr('data-test_id');

            $.ajax({
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function(evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            percentComplete = parseInt(percentComplete * 100);

                            $('.progress-bar').css('width', percentComplete + '%');
                            if (percentComplete === 100) {
                                setTimeout(function() {
                                    $('.progress-bar').css('width', '0%');
                                }, 2000)
                            }
                        }
                    }, false);
                    return xhr;
                },
                url: "/moderator_panel_ort/test/" + test_id + '/img_12/' + test_voprosy_id + '/update',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    $('.progress_' + response).hide();
                },
                error: function(error) {
                    console.log(error);
                    $('.progress_' + test_voprosy_id).hide();
                    $('#' + test_voprosy_id).children('.parent_variant').children('.foto1').hide();
                }
            });
        });





        $(".delet_variant").click(function() {
            event.preventDefault();
            var test_otvety_id = $(this).attr('data-test_otvety_id');
            var test_id = $(this).attr('data-test_id');

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/variant_delet/' + test_otvety_id,
                type: "GET",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response) {
                        const id = 'test_otvety' + response;
                        $('#' + id).remove();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


        $(".vopros_ball").change(function() {
            event.preventDefault();
            var vopros_testa_id = $(this).attr('data-test_voprosy_id');
            var test_id = $(this).attr('data-test_id');
            let vopros_ball = $(this).val();

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/vopros_ball/' + vopros_testa_id + '/update',
                type: "PUT",
                data: {
                    vopros_ball: vopros_ball,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    if (response) {}
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


        $(".variant_text").change(function() {
            event.preventDefault();
            var test_otvety_id = $(this).attr('data-test_otvety_id');
            var test_id = $(this).attr('data-test_id');
            let variant_text = $(this).val();

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/otvet_testa/' + test_otvety_id + '/update',
                type: "PUT",
                data: {
                    variant_text: variant_text,
                    _token: "{{ csrf_token() }}",
                },
                success: function(response) {
                    console.log(response);
                    if (response) {}
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });

        $(".variant_plus").click(function() {
            var test_id = $(this).attr('data-test_id');
            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
            jQuery.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/pluse_otvet_testa/' + test_voprosy_id,
                type: "GET",
                dataType: "json",

                success: function(result) {
                    $('#' + test_voprosy_id).children('.parent_variant').append(
                        '<div class="row align-items-center variant_hover mt-20" id="test_otvety' +
                        result +
                        '"><div class="col-auto pr-0"><div class="checkbox-zoom zoom-primary mr-0"><label class="mb-0"><input type="checkbox" value="1" class="variant_check" name="' +
                        test_voprosy_id + '" data-test_voprosy_id="' + test_voprosy_id +
                        '" data-test_otvety_id="' + result +
                        '"><span class="cr mr-0" style="border-radius: 50%;"><i class="cr-icon icofont icofont-ui-check txt-default" style="font-size: 9px; padding-top: 1px;"></i></span></label></div></div><div class="col pr-0"><textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Жаңы вариант" name="variant_text" data-test_otvety_id="' +
                        result + '" data-test_id="' + test_id +
                        '"></textarea></div><div class="col-auto card-tools"><i role="button" class="fas fa-times btn-tool delet_variant delet_variant1" data-test_otvety_id="' +
                        result + '" data-test_id="' + test_id + '"></i></div></div>');

                    autosize($('textarea'));

                    $(".delet_variant").click(function() {
                        event.preventDefault();
                        var test_otvety_id = $(this).attr('data-test_otvety_id');
                        var test_id = $(this).attr('data-test_id');

                        $.ajax({
                            url: "/moderator_panel_ort/test/" + test_id +
                                '/variant_delet/' + test_otvety_id,
                            type: "GET",
                            dataType: "json",
                            success: function(response) {
                                if (response) {
                                    const id = 'test_otvety' + response;
                                    $('#' + id).remove();
                                }
                            },
                        });
                    });
                    $('input[class="variant_check"]').on('change', function() {
                        var vopros_testa_id = $(this).attr('data-test_voprosy_id');
                        var test_otvety_id = $(this).attr('data-test_otvety_id');
                        if ($(this).is(":checked")) {
                            $('input[name="' + vopros_testa_id + '"]').not(this).prop('checked',
                                false);
                            $.ajax({
                                url: "/moderator_panel_ort/test/" + vopros_testa_id +
                                    '/vopros_checked/' + test_otvety_id,
                                type: "GET",
                                dataType: "json",
                                success: function(response) {
                                    console.log(response);
                                    if (response != 0) {
                                        $('input[name="' + vopros_testa_id + '"]')
                                            .prop('checked', false);
                                        $('input[data-test_otvety_id="' + response +
                                            '"]').prop('checked', true);
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Бош вариантты белгилегенге болбойт!'
                                        });
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });

                        } else {
                            $(this).prop('checked', true);
                        }
                    });
                    //coхранить вариант
                    $(".variant_text").change(function() {
                        event.preventDefault();
                        var test_otvety_id = $(this).attr('data-test_otvety_id');
                        var test_id = $(this).attr('data-test_id');
                        let variant_text = $(this).val();

                        $.ajax({
                            url: "/moderator_panel_ort/test/" + test_id +
                                '/otvet_testa/' + test_otvety_id + '/update',
                            type: "PUT",
                            data: {
                                variant_text: variant_text,
                                _token: "{{ csrf_token() }}",
                            },
                            success: function(response) {
                                console.log(response);
                                if (response) {}
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    });
                    //coхранить вариант
                },
                error: function(error) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Кайра кошуп көрүңүз'
                    });
                }
            });

        });


        $(".plus_novyi_vopros").click(function() {
            event.preventDefault();
            var test_id = $(this).attr('data-test_id');

            $.ajax({
                url: "/moderator_panel_ort/test/" + test_id + '/plus_novyi_vopros',
                type: "GET",
                dataType: "json",
                success: function(data) {
                    if (data) {
                        $('.append_vopros').append('<div class="card" id="' + data.test_vopros_id +
                            '"><div class="card-header pr-15 pl-15 pb-10 pt-10 border-bottom"><div class="row"><div class="col"><p class="m-0">№ <input name="katar_nomeri" type="text" style="background: none; border: none;" data-test_id="{{ $test->id }}" data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '" class="strelki autonumber num_nomber" id="num_nomber' + data
                            .test_vopros_id +
                            '" data-a-sign="" data-p-sign="s" data-a-Sep="" data-a-Pad="false" data-l-Zero="deny" data-v-Min="0" data-v-Max="100000" readonly value="' +
                            data.test_vopros_katar_nomeri +
                            '"> </p> </div> <div class="col-auto text-muted"> <i class="fas fa-grip-horizontal"></i> </div> <div class="col text-right"> <div class="card-tools"> <button type="button" class="btn btn-tool remove-vopros" data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '" data-test_id="{{ $test->id }}"><i class="fas fa-trash"></i></button> </div> </div> </div> </div> <div class="card-block pb-2 pt-2 pr-3 pl-3 class11 parent_variant"> <div class="row align-items-top mt-15"> <div class="col pr-0"> <textarea class="text11 pt-5 pb-5 vopros_testa" rows="1" placeholder="Тесттин суроосун жазыңыз" name="vopros_testa" data-id="' +
                            data.test_vopros_id +
                            '" data-test_id="{{ $test->id }}"></textarea> </div> <div class="col-auto  sos-st-card1 twitter"> <form action="#" method="POST" enctype="multipart/form-data" class="form1" data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '" data-test_id="{{ $test->id }}"> @csrf <label class="custom-file-upload p-0 m-0"> <input type="file" class="upload vopros_img_click" name="rebate_image1" readonly="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" hidden data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '" data-test_id="{{ $test->id }}"> <h3 class="mb-0"><i class="fas fa-image"></i></h3> </label> <input type="number" name="id" value="' +
                            data.test_vopros_id + '" hidden class="input_test_vop_' + data
                            .test_vopros_id + '"> <button hidden type="submit" id="submit' + data
                            .test_vopros_id + '" class="btn btn-success" data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '" data-test_id="{{ $test->id }}">Save img</button> </form> </div> </div> <div class="progress progress-xs mt-15 progress_' +
                            data.test_vopros_id +
                            '" style="display: none;"> <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"> </div> </div> <div class="foto1 for_foto1 mt-20" style="display: none;"> <img class="vopros_img" src="" alt="" style="width: 100%; border-radius: 4px;"> <div class="timeline foto2 for_foto2"> <div> <i class="fas fa-times remove-img" data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '" data-test_id="{{ $test->id }}" type="button"></i> </div> </div> </div> <div class="mt-40"></div> <div class="row align-items-center variant_hover mt-20" id="test_otvety' +
                            data.test_otvet1_id +
                            '"> <div class="col-auto pr-0"> <div class="checkbox-zoom zoom-primary mr-0"> <label class="mb-0"> <input type="checkbox" value="1" class="variant_check" name="' +
                            data.test_vopros_id + '" data-test_voprosy_id="' + data.test_vopros_id +
                            '" data-test_otvety_id="' + data.test_otvet1_id +
                            '"> <span class="cr mr-0" style="border-radius: 50%;"> <i class="cr-icon icofont icofont-ui-check txt-default" style="font-size: 9px; padding-top: 1px;"></i> </span> </label> </div> </div> <div class="col pr-0"> <textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Бош вариант" name="variant_text" data-test_otvety_id="' +
                            data.test_otvet1_id +
                            '" data-test_id="{{ $test->id }}">А</textarea> </div> <div class="col-auto card-tools"> <i role="button" class="fas fa-times btn-tool delet_variant delet_variant1" data-test_otvety_id="' +
                            data.test_otvet1_id +
                            '" data-test_id="{{ $test->id }}"></i> </div> </div> <div class="row align-items-center variant_hover mt-20" id="test_otvety' +
                            data.test_otvet2_id +
                            '"> <div class="col-auto pr-0"> <div class="checkbox-zoom zoom-primary mr-0"> <label class="mb-0"> <input type="checkbox" value="1" class="variant_check" name="' +
                            data.test_vopros_id + '" data-test_voprosy_id="' + data.test_vopros_id +
                            '" data-test_otvety_id="' + data.test_otvet2_id +
                            '"> <span class="cr mr-0" style="border-radius: 50%;"> <i class="cr-icon icofont icofont-ui-check txt-default" style="font-size: 9px; padding-top: 1px;"></i> </span> </label> </div> </div> <div class="col pr-0"> <textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Бош вариант" name="variant_text" data-test_otvety_id="' +
                            data.test_otvet2_id +
                            '" data-test_id="{{ $test->id }}">Б</textarea> </div> <div class="col-auto card-tools"> <i role="button" class="fas fa-times btn-tool delet_variant delet_variant1" data-test_otvety_id="' +
                            data.test_otvet2_id +
                            '" data-test_id="{{ $test->id }}"></i> </div> </div> <div class="row align-items-center variant_hover mt-20" id="test_otvety' +
                            data.test_otvet3_id +
                            '"> <div class="col-auto pr-0"> <div class="checkbox-zoom zoom-primary mr-0"> <label class="mb-0"> <input type="checkbox" value="1" class="variant_check" name="' +
                            data.test_vopros_id + '" data-test_voprosy_id="' + data.test_vopros_id +
                            '" data-test_otvety_id="' + data.test_otvet3_id +
                            '"> <span class="cr mr-0" style="border-radius: 50%;"> <i class="cr-icon icofont icofont-ui-check txt-default" style="font-size: 9px; padding-top: 1px;"></i> </span> </label> </div> </div> <div class="col pr-0"> <textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Бош вариант" name="variant_text" data-test_otvety_id="' +
                            data.test_otvet3_id +
                            '" data-test_id="{{ $test->id }}">В</textarea> </div> <div class="col-auto card-tools"> <i role="button" class="fas fa-times btn-tool delet_variant delet_variant1" data-test_otvety_id="' +
                            data.test_otvet3_id +
                            '" data-test_id="{{ $test->id }}"></i> </div> </div> <div class="row align-items-center variant_hover mt-20" id="test_otvety' +
                            data.test_otvet4_id +
                            '"> <div class="col-auto pr-0"> <div class="checkbox-zoom zoom-primary mr-0"> <label class="mb-0"> <input type="checkbox" value="1" class="variant_check" name="' +
                            data.test_vopros_id + '" data-test_voprosy_id="' + data.test_vopros_id +
                            '" data-test_otvety_id="' + data.test_otvet4_id +
                            '"> <span class="cr mr-0" style="border-radius: 50%;"> <i class="cr-icon icofont icofont-ui-check txt-default" style="font-size: 9px; padding-top: 1px;"></i> </span> </label> </div> </div> <div class="col pr-0"> <textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Бош вариант" name="variant_text" data-test_otvety_id="' +
                            data.test_otvet4_id +
                            '" data-test_id="{{ $test->id }}">Г</textarea> </div> <div class="col-auto card-tools"> <i role="button" class="fas fa-times btn-tool delet_variant delet_variant1" data-test_otvety_id="' +
                            data.test_otvet4_id +
                            '" data-test_id="{{ $test->id }}"></i> </div> </div> </div> <div class="card-footer border-top pb-2 pt-2 pr-3 pl-3 "> <div class="row"><div class="col"> <p class="mb-0 text-center variant_plus" data-test_id="{{ $test->id }}" data-test_voprosy_id="' +
                            data.test_vopros_id +
                            '"><i class="fas fa-plus btn-tool" role="button"> <span class="pl-10">Вариант кошуу</span></i></p> </div> <div class="col-auto"> <p class="mb-0 float-right"><input type="number" pattern="\d+" name="vopros_ball" min="0" max="999" maxlength="3" class="text11 text-right vopros_ball" placeholder="0" value="1" style="background: none; width: 45px;" data-test_id="{{ $test->id }}" data-test_voprosy_id="' +
                            data.test_vopros_id + '">балл</p> </div> </div> </div> </div>');

                        autosize($('textarea'));

                        document.getElementById("col_vseh_voprosov").innerHTML = data
                            .test_vopros_katar_nomeri;
                        $(".num_nomber").autoNumeric('init');

                        var destination = $('#m1').offset().top;
                        jQuery("html:not(:animated),body:not(:animated)").animate({
                        scrollTop: destination
                        }, 2000);

                        $(".remove-vopros").click(function() {
                            event.preventDefault();
                            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
                            var test_id = $(this).attr('data-test_id');

                            $.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/vopros_delet/' + test_voprosy_id,
                                type: "GET",
                                dataType: "json",
                                success: function(response) {
                                    console.log(response);
                                    if (response) {
                                        $('#' + test_voprosy_id).animate({
                                            height: "0px",
                                            opacity: 0,
                                            right: "+=1050px",
                                        }, "linear");

                                        setTimeout(function() {
                                            $('#' + test_voprosy_id)
                                                .remove();
                                            var col = $('.append_vopros')
                                                .find('.card').length;
                                            document.getElementById(
                                                    "col_vseh_voprosov")
                                                .innerHTML = col;
                                            // Для нумерации вопросов теста
                                            $('.num_nomber').each(function(
                                                i) {
                                                $(this).val(i + 1 +
                                                    '');
                                            });
                                            // Для нумерации вопросов теста 
                                        }, 1500);
                                        $(".num_nomber").autoNumeric('init');

                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });

                        $(".remove-img").click(function() {
                            event.preventDefault();
                            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
                            var test_id = $(this).attr('data-test_id');

                            $.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/img_delet/' + test_voprosy_id,
                                type: "GET",
                                dataType: "json",
                                success: function(response) {
                                    console.log(response);
                                    if (response) {
                                        $('#' + test_voprosy_id).children(
                                            '.parent_variant').children(
                                            '.foto1').hide();
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });

                        $(document).ready(function() {
                            $(".vopros_img_click").change(function() {
                                var test_voprosy_id = $(this).attr(
                                    'data-test_voprosy_id');
                                var img_class = $('#' + test_voprosy_id).children(
                                    '.parent_variant').children('.foto1').children(
                                    '.vopros_img');
                                const file = this.files[0];
                                if (file) {
                                    let reader = new FileReader();
                                    reader.onload = function(event) {
                                        $(img_class).attr("src", event.target
                                            .result);
                                    };
                                    reader.readAsDataURL(file);
                                }
                                $('#' + test_voprosy_id).children('.parent_variant')
                                    .children('.foto1').show();

                                $('#submit' + test_voprosy_id).trigger('click');

                                $('.progress_' + test_voprosy_id).show();
                            });
                        });
                        // отображения картинки

                        $('input[class="variant_check"]').on('change', function() {
                            var vopros_testa_id = $(this).attr('data-test_voprosy_id');
                            var test_otvety_id = $(this).attr('data-test_otvety_id');
                            if ($(this).is(":checked")) {
                                $('input[name="' + vopros_testa_id + '"]').not(this).prop(
                                    'checked', false);
                                $.ajax({
                                    url: "/moderator_panel_ort/test/" +
                                        vopros_testa_id + '/vopros_checked/' +
                                        test_otvety_id,
                                    type: "GET",
                                    dataType: "json",
                                    success: function(response) {
                                        console.log(response);
                                        if (response != 0) {
                                            $('input[name="' + vopros_testa_id +
                                                '"]').prop('checked', false);
                                            $('input[data-test_otvety_id="' +
                                                response + '"]').prop('checked',
                                                true);
                                            Toast.fire({
                                                icon: 'error',
                                                title: 'Бош вариантты белгилегенге болбойт!'
                                            });
                                        }
                                    },
                                    error: function(error) {
                                        console.log(error);
                                    }
                                });

                            } else {
                                $(this).prop('checked', true);
                            }
                        });

                        $(".vopros_testa").change(function() {
                            event.preventDefault();
                            var vopros_testa_id = $(this).attr('data-id');
                            var test_id = $(this).attr('data-test_id');
                            let vopros_testa = $(this).val();

                            $.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/vopros_testa/' + vopros_testa_id + '/update',
                                type: "PUT",
                                data: {
                                    vopros_testa: vopros_testa,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response) {}
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });


                        $(document).ready(function() {

                        });


                        $(".form1").submit(function(e) {
                            e.preventDefault();
                            const fd = new FormData(this);
                            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
                            var test_id = $(this).attr('data-test_id');

                            $.ajax({
                                xhr: function() {
                                    var xhr = new window.XMLHttpRequest();
                                    xhr.upload.addEventListener("progress",
                                        function(evt) {
                                            if (evt.lengthComputable) {
                                                var percentComplete = evt
                                                    .loaded / evt.total;
                                                percentComplete = parseInt(
                                                    percentComplete * 100);

                                                $('.progress-bar').css('width',
                                                    percentComplete + '%');
                                                if (percentComplete === 100) {
                                                    setTimeout(function() {
                                                        $('.progress-bar')
                                                            .css(
                                                                'width',
                                                                '0%');
                                                    }, 2000)
                                                }
                                            }
                                        }, false);
                                    return xhr;
                                },
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/img_12/' + test_voprosy_id + '/update',
                                method: 'post',
                                data: fd,
                                cache: false,
                                contentType: false,
                                processData: false,
                                dataType: 'json',
                                success: function(response) {
                                    $('.progress_' + response).hide();
                                },
                                error: function(error) {
                                    console.log(error);
                                    $('.progress_' + test_voprosy_id).hide();
                                    $('#' + test_voprosy_id).children('.parent_variant')
                                        .children('.foto1').hide();
                                }
                            });
                        });





                        $(".delet_variant").click(function() {
                            event.preventDefault();
                            var test_otvety_id = $(this).attr('data-test_otvety_id');
                            var test_id = $(this).attr('data-test_id');

                            $.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/variant_delet/' + test_otvety_id,
                                type: "GET",
                                dataType: "json",
                                success: function(response) {
                                    console.log(response);
                                    if (response) {
                                        const id = 'test_otvety' + response;
                                        $('#' + id).remove();
                                    }
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });


                        $(".vopros_ball").change(function() {
                            event.preventDefault();
                            var vopros_testa_id = $(this).attr('data-test_voprosy_id');
                            var test_id = $(this).attr('data-test_id');
                            let vopros_ball = $(this).val();

                            $.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/vopros_ball/' + vopros_testa_id + '/update',
                                type: "PUT",
                                data: {
                                    vopros_ball: vopros_ball,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response) {}
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });


                        $(".variant_text").change(function() {
                            event.preventDefault();
                            var test_otvety_id = $(this).attr('data-test_otvety_id');
                            var test_id = $(this).attr('data-test_id');
                            let variant_text = $(this).val();

                            $.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/otvet_testa/' + test_otvety_id + '/update',
                                type: "PUT",
                                data: {
                                    variant_text: variant_text,
                                    _token: "{{ csrf_token() }}",
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response) {}
                                },
                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });

                        $(".variant_plus").click(function() {
                            var test_id = $(this).attr('data-test_id');
                            var test_voprosy_id = $(this).attr('data-test_voprosy_id');
                            jQuery.ajax({
                                url: "/moderator_panel_ort/test/" + test_id +
                                    '/pluse_otvet_testa/' + test_voprosy_id,
                                type: "GET",
                                dataType: "json",

                                success: function(result) {
                                    $('#' + test_voprosy_id).children(
                                        '.parent_variant').append(
                                        '<div class="row align-items-center variant_hover mt-20" id="test_otvety' +
                                        result +
                                        '"><div class="col-auto pr-0"><div class="checkbox-zoom zoom-primary mr-0"><label class="mb-0"><input type="checkbox" value="1" class="variant_check" name="' +
                                        test_voprosy_id +
                                        '" data-test_voprosy_id="' +
                                        test_voprosy_id +
                                        '" data-test_otvety_id="' + result +
                                        '"><span class="cr mr-0" style="border-radius: 50%;"><i class="cr-icon icofont icofont-ui-check txt-default" style="font-size: 9px; padding-top: 1px;"></i></span></label></div></div><div class="col pr-0"><textarea class="text11 variant_text" rows="1" cols="100%" placeholder="Жаңы вариант" name="variant_text" data-test_otvety_id="' +
                                        result + '" data-test_id="' + test_id +
                                        '"></textarea></div><div class="col-auto card-tools"><i role="button" class="fas fa-times btn-tool delet_variant delet_variant1" data-test_otvety_id="' +
                                        result + '" data-test_id="' + test_id +
                                        '"></i></div></div>');

                                    autosize($('textarea'));

                                    $(".delet_variant").click(function() {
                                        event.preventDefault();
                                        var test_otvety_id = $(this).attr(
                                            'data-test_otvety_id');
                                        var test_id = $(this).attr(
                                            'data-test_id');

                                        $.ajax({
                                            url: "/moderator_panel_ort/test/" +
                                                test_id +
                                                '/variant_delet/' +
                                                test_otvety_id,
                                            type: "GET",
                                            dataType: "json",
                                            success: function(
                                                response) {
                                                if (response) {
                                                    const id =
                                                        'test_otvety' +
                                                        response;
                                                    $('#' + id)
                                                        .remove();
                                                }
                                            },
                                        });
                                    });
                                    $('input[class="variant_check"]').on('change',
                                        function() {
                                            var vopros_testa_id = $(this).attr(
                                                'data-test_voprosy_id');
                                            var test_otvety_id = $(this).attr(
                                                'data-test_otvety_id');
                                            if ($(this).is(":checked")) {
                                                $('input[name="' +
                                                        vopros_testa_id + '"]')
                                                    .not(this).prop('checked',
                                                        false);
                                                $.ajax({
                                                    url: "/moderator_panel_ort/test/" +
                                                        vopros_testa_id +
                                                        '/vopros_checked/' +
                                                        test_otvety_id,
                                                    type: "GET",
                                                    dataType: "json",
                                                    success: function(
                                                        response) {
                                                        console.log(
                                                            response
                                                        );
                                                        if (response !=
                                                            0) {
                                                            $('input[name="' +
                                                                    vopros_testa_id +
                                                                    '"]'
                                                                )
                                                                .prop(
                                                                    'checked',
                                                                    false
                                                                );
                                                            $('input[data-test_otvety_id="' +
                                                                    response +
                                                                    '"]'
                                                                )
                                                                .prop(
                                                                    'checked',
                                                                    true
                                                                );
                                                            Toast
                                                                .fire({
                                                                    icon: 'error',
                                                                    title: 'Бош вариантты белгилегенге болбойт!'
                                                                });
                                                        }
                                                    },
                                                    error: function(
                                                        error) {
                                                        console.log(
                                                            error
                                                        );
                                                    }
                                                });

                                            } else {
                                                $(this).prop('checked', true);
                                            }
                                        });
                                    //coхранить вариант
                                    $(".variant_text").change(function() {
                                        event.preventDefault();
                                        var test_otvety_id = $(this).attr(
                                            'data-test_otvety_id');
                                        var test_id = $(this).attr(
                                            'data-test_id');
                                        let variant_text = $(this).val();

                                        $.ajax({
                                            url: "/moderator_panel_ort/test/" +
                                                test_id +
                                                '/otvet_testa/' +
                                                test_otvety_id +
                                                '/update',
                                            type: "PUT",
                                            data: {
                                                variant_text: variant_text,
                                                _token: "{{ csrf_token() }}",
                                            },
                                            success: function(
                                                response) {
                                                console.log(
                                                    response
                                                );
                                                if (response) {}
                                            },
                                            error: function(error) {
                                                console.log(
                                                    error);
                                            }
                                        });
                                    });
                                    //coхранить вариант
                                },
                                error: function(error) {
                                    Toast.fire({
                                        icon: 'error',
                                        title: 'Кайра кошуп көрүңүз'
                                    });
                                }
                            });

                        });
                    }
                },
                error: function(error) {
                    Toast.fire({
                        icon: 'error',
                        title: 'Кайра кошуп көрүңүз'
                    });
                }
            });
        });
    </script>
@endsection
