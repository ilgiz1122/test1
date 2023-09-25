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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Тест түзүү</a> </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="pcoded-inner-content">
        <div class="card table-card">
            <div class="card-header">
                <h5>Тест түзүү
                    <small></small>
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
                                        style="white-space: nowrap;"><i class="far fa-check-square pr-10"></i> Маалымат</a>
                                    <div class="slide"></div> 
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link2" type="button"
                                        style="white-space: nowrap;"><i class="far fa-layer-group pr-10"></i> Суроолор</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-auto border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link3" type="button"
                                        style="white-space: nowrap;"><i class="feather icon-settings pr-10 pl-10"></i></a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content card-block pr-0 pl-0 pb-5">
                        <div class="tab-pane active pr-5 pl-5" id="tab_pole1" role="tabpanel">
                            <div class="row  mt-50">
                                <div class="col-md-9">
                                    <form action="{{ route('ort_moderator_online_test_store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-material mt-30">
                                            <div class="right-icon-control">
                                                <div class="form-group form-primary">
                                                    <input type="text" name="title"
                                                        class="form-control add_task_todo" required="" value="{{ old('title') }}" title="Темасы" oninvalid="this.setCustomValidity('Темасын жазыңыз!')"
                                                        oninput="setCustomValidity('')">
                                                    <span class="form-bar"></span>
                                                    <label class="float-label">Темасы <span
                                                            style="color: red">*</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-50">Тест тууралуу маалымат <small class="pl-10">(сөзсүз эмес)</small>
                                        </p>
                                        <textarea name="opisanie" id="summernote">{{ old('opisanie') }}</textarea>
                                        <div class="form-row form-group">
                                            <div class="form-group col-md-4 mt-30 hover_for_focus">
                                                <label>Категория <span style="color: red">*</span></label>
                                                <select name="test_category_id" id="test_category_id"
                                                    class="for_focus_border2 productcategory" required="" value="{{ old('test_category_id') }}" title="Категория" oninvalid="this.setCustomValidity('Категорияны тандаңыз!')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="" disabled="true" selected="true">Категорияны
                                                        тандаңыз</option>
                                                    @foreach ($test_categories as $test_category)
                                                        <option value="{{ $test_category['id'] }}">
                                                            {{ $test_category['title'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 mt-30 hover_for_focus">
                                                <label>Подкатегория <span style="color: red">*</span></label>
                                                <select name="test_podcategory_id" id="test_podcategory_id"
                                                    class="for_focus_border2 productcategory" required="" value="{{ old('test_podcategory_id') }}" title="Подкатегория" oninvalid="this.setCustomValidity('Подкатегорияны тандаңыз!')"
                                                    oninput="setCustomValidity('')">
                                                    <option value="" disabled="true" selected="true">Алгач
                                                        категорияны тандаңыз</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-4 mt-30 hover_for_focus">
                                                <label>Тили <span style="color: red">*</span></label>
                                                <select name="language" class="for_focus_border2" required="" value="{{ old('language') }}" title="Тили" oninvalid="this.setCustomValidity('Тилди тандаңыз!')"
                                                oninput="setCustomValidity('')">
                                                    <option value="" disabled="true" selected="true">Тилди тандаңыз
                                                    </option>
                                                    @foreach ($languages as $language)
                                                        <option value="{{ $language->id }}">{{ $language->language }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5 mt-30">
                                                <div class="card mb-0 for_video_and_img" type="button">
                                                    <img class="card-img-top img-fluid img_net_img"
                                                        src="{{ asset('public/img/not_test.png') }}" alt="Сүрөт жок"
                                                        id="rebate_old_imag">
                                                </div>
                                                <div class="form-group" style="display: none;">
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
                                                    <div class="col pr-0 pl-0  border-bottom b_color"></div>
                                                    <div class="col-auto pl-0">
                                                        <div class="row">
                                                            <div class="col p-0">
                                                                <input  style="width: 120px;"
                                                                    class="strelki for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                                    placeholder="0" type="number" pattern="\d+" name="price" min="0" max="99999" maxlength="5" required
                                                                    value="{{ old('price') }}" title="Баасы" oninvalid="this.setCustomValidity('Баасын көрсөтүңүз!')" oninput="setCustomValidity('')" autocomplete="off">
                                                            </div>
                                                            <div class="col-auto pl-0">
                                                                <input type="text" style="width: 50px;"
                                                                    class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="сом" readonly>
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
                                                                <input  style="width: 90px;"
                                                                    class="strelki for_akcia__1 form-control-right text-right pt-5 pb-5 pl-15 pr-5"
                                                                    placeholder="0" type="number" pattern="\d+" name="prodoljitelnost" min="0" max="99999" maxlength="5" required
                                                                    value="{{ old('prodoljitelnost') }}" title="Узактыгы" oninvalid="this.setCustomValidity('Убактысын көрсөтүңүз!')"
                                                                    oninput="setCustomValidity('')" autocomplete="off">
                                                            </div>
                                                            <div class="col-auto pl-0">
                                                                <input type="text" style="width: 80px;"
                                                                    class="for_akcia__2 pt-5 pb-5 pl-0 pr-15" value="минута" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-end mt-40 hover_b_color">
                                                    <div class="col-auto">
                                                        <div class="d-inline-block align-middle">
                                                            <p class="mb-0"><b>Мүмкүндүктөрдүн саны <span style="color: red">*</span></b></p>
                                                            <p class="text-muted mb-0"><small></small></p>
                                                        </div>
                                                    </div>
                                                    <div class="col pr-5 pl-0 border-bottom b_color"></div>
                                                    <div class="col-auto float-right p-0">
                                                        <div class="border-checkbox-section">
                                                            <div
                                                                class="border-checkbox-group border-checkbox-group-primary">
                                                                <input class="border-checkbox" type="checkbox"
                                                                    id="checkbox_0_1" name="checkbox_0_0" checked>
                                                                <label
                                                                    class="border-checkbox-label checkbox_popytki1 mb-0"
                                                                    for="checkbox_0_1">
                                                                    <p>чексиз</p></label>
                                                            </div>
                                                            <div
                                                                class="border-checkbox-group border-checkbox-group-primary pl-10">
                                                                <input class="border-checkbox" type="checkbox"
                                                                    id="checkbox_0_2" name="checkbox_0_0">
                                                                <label
                                                                    class="border-checkbox-label checkbox_popytki2 mb-0"
                                                                    for="checkbox_0_2">
                                                                    <p>чектүү</p></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mt-30 for_col_popytkov" style="display: none;">
                                                    <div class="col-auto text-center ml-15">
                                                        <div class="form-group mb-0 required align-items-top">
                                                            <div class="row align-items-center">
                                                                <div class="col pl-0">
                                                                    <div class="number border" style="border-radius: 4px">
                                                                        <i class="fal fa-minus number-minus pt-2"
                                                                            onclick="this.nextElementSibling.stepDown()"></i>
                                                                        <input id="popytki" name="popytki" type="number"
                                                                            class="form-control form-control-border color1 color11"
                                                                            min="0" max="15"
                                                                            readonly style="background: none;" required="" value="0" title="Мүмкүндүктөрдүн саны" oninvalid="this.setCustomValidity('Мүмкүндүктөрдүн санын көрсөтүңүз!')"
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
                        <div class="tab-pane pr-5 pl-5 " id="tab_pole2" role="tabpanel">
                            
                        </div>
                        <div class="tab-pane pr-5 pl-5" id="tab_pole3" role="tabpanel">
                           
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
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>

    <script>
        window.onload = function() {
            autosize(document.querySelectorAll('textarea'));
        }
    </script>
    <script>
        $(document).ready(function() {
            $.stickme({
                top: 30
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
                    Toast.fire({
                        icon: 'error',
                        title: 'Алгач 1-пунктту толтуруу керек'
                    });
                }
            );
            $("#for_nav_link3").click(
                function() {
                    Toast.fire({
                        icon: 'error',
                        title: 'Алгач 1-пунктту толтуруу керек'
                    });
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
@endsection
