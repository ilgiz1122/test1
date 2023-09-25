@extends('layouts.poputka_taxi_layouts')

@section('title', 'кошуу')
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
            display: inline;
        }


        .p_for_pic_1 {
            background: #bfc1c4;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .p_for_pic_2 {
            background: #bfc1c4;
            height: auto;
            display: flex;
            align-items: center;
            justify-content: center
        }

        textarea {
            font-size: 14px;
            border-radius: 2px;
            border: 1px solid #ccc;
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background: #dfecf2;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .cat {
            font-size: 14px;
            border-radius: 2px;
            border: 1px solid #ccc;
            width: 100%;
            padding: 0.50rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background: #dfecf2;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
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
        <h4 class="text-center"><b>Жарнама кошуу</b></h4>
        <form id="commentForm" action="{{ route('jarya_koshuu_store', ['subdomain' => 'poputka-taxi', 'ssylka' => $prilojenie_name->ssylka]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h5><b>Сүрөттөр</b></h5>
            <p class="mb-0"><small class="text-muted" style="font-size: 12px;">- жарнамаңыздын сүрөтүн жүктөңүз</small></p>
            <div class="row align-items-center p-15">
                <div class="col p_for_pic_1 text-center p-0 mr-5">
                    <label class="p-0 m-0 p_for_pic_1" for="rebate_image1">
                        <i class="fas fa-plus m-0 fa-lg rebate_old_image1" style="font-size: 30px; color: #f2f7fb; margin: 0"></i>
                        <img id="rebate_old_image1" class="" src="" style="width: 100%;
                    height: 100%;
                    object-fit: cover; display: none;" type="button">
                    </label>
                    <input type="file" class="upload" id="rebate_image1" name="rebate_image[]"   title="Нажмите чтобы загрузить картинку теста" hidden="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">    
                </div>
                <div class="col p-0 ml-5">
                    <div class="row align-items-center m-0 ">
                        <div class="col p_for_pic_2 p-0 mr-5 mb-5">
                            <label class="p-0 m-0 p_for_pic_2" for="rebate_image2">
                                <i class="fas fa-plus m-0 fa-lg rebate_old_image2" style="font-size: 30px; color: #f2f7fb; margin: 0"></i>
                                <img id="rebate_old_image2" class="" src="" style="width: 100%;
                            height: 100%;
                            object-fit: cover; display: none;" type="button">
                            </label>
                            <input type="file" class="upload" id="rebate_image2" name="rebate_image[]"   title="Нажмите чтобы загрузить картинку теста" hidden="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">    
                        </div>
                        <div class="col p_for_pic_2 p-0 ml-5 mb-5">
                            <label class="p-0 m-0 p_for_pic_2" for="rebate_image3">
                                <i class="fas fa-plus m-0 fa-lg rebate_old_image3" style="font-size: 30px; color: #f2f7fb; margin: 0"></i>
                                <img id="rebate_old_image3" class="" src="" style="width: 100%;
                            height: 100%;
                            object-fit: cover; display: none;" type="button">
                            </label>
                            <input type="file" class="upload" id="rebate_image3" name="rebate_image[]"   title="Нажмите чтобы загрузить картинку теста" hidden="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">    
                        </div>
                    </div>
                    <div class="row align-items-center m-0">
                        <div class="col p_for_pic_2 p-0 mr-5 mt-5">
                            <label class="p-0 m-0 p_for_pic_2" for="rebate_image4">
                                <i class="fas fa-plus m-0 fa-lg rebate_old_image4" style="font-size: 30px; color: #f2f7fb; margin: 0"></i>
                                <img id="rebate_old_image4" class="" src="" style="width: 100%;
                            height: 100%;
                            object-fit: cover; display: none;" type="button">
                            </label>
                            <input type="file" class="upload" id="rebate_image4" name="rebate_image[]"   title="Нажмите чтобы загрузить картинку теста" hidden="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">    
                        </div>
                        <div class="col p_for_pic_2 p-0 ml-5 mt-5">
                            <label class="p-0 m-0 p_for_pic_2" for="rebate_image5">
                                <i class="fas fa-plus m-0 fa-lg rebate_old_image5" style="font-size: 30px; color: #f2f7fb; margin: 0"></i>
                                <img id="rebate_old_image5" class="" src="" style="width: 100%;
                            height: 100%;
                            object-fit: cover; display: none;" type="button">
                            </label>
                            <input type="file" class="upload" id="rebate_image5" name="rebate_image[]"   title="Нажмите чтобы загрузить картинку теста" hidden="" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">    
                        </div>
                    </div>
                </div>
            </div>


            <h5 class="mb-5 mt-20"><b>Категория <span  style="color: #e32;">*</span></b></h5>
            <div class="row align-items-center cat m-0" data-toggle="modal" data-target="#exampleModal">
                <div class="col p-0 cat_title">Категорияны тандаңыз</div>
                <div class="col-auto p-0"><i class="fas fa-chevron-down"></i></div>
            </div>

            <div class="modal fade modal_plus" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg m-0">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Категориялар</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> <i class="fas fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body pt-0">
                            <div class="form-radio">
                                @foreach ($categorys as $category)
                                    <div class="radio radio-inline mt-20">
                                        <label class="cat_close_1" data-title="{{ $category->category_big_title }}"
                                            data-id="{{ $category->id }}">
                                            <input type="radio" name="category_1" value="{{ $category->id }}" required>
                                            <i class="helper" ></i>{{ $category->category_big_title }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="next_cat"></div>




            <h5 class="mb-5 mt-20"><b>Маалымат <span  style="color: #e32;">*</span></b></h5>
            <textarea rows="5" cols="3" class="1_maalymat" placeholder="Маалымат жазылат" name="maalymat" required></textarea>

            <h5 class="mb-5 mt-30"><b>Телефон номери</b></h5>
            <div class="row">
                <div class="col pr-10">
                    <input type="tel" class="cat kg_telephone" data-mask="0(999) 99-99-99" placeholder="0(700) 00-00-00"
                        name="phone_z1"  style="letter-spacing: 1px; color:#007bff; font-weight: 600;">
                </div>
                <div class="col pl-10">
                    <input type="tel" class="cat kg_telephone" data-mask="0(999) 99-99-99" placeholder="0(700) 00-00-00"
                        name="phone_z2"  style="letter-spacing: 1px; color:#007bff; font-weight: 600;">
                </div>
            </div>


            <h5 class="mb-5 mt-30"><b>WhatsApp номери <span  style="color: #e32;">*</span></b></h5>
            <input type="tel" class="cat kg_telephone 1_whatsapp" data-mask="0(999) 99-99-99" placeholder="0(700) 00-00-00" name="phone_w" required style="letter-spacing: 1px; color:#007bff; font-weight: 600;">


            <a class="btn btn-primary waves-effect waves-light btn-block mb-10 pr-30 pl-30 mt-30 for_validation cat_not_plus maalymat_not_plus whatsapp_not_plus pod_cat_not_plus chyk_not_plus bar_not_plus data_not_plus" >Жөнөтүү</a>

            {{-- <button class="btn btn-primary waves-effect waves-light btn-block mb-10 pr-30 pl-30 mt-30" type="submit">Жөнөтүү</button> --}}

        </form>
               

        {{-- <div class="card table-card">
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
                                            <input type="text" class="for_akcia2 pt-5 pb-5 pl-5 pr-15" placeholder="https://poputka-taxi.nonsi.kg" name="sait">
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
        </div> --}}


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.20/autosize.js"></script>
        <script type="text/javascript" src="{{ asset('public/portfolio/files/assets/pages/accordion/accordion.js') }}"></script>
        <script>
          
            


            $('body').click(function(event) {
                if (!$(event.target).closest('#exampleModal2').length && !$(event.target).is('#exampleModal2')) {
                    // $("#exampleModal").removeClass('show');
                    $("#exampleModal2").modal('hide')
                }
                if (!$(event.target).closest('#exampleModal3').length && !$(event.target).is('#exampleModal3')) {
                    // $("#exampleModal").removeClass('show');
                    $(".modal_plus3").modal('hide')
                }
                if (!$(event.target).closest('#exampleModal4').length && !$(event.target).is('#exampleModal4')) {
                    // $("#exampleModal").removeClass('show');
                    $("#exampleModal4").modal('hide')
                }
            });

            var p_for_pic_1 = $(".p_for_pic_1").width();
            $(".p_for_pic_1").css("height", p_for_pic_1);

            var p_for_pic_2 = $(".p_for_pic_2").width();
            $(".p_for_pic_2").css("height", p_for_pic_2);

            window.onload = function() {
                autosize($('textarea'));
            }

            "use strict";
            $(function() {
                $(".kg_telephone").inputmask({
                    mask: "0(999) 99-99-99"
                });
            });

            

            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#rebate_old_image1').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $(".rebate_old_image1").hide();
                    }
                }
                $("#rebate_image1").change(function(){
                    $("#rebate_old_image1").show();
                    readURL(this);
                });
            });
            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#rebate_old_image2').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $(".rebate_old_image2").hide();
                    }
                }
                $("#rebate_image2").change(function(){
                    $("#rebate_old_image2").show();
                    readURL(this);
                });
            });
            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#rebate_old_image3').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $(".rebate_old_image3").hide();
                    }
                }
                $("#rebate_image3").change(function(){
                    $("#rebate_old_image3").show();
                    readURL(this);
                });
            });
            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#rebate_old_image4').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $(".rebate_old_image4").hide();
                    }
                }
                $("#rebate_image4").change(function(){
                    $("#rebate_old_image4").show();
                    readURL(this);
                });
            });
            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#rebate_old_image5').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                        $(".rebate_old_image5").hide();
                    }
                }
                $("#rebate_image5").change(function(){
                    $("#rebate_old_image5").show();
                    readURL(this);
                });
            });

            $(".for_validation").click(function() {
                if ($(this).hasClass('cat_not_plus')) {
                    Swal.fire({
                        icon: 'error',
                        // title: '<h1 class="modal-title">Токтоңуз!</h1>',
                        text: 'Алгач категорияны тандаңыз!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
                else if($(this).hasClass('pod_cat_not_plus')){
                    if ($(this).hasClass('chyk_not_plus')) {
                        Swal.fire({
                            icon: 'error',
                            // title: '<h1 class="modal-title">Токтоңуз!</h1>',
                            text: 'Чыга турган аймакты тандаңыз!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                    else if($(this).hasClass('bar_not_plus')){
                        Swal.fire({
                            icon: 'error',
                            // title: '<h1 class="modal-title">Токтоңуз!</h1>',
                            text: 'Эми бара турган аймакты тандаңыз!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                    else if($(this).hasClass('data_not_plus')){
                        Swal.fire({
                            icon: 'error',
                            // title: '<h1 class="modal-title">Токтоңуз!</h1>',
                            text: 'Жолго чыкчу датаны тандаңыз!',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                    }
                }
                else if($(this).hasClass('maalymat_not_plus')){
                    Swal.fire({
                        icon: 'error',
                        // title: '<h1 class="modal-title">Токтоңуз!</h1>',
                        text: 'Жарнама тууралуу маалымат жазыңыз!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
                else if($(this).hasClass('whatsapp_not_plus')){
                    Swal.fire({
                        icon: 'error',
                        // title: '<h1 class="modal-title">Токтоңуз!</h1>',
                        text: 'WhatsApp номериңизди жазыңыз!',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                }
                else{
                    let timerInterval
                    Swal.fire({
                    title: 'Жарнама жөнөтүлүүдө',

                    timer: 9999999,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    })
                    
                    setTimeout(greet, 1000);
                    function greet() {
                        $( "#commentForm" ).submit();
                    }
                }
            });
            $('.1_maalymat').on('change keyup', function() {
                var res0 = $(".1_maalymat").val();
                if(!res0){
                    if (!$(".for_validation").hasClass('maalymat_not_plus')) {
                        $(".for_validation").addClass('maalymat_not_plus');
                    }
                }else{
                    if ($(".for_validation").hasClass('maalymat_not_plus')) {
                        $(".for_validation").removeClass('maalymat_not_plus');
                    }
                } 
            });
            $('.1_whatsapp').on('change keyup', function() {
                var res0 = $(".1_whatsapp").val();
                if(!res0){
                    if (!$(".for_validation").hasClass('whatsapp_not_plus')) {
                        $(".for_validation").addClass('whatsapp_not_plus');
                    }
                }else{
                    if ($(".for_validation").hasClass('whatsapp_not_plus')) {
                        $(".for_validation").removeClass('whatsapp_not_plus');
                    }
                } 
            });

            $(function() {
                $(".cat_close_1").click(
                    function() {
                        var cat_title = $(this).attr('data-title');
                        var cat_id = $(this).attr('data-id');
                        var cat_id2 = parseInt(cat_id, 10);
                        $(".cat_title").text(cat_title);
                        $('#exampleModal').modal('hide');
                        if (cat_id2 === 6) {
                            if ($(".for_validation").hasClass('cat_not_plus')) {
                                $(".for_validation").removeClass('cat_not_plus');
                            }
                            if ($(".for_validation").hasClass('pod_cat_not_plus')) {
                                
                            }else{
                                $(".for_validation").addClass('pod_cat_not_plus');
                                $(".for_validation").addClass('chyk_not_plus');
                                $(".for_validation").addClass('bar_not_plus');
                                $(".for_validation").addClass('data_not_plus');
                            }
                            $("#next_cat_1").remove();
                            $("#next_cat").append(
                                '<div id="next_cat_1"> <h5 class="mb-5 mt-30"><b>Кайсыл аймактан чыгасыз? <span  style="color: #e32;">*</span></b></h5> <div class="row align-items-center chykkan_aimak cat m-0"> <div class="col p-0 cat_title2">Аймакты тандаңыз</div> <div class="col-auto p-0"><i class="fas fa-chevron-down"></i></div> </div> <h5 class="mb-5 mt-30"><b>Кайсыл аймакка барасыз? <span  style="color: #e32;">*</span></b></h5> <div class="row align-items-center barchu_aimak cat m-0"> <div class="col p-0 cat_title3">Аймакты тандаңыз</div> <div class="col-auto p-0"><i class="fas fa-chevron-down"></i></div> </div> <div class="row mt-30"> <div class="col-7 pr-10"> <h5 class="mb-5"><b>Жолго чыгуу датасы <span  style="color: #e32;">*</span></b></h5> @php $d = strtotime('+1 day'); $data = date('Y-m-d', $d); @endphp <input class="cat 1_data pl-5 pr-0" type="date" value="{{ $data }}" name="data"> </div> <div class="col-5 pl-10"> <h5 class="mb-5"><b>Баасы</b></h5> <input name="price" type="number" class="cat pl-15 pr-15" placeholder="" value="" autocomplete="off" style="letter-spacing: 1px;"> </div> </div> <p class="mb-0 mt-10 text-right"><small class="text-muted" style="font-size: 12px;">- баа келишим түрдө болсо, анда бош калтырыңыз</small></p> <div class="modal fade modal_plus2" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg m-0"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel2">Кайсыл аймактан чыгасыз?</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> <i class="fas fa-times"></i></span> </button> </div> <div class="modal-body pt-5"> <div class="form-radio"> <div class="card-block accordion-block color-accordion-block"> <div class="color-accordion" id="color-accordion"> @foreach ($oblast_taxis as $oblast_taxi) <a class="accordion-msg b-none waves-effect waves-light pt-15 pb-15" data-id="{{ $oblast_taxi->id }}"> {{ $oblast_taxi->oblast }} </a> <div class="accordion-desc ml-30 mt-0 pb-0 pr-0"> @php $taxi_raion1 = $taxi_raions->where('poputka_taxi_oblasts_id', $oblast_taxi->id); @endphp <div class="form-radio"> @foreach ($taxi_raion1 as $taxi_rai) <div class="radio radio-inline mr-0"> <label class="cat_close_2 mt-10" data-title="{{ $taxi_rai->raion_shaar }}"> <input type="radio" name="chykkan_aimak" value="{{ $taxi_rai->id }}" required> <i class="helper"></i>{{ $taxi_rai->raion_shaar }} </label> </div> @endforeach </div> </div> @endforeach </div> </div> </div> </div> </div> </div> </div> <div class="modal fade modal_plus3" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg m-0"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel3">Кайсыл аймакка барасыз?</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> <i class="fas fa-times"></i></span> </button> </div> <div class="modal-body pt-5"> <div class="form-radio"> <div class="card-block accordion-block color-accordion-block"> <div class="color-accordion" id="single-open"> @foreach ($oblast_taxis as $oblast_taxi) <a class="accordion-msg b-none waves-effect waves-light pt-15 pb-15" data-id="{{ $oblast_taxi->id }}"> {{ $oblast_taxi->oblast }} </a> <div class="accordion-desc ml-30 mt-0 pb-0 pr-0"> @php $taxi_raion1 = $taxi_raions->where('poputka_taxi_oblasts_id', $oblast_taxi->id); @endphp <div class="form-radio"> @foreach ($taxi_raion1 as $taxi_rai) <div class="radio radio-inline mr-0"> <label class="cat_close_3 mt-10" data-title="{{ $taxi_rai->raion_shaar }}"> <input type="radio" name="barchu_aimak" value="{{ $taxi_rai->id }}" required> <i class="helper"></i>{{ $taxi_rai->raion_shaar }} </label> </div> @endforeach </div> </div> @endforeach </div> </div> </div> </div> </div> </div> </div></div> '
                            );
                            $.getScript("{{ asset('public/portfolio/files/assets/pages/accordion/accordion.js') }}");

                            $('.1_data').on('change keyup', function() {
                                var res1 = $(".1_data").val();
                                if(!res1){
                                    if ($(".for_validation").hasClass('pod_cat_not_plus')) {                                    
                                        
                                    }else{
                                        $(".for_validation").addClass('pod_cat_not_plus');                        
                                    }
                                    if ($(".for_validation").hasClass('data_not_plus')) {                                    
                                        
                                    }else{
                                        $(".for_validation").addClass('data_not_plus');                       
                                    }
                                }else{
                                    if ($(".for_validation").hasClass('pod_cat_not_plus')) {      
                                        if (!$(".for_validation").hasClass('bar_not_plus') && !$(".for_validation").hasClass('chyk_not_plus')){
                                            $(".for_validation").removeClass('pod_cat_not_plus');
                                        }
                                    }
                                    if ($(".for_validation").hasClass('data_not_plus')) {                                    
                                        $(".for_validation").removeClass('data_not_plus');
                                    }
                                } 
                            });

                         
                            $(".chykkan_aimak").click(function() {
                                $('#exampleModal2').modal('show');
                            });
                            $(".cat_close_2").click(function() {
                                var cat_title2 = $(this).attr('data-title');
                                $(".cat_title2").text(cat_title2);
                                $('#exampleModal2').modal('hide');
                                $(".for_validation").removeClass('chyk_not_plus');    
                                if ($(".for_validation").hasClass('bar_not_plus')) {                                    
                                    
                                }else{
                                    var perem1 = $(".1_data").val();
                                    if(!perem1){
                                        // alert("Нельзя отправлять пустое поле!");
                                    }else{
                                        $(".for_validation").removeClass('pod_cat_not_plus');
                                    }                                    
                                }                            
                            });

                            $(".barchu_aimak").click(function() {
                                $('#exampleModal3').modal('show');
                            });
                            $(".cat_close_3").click(function() {                                
                                var cat_title3 = $(this).attr('data-title');
                                $(".cat_title3").text(cat_title3);
                                $('#exampleModal3').modal('hide');
                                $(".for_validation").removeClass('bar_not_plus');
                                if ($(".for_validation").hasClass('chyk_not_plus')) {                                    
                                
                                }else{
                                    var perem2 = $(".1_data").val();
                                    if(!perem2){
                                        // alert("Нельзя отправлять пустое поле!");
                                    }else{
                                        $(".for_validation").removeClass('pod_cat_not_plus');
                                    } 
                                }
                            });
                            
                            $('body').click(function(event) {
                                if (!$(event.target).closest('#exampleModal2').length && !$(event.target).is('#exampleModal2')) {
                                    // $("#exampleModal").removeClass('show');
                                    $("#exampleModal2").modal('hide')
                                }
                                if (!$(event.target).closest('#exampleModal3').length && !$(event.target).is('#exampleModal3')) {
                                    // $("#exampleModal").removeClass('show');
                                    $(".modal_plus3").modal('hide')
                                }
                            });

                        } else {
                            if ($(".for_validation").hasClass('cat_not_plus')) {
                                $(".for_validation").removeClass('pod_cat_not_plus');
                                $(".for_validation").removeClass('cat_not_plus');
                            }
                            else if ($(".for_validation").hasClass('pod_cat_not_plus')) {
                                $(".for_validation").removeClass('pod_cat_not_plus');
                                $(".for_validation").removeClass('chyk_not_plus');
                                $(".for_validation").removeClass('bar_not_plus');
                                $(".for_validation").removeClass('data_not_plus');
                            }
                            
                            $("#next_cat_1").remove();
                            $("#next_cat").append(
                                '<div id="next_cat_1"><div class="row mt-30"><div class="col-6 pr-10"><h5 class="mb-5"><b>Баасы</b></h5><input name="price" type="number" class="cat pl-15 pr-15" placeholder="" value=""autocomplete="off" style="letter-spacing: 1px;"></div><div class="col-6 pl-10"><h5 class="mb-5"><b>Валюта</b></h5><div class="row align-items-center cat valuta m-0"><div class="col cat_title4 p-0">сом</div><div class="col-auto p-0"><i class="fas fa-chevron-down"></i></div></div></div></div><p class="mb-0 mt-10"><small class="text-muted" style="font-size: 12px;">- баа келишим түрдө болсо, анда бош калтырыңыз</small></p><div class="modal fade modal_plus4" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true"> <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg m-0"> <div class="modal-content"> <div class="modal-header"> <h5 class="modal-title" id="exampleModalLabel4">Валюта</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"> <i class="fas fa-times"></i></span> </button> </div> <div class="modal-body pt-0"> <div class="form-radio"> <div class="radio radio-inline mt-20"> <label class="cat_close_4" data-title="сом"> <input type="radio" name="valuta" value="1" checked> <i class="helper"></i>сом </label> </div> <div class="radio radio-inline mt-20"> <label class="cat_close_4" data-title="доллар"> <input type="radio" name="valuta" value="2"> <i class="helper"></i>доллар </label> </div> </div> </div> </div> </div> </div></div>'
                            );
                            $(".valuta").click(function() {
                                $('#exampleModal4').modal('show');
                            });
                            $(".cat_close_4").click(function() {                                
                                var cat_title4 = $(this).attr('data-title');
                                $(".cat_title4").text(cat_title4);
                                $('#exampleModal4').modal('hide');
                            });
                            $('body').click(function(event) {
                                if (!$(event.target).closest('#exampleModal4').length && !$(event.target).is('#exampleModal4')) {
                                    // $("#exampleModal").removeClass('show');
                                    $("#exampleModal4").modal('hide')
                                }
                            });
                        }
                    }
                );
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
                    icon: 'false',
                    title: '{{ session('false') }}'
                });
            @endif
            // уведомление2 х
        </script>



    @endsection
