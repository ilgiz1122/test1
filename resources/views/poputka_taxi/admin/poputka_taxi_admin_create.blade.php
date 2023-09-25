@extends('layouts.poputka_taxi_admin_layouts')

@section('title', 'кошуу')

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

        .for_akcia {
            border-top: none;
            border-left: none;
            border-right: none;
            border: 1px solid #dee2e6;
            border-radius: 2px;
            width: 100%;
        }

        .akcia:hover .for_akcia {
            border: 1px solid #007bff;
            border-radius: 2px;
            color: #007bff;
            font-weight: 650;
        }
        .for_akcia2 {
            border-left: none !important;
            border: 1px solid #dee2e6;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
            width: 100%;
        }

        .akcia:hover .for_akcia2 {
            border: 1px solid #007bff;
            border-left: none !important;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
            color: #007bff;
        }
        .for_akcia3 {
            border-right: none !important;
            border: 1px solid #dee2e6;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
            width: 100%;
        }

        .akcia:hover .for_akcia3 {
            border: 1px solid #007bff;
            border-right: none !important;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
            color: #007bff;
        }

        .akcia:hover .b_color {
            border-color: #007bff !important;
        }

        .qw label:after {
            color: #e32;
            content: ' *';
            display:inline;
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

        <div class="card table-card">
            <div class="card-header">
                <h5>Реклама кошуу</h5>
            </div>
            <div class="card-block pb-0 pl-5 pr-5 pt-5">
                <div class="col-12 p-0">
                    <div class="row pr-15 pl-15">
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link active mb-0" id="for_nav_link1" data-toggle="tab"
                                        href="#raspisanie" role="tab" aria-selected="true"
                                        style="white-space: nowrap;"><i class="fas fa-car-side pr-10"></i> Попутка</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                        <div class="col border-bottom p-0">
                            <ul class="nav nav-tabs md-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link for_nav_link mb-0" id="for_nav_link2" data-toggle="tab"
                                        href="#nastroiki" role="tab" aria-selected="false"
                                        style="white-space: nowrap;"><i class="fas fa-layer-plus pr-10 pl-10"></i>
                                        Башкалар</a>
                                    <div class="slide"></div>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="tab-content card-block pr-0 pl-0 pb-5">
                        <div class="tab-pane active  pr-5 pl-5" id="raspisanie" role="tabpanel">
                            <form id="bashka_reklamalar" action="{{ route('reklama_store', ['subdomain' => 'poputka-taxi', 'dop_role' => '2']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row mt-4 pt-3">
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Чыккан область</label>
                                    <select name="oblast_taxi_1"
                                        class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                        @foreach ($oblast_taxis as $oblast_taxi)
                                            <option value="{{ $oblast_taxi->id }}">{{ $oblast_taxi->oblast }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Областты тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Чыккан район / шаар</label>
                                    <select name="raion_taxi_1"
                                        class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Алгач областты тандаңыз
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Барчу область</label>
                                    <select name="oblast_taxi_2"
                                        class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                        @foreach ($oblast_taxis as $oblast_taxi)
                                            <option value="{{ $oblast_taxi->id }}">{{ $oblast_taxi->oblast }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Областты тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Барчу район / шаар</label>
                                    <select name="raion_taxi_2"
                                        class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Алгач областты тандаңыз
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                </div>
                            </div>

                            <div class="form-group row mt-4 pt-3">
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                </div>
                                <div class="form-group col-md-3 mb-0 akcia mt-20 qw">
                                    <label>Жолго чыгуу датасы</label>
                                    @php
                                        $data = '28.04.2023';
                                        $izmen=str_replace('/','.',$data);
                                        $data2 = strtotime($izmen);
                                    @endphp
                                    {{$data2}}
                                    <input type="text" class="for_akcia pt-5 pb-5 pl-15 pr-15 kg_data fill"  data-mask="99/99/2099" placeholder="25/01/2023" name="data" required>
                                    <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 akcia mt-20">
                                    <label>Баасы</label>
                                    <input id="akcia_price" name="price" type="text"
                                        class="for_akcia autonumber fill form-control-right text-right pt-5 pb-5 pl-5 pr-15"
                                        data-a-sign="  сом" data-p-sign="s" data-a-Sep="" data-a-Pad="false"
                                        data-l-Zero="deny" data-v-Min="0" placeholder="Келишим баада" value="">
                                    <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                </div>
                            </div>

                            <div class="form-group mb-0 required mt-30 qw">
                                <label>Маалымат</label>
                                <textarea rows="3" cols="3" class="form-control" placeholder="Маалымат жазылат" name="maalymat" required></textarea>
                            </div>
                            
                            <div class="form-group row mt-30">
                                <label class="col-sm-auto col-form-label">Сүрөт жүктөө</label>
                                <div class="col-sm">
                                    <input type="file" class="form-control" name="img[]"
                                accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                </div>
                            </div>

                            <div class="form-group row mt-30">
                                <div class="form-group col-md-4 mb-0 required mt-20 akcia">
                                    <label>Чалуу</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="+996" style="width: 55px;" readonly>
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15 kg_telephone fill"  data-mask="(999) 999-999" placeholder="(700) 123-456" name="phone_z">
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0 akcia  qw mt-20">
                                    <label>WhatsApp</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="+996" style="width: 55px;" readonly >
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15 kg_telephone fill"  data-mask="(999) 999-999" placeholder="(700) 123-456" name="phone_w" required>
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4 mb-0 akcia required mt-20">
                                    <label>Telegram</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="https://t.me/" style="width: 110px;" readonly>
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15" placeholder="asan" name="phone_t">
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col"></div>
                                <div class="col-auto">
                                    <button class="btn btn-primary waves-effect waves-light mb-10 pr-30 pl-30">Сактоо</button>
                                </div>
                            </div>   
                            </form>  
                        </div>
                        <div class="tab-pane" id="nastroiki" role="tabpanel">
                            <form id="bashka_reklamalar" action="{{ route('reklama_store', ['subdomain' => 'poputka-taxi', 'dop_role' => '1']) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="form-group row mt-4 pt-3">
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Категория</label>
                                    <select name="category" class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Категорияны тандаңыз</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_big_title }}
                                                {{ $category->category_small_title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Категорияны тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Област</label>
                                    <select name="oblast" id="oblast"
                                        class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Областты тандаңыз</option>
                                        @foreach ($oblasts as $oblast)
                                            <option value="{{ $oblast->id }}">{{ $oblast->title }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Областты тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 required mt-20 qw">
                                    <label>Район / шаар</label>
                                    <select name="raion" id="raion"
                                        class="form-control productcategory border" required="">
                                        <option value="" disabled="true" selected="true">Алгач областты тандаңыз
                                        </option>
                                    </select>
                                    <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                </div>
                                <div class="form-group col-md-3 mb-0 akcia mt-20">
                                    <label>Баасы</label>
                                    <input id="akcia_price" name="price" type="text"
                                        class="for_akcia autonumber fill form-control-right text-right pt-5 pb-5 pl-5 pr-15"
                                        data-a-sign="  сом" data-p-sign="s" data-a-Sep="" data-a-Pad="false"
                                        data-l-Zero="deny" data-v-Min="0" placeholder="Келишим баада" value="">
                                    <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                </div>
                            </div>
                            <div class="form-group mb-0 required mt-30 qw">
                                <label>Маалымат</label>
                                <textarea rows="3" cols="3" class="form-control" placeholder="Маалымат жазылат" name="maalymat" required></textarea>
                            </div>
                            
                            <div class="form-group row mt-30">
                                <label class="col-sm-auto col-form-label">Сүрөт жүктөө</label>
                                <div class="col-sm">
                                    <input type="file" class="form-control" name="img[]"
                                accept=".jpeg, .jpg, .tiff, .png, .gif, .webp" multiple="">
                                </div>
                            </div>

                            <div class="form-group row mt-30">
                                <div class="form-group col-md-3 mb-0 required mt-20 akcia">
                                    <label>Чалуу</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="+996" style="width: 55px;" readonly>
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15 kg_telephone fill"  data-mask="(999) 999-999" placeholder="(700) 123-456" name="phone_z">
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-0 akcia  qw mt-20">
                                    <label>WhatsApp</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="+996" style="width: 55px;" readonly>
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15 kg_telephone fill"  data-mask="(999) 999-999" placeholder="(700) 123-456" name="phone_w" required>
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-0 akcia required mt-20">
                                    <label>Telegram</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="https://t.me/" style="width: 110px;" readonly>
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15" placeholder="asan" name="phone_t">
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-3 mb-0 akcia required mt-20">
                                    <label>Сайт</label>
                                    <div class="row">
                                        <div class="col-auto pr-0">
                                            <input type="text" class="for_akcia3 pt-5 pb-5 pl-15 pr-0 text-right" value="" style="width: 5px;">
                                        </div>
                                        <div class="col pl-0">
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15" placeholder="https://poputka-taxi.mugalim.edu.kg" name="sait">
                                            <div class="invalid-feedback">Район / шаарды тандаңыз</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-30">
                                <div class="col"></div>
                                <div class="col-auto">
                                    <button class="btn btn-primary waves-effect waves-light mb-10 pr-30 pl-30">Сактоо</button>
                                </div>
                            </div>   
                            </form>                 
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

        <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
        <script>
            window.onload = function() {
                autosize(document.querySelectorAll('textarea'));
            }

            "use strict";
                $(function () {
                $(".kg_telephone").inputmask({ mask: "(999) 999-999" });
                $(".kg_data").inputmask({ mask: "99/99/2099" });
            });
        </script>
        <!-- для селектов-->
        <script type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('select[name="oblast"]').on('change', function() {
                    var countryID = jQuery(this).val();
                    if (countryID) {
                        jQuery.ajax({
                            url: '/p_admin_panel/create_pluse_raion/' + countryID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                jQuery('select[name="raion"]').empty();
                                $('select[name="raion"]').append(
                                    '<option value="" disabled="true" selected="true">Район / шаарды тандаңыз</option>'
                                    );
                                jQuery.each(data, function(key, value) {
                                    $('select[name="raion"]').append(
                                        '<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="raion"]').empty();
                    }
                });
            });

            jQuery(document).ready(function() {
                jQuery('select[name="oblast_taxi_1"]').on('change', function() {
                    var countryID = jQuery(this).val();
                    if (countryID) {
                        jQuery.ajax({
                            url: '/p_admin_panel/create_pluse_raion2/' + countryID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                jQuery('select[name="raion_taxi_1"]').empty();
                                $('select[name="raion_taxi_1"]').append(
                                    '<option value="" disabled="true" selected="true">Район / шаарды тандаңыз</option>'
                                    );
                                jQuery.each(data, function(key, value) {
                                    $('select[name="raion_taxi_1"]').append(
                                        '<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="raion_taxi_1"]').empty();
                    }
                });
            });

            jQuery(document).ready(function() {
                jQuery('select[name="oblast_taxi_2"]').on('change', function() {
                    var countryID = jQuery(this).val();
                    if (countryID) {
                        jQuery.ajax({
                            url: '/p_admin_panel/create_pluse_raion2/' + countryID,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                jQuery('select[name="raion_taxi_2"]').empty();
                                $('select[name="raion_taxi_2"]').append(
                                    '<option value="" disabled="true" selected="true">Район / шаарды тандаңыз</option>'
                                    );
                                jQuery.each(data, function(key, value) {
                                    $('select[name="raion_taxi_2"]').append(
                                        '<option value="' + key + '">' + value +
                                        '</option>');
                                });
                            }
                        });
                    } else {
                        $('select[name="raion_taxi_2"]').empty();
                    }
                });
            });
        </script>
        <!-- для селектов-->
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
        </script>


    @endsection
