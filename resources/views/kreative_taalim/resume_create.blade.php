@extends('layouts.kreative_layouts')

@section('title', 'Добавить урок')

@section('content')
<style type="text/css">

.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}
.required .required:after {
    color: #e32;
    content: ' *';
    display:inline;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}
.for_upload_img{
  width: calc(33.3333% - 16px);
  padding: 0px;
}
.for_upload_img2{
  width: calc(50% - 18px);
  padding: 0px;
}

.form-control-border:hover {
    background: #f8f9fa;
    outline: 0; width: 100%;
    resize: none;
    border-bottom: 1px solid #17a2b8;
}
.hover1:hover {
    background: #f8f9fa;
}
.hover1:hover .color1{
    background: #f8f9fa;
}

color1
.form-control-border:focus {
  background: #f8f9fa;
  outline: 0; width: 100%;
  resize: none;
}
.note-group-select-from-files {
  display: none;
}
.truncate2 {
    
    white-space: nowrap; /* Текст не переносится */
    overflow: hidden; /* Обрезаем всё за пределами блока */
    text-overflow: ellipsis; /* Добавляем многоточие */
   }
</style>



    <!-- Тема -->
    <div class="content-header">
        <div class="container-fluid">
            
            <!--Окно для уведомлений (успушно добавлена) -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif

            <!--Окно для уведомлений (успушно добавлена) -->
        </div>
    </div>
    <!-- Тема -->

   

    
            
        <section class="preorder-snails content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header"> 
                                <p class="mb-0 text-center"><b>Резюме толтуруу</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('kreative_taalim_resume_store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="card-body pl-3 pr-3">
                                    <div class="form-row mb-0">      
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Фамилиясы</p>
                                                <input type="text" name="familya" maxlength="100" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Асанов" value="{{ old('familya') }}" required autocomplete="off">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Аты</p>
                                                <input type="text" name="aty" maxlength="100" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Асан" value="{{ old('aty') }}" required autocomplete="off">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class=" mb-0">Атасынын аты</p>
                                                <input type="text" name="at_aty" maxlength="100" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Асанович" value="{{ old('at_aty') }}" autocomplete="off">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                    </div>

                                    <div class="form-row mb-0">      
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Туулган датасы</p>
                                                <input name="tuulgan_kunu" value="{{ old('phone_for_zvonok') }}" type="text" class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1"  data-inputmask='"mask": "99.99.9999"' data-mask placeholder="12/09/1996" required="true">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Үй-бүлөлүк абалы</p>
                                                <select name="ui_buloluk_abaly" class="form-control productname form-control-border  pr-1 pl-1 pt-2 pb-0" required="">
                                                    <option value="" disabled="true" selected="true">Тандаңыз</option>
                                                    <option value="2">үй-бүлөлүү</option>
                                                    <option value="1">бойдок</option>
                                                </select>
                                            <div class="invalid-feedback">Тандаңыз!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Жалпы педагогикалык стажы</p>
                                            <input type="number" pattern="\d+" name="staj" min="0" max="99999" maxlength="5" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Мисалы: 12 " value="{{ old('staj') }}" required>
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-row mb-0">
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="mb-0">Email</p>
                                                <input type="email" name="email" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="asan@gmail.com" value="{{ old('email') }}" autocomplete="off">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="mb-0">WhatsApp номериңиз</p>
                                            <div class="row align-items-end hover1">
                                              <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-whatsapp pr-3" style="color: green; font-size: 20px;"></i> +996</p>
                                              </div>
                                              <div class="col pl-0">
                                                <input name="whatsapp" value="{{ old('whatsapp') }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999">
                                              </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mt-5 required">
                                        <p class="required mb-0">Азыркы ээлеген кызматы</p>
                                                <input type="text" name="azyrky_kyzmaty" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Математика мугалими" value="{{ old('azyrky_kyzmaty') }}" required autocomplete="off">
                                            <div class="invalid-feedback">Сөзсүз толтуруу керек!</div>
                                    </div>

                                    <div class="bilimi mt-5">
                                        <div class="row align-items-top">
                                            <div class="col required">
                                                <p class="required mb-1">Билими</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="bilimi_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="bilimi_pole">
                                            <div id="bilimi_1" class="row align-items-center">
                                                <div class="col-auto pr-1">
                                                    <i class="fas fa-genderless pr-0" style="font-size: 12px;"></i>
                                                </div>
                                                <div class="col pr-0 pl-0">
                                                    <textarea name="bilimi[]" rows="1" class="form-control" placeholder="Билими" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tajryiba mt-5 pt-5">
                                        <div class="row align-items-top">
                                            <div class="col required">
                                                <p class="required mb-1">Иш тажрыйбасы</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="tajryiba_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="tajryiba_pole">
                                            <div id="tajryiba_1" class="row align-items-center">
                                                <div class="col-auto pr-1">
                                                    <i class="fas fa-genderless pr-0" style="font-size: 12px;"></i>
                                                </div>
                                                <div class="col pr-0 pl-0">
                                                    <textarea name="tajryiba[]" rows="1" class="form-control" placeholder="Иш тажрыйбасы" required></textarea>
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <i class="fas fa-trash btn btn-tool pr-0 tajryiba_delet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ozgocho_tajryiba mt-5">
                                        <div class="row align-items-top">
                                            <div class="col">
                                                <p class="mb-1">Өзгөчө иш тажрыйбасы</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="ozgocho_tajryiba_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="ozgocho_tajryiba_pole">

                                        </div>
                                    </div>


                                    <div class="gramota_syilyk mt-5 pt-5">
                                        <div class="row align-items-top">
                                            <div class="col required">
                                                <p class="required mb-1">Грамота, диплом, ...</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="gramota_syilyk_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="gramota_syilyk_pole">
                                            <div id="gramota_syilyk_1" class="row align-items-center">
                                                <div class="col-auto pr-1">
                                                    <i class="fas fa-genderless pr-0" style="font-size: 12px;"></i>
                                                </div>
                                                <div class="col pr-0 pl-0">
                                                    <textarea name="gramota_syilyk[]" rows="1" class="form-control" placeholder="Сыйлыктары" required></textarea>
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <i class="fas fa-trash btn btn-tool pr-0 gramota_syilyk_delet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="sertificate_syilyk mt-5">
                                        <div class="row align-items-top">
                                            <div class="col required">
                                                <p class="mb-1">Сертификаттар</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="sertificate_syilyk_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="sertificate_syilyk_pole">

                                        </div>
                                    </div>

                                    <div class="naam_syilyk mt-5">
                                        <div class="row align-items-top">
                                            <div class="col required">
                                                <p class="mb-1">Наамдар же сыйлыктын башка түрлөрү</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="naam_syilyk_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="naam_syilyk_pole">

                                        </div>
                                    </div>


                                    <div class="emgek mt-5 pt-5">
                                        <div class="row align-items-top">
                                            <div class="col required">
                                                <p class="required mb-1">Эмгектери</p>
                                            </div>
                                            <div class="col-auto opisanie_bottom">
                                                <i id="emgek_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div id="emgek_pole">
                                            <div id="emgek_1" class="row align-items-center">
                                                <div class="col-auto pr-1">
                                                    <i class="fas fa-genderless pr-0" style="font-size: 12px;"></i>
                                                </div>
                                                <div class="col pr-0 pl-0">
                                                    <textarea name="emgek[]" rows="1" class="form-control" placeholder="Эмгектери" required></textarea>
                                                </div>
                                                <div class="col-auto pl-0">
                                                    <i class="fas fa-trash btn btn-tool pr-0 emgek_delet"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                   


                                    <div class="row align-items-top mt-5 pt-5">
                                        <div class="col required">
                                            <p class="required mb-1">Шилтемелер</p>
                                        </div>
                                        <div class="col-auto">
                                            <i id="ssylka_click" class="fas fa-plus btn btn-tool pr-0"></i>
                                        </div>
                                    </div><hr class="mt-0">
                                    <div id="ssylka_pole">

                                    </div>    

                                    

                                    <div class=" mt-3">
                                        <label class="mt-4 pt-3">Фото <small></small></label><br>
                                        <div class="form-group align-items-center">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="rebate_imag" name="img" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp">
                                                <span class="custom-file-label" for="rebate_imag" data-browse="Выбрать">Выберите картинку</span>
                                                <div class="invalid-feedback">Выберите картинку</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="y_vidoe mt-0 pt-5">
                                        <div class="row align-items-top">
                                            <div class="col">
                                                <p class="mb-1">Видео (YouTube)</p>
                                            </div>
                                        </div><hr class="mt-0">
                                        <div class="row align-items-end hover1">
                                            <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-youtube pr-3" style="color: red; font-size: 20px;"></i></p>
                                            </div>
                                            <div class="col pl-0">
                                                <input name="y_vidoe[]" value="{{ old('y_vidoe') }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1" placeholder="https://www.youtube.com/watch?v=WVhXideBUAI">
                                            </div>
                                        </div>
                                    </div>
                                    

                                </div>
                                <div class="card-footer text-right">
                                    <div class="row">
                                        <button type="submit" class="btn btn-block btn-info">Сактоо</button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-2">
                        <div class="sticky-top mb-3">

                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.content -->    



                            
                            
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <script src="https://dwweb.ru/__a-data/__all_for_scripts/__examples/js/autosize_textarea/autosize.min.js"></script>
  <script>window.onload = function(){autosize(document.querySelectorAll('textarea')); } </script>



  <script type="text/javascript">

$("#bilimi_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="bilimi"]').length;
    const inputsCounter01 = 'bilimi_' + (inputsCounter + 1);

    $("#bilimi_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="bilimi[]" rows="1" class="form-control" placeholder="Билими" required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 bilimi_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.bilimi_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.bilimi_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});



$("#tajryiba_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="tajryiba"]').length;
    const inputsCounter01 = 'tajryiba_' + (inputsCounter + 1);

    $("#tajryiba_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="tajryiba[]" rows="1" class="form-control" placeholder="Иш тажрыйбасы" required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 tajryiba_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.tajryiba_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.tajryiba_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});



$("#ozgocho_tajryiba_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="ozgocho_tajryiba"]').length;
    const inputsCounter01 = 'ozgocho_tajryiba_' + (inputsCounter + 1);

    $("#ozgocho_tajryiba_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="ozgocho_tajryiba[]" rows="1" class="form-control" placeholder="Өзгөчө иш тажрыйбасы" required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 ozgocho_tajryiba_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.ozgocho_tajryiba_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.ozgocho_tajryiba_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});



$("#gramota_syilyk_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="gramota_syilyk"]').length;
    const inputsCounter01 = 'gramota_syilyk_' + (inputsCounter + 1);

    $("#gramota_syilyk_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="gramota_syilyk[]" rows="1" class="form-control" placeholder="Грамота, диплом, ..." required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 gramota_syilyk_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.gramota_syilyk_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.gramota_syilyk_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});



$("#sertificate_syilyk_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="sertificate_syilyk"]').length;
    const inputsCounter01 = 'sertificate_syilyk_' + (inputsCounter + 1);

    $("#sertificate_syilyk_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="sertificate_syilyk[]" rows="1" class="form-control" placeholder="Сертификаттар" required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 sertificate_syilyk_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.sertificate_syilyk_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.sertificate_syilyk_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});




$("#naam_syilyk_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="naam_syilyk"]').length;
    const inputsCounter01 = 'naam_syilyk_' + (inputsCounter + 1);

    $("#naam_syilyk_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="naam_syilyk[]" rows="1" class="form-control" placeholder="Наамдар же сыйлыктын башка түрлөрү" required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 naam_syilyk_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.naam_syilyk_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.naam_syilyk_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});



$("#emgek_click").click(function () {
    const inputsCounter = $('.needs-validation').find('textarea[name^="emgek"]').length;
    const inputsCounter01 = 'emgek_' + (inputsCounter + 1);

    $("#emgek_pole").append('<div id="' + inputsCounter01 + '" class="row align-items-center mt-2"><div class="col-auto pr-1"><i class="fas fa-genderless pr-0" style="font-size: 12px;"></i></div><div class="col pr-0 pl-0"><textarea name="emgek[]" rows="1" class="form-control" placeholder="Эмгектер" required></textarea></div><div class="col-auto pl-0"><i class="fas fa-trash btn btn-tool pr-0 bilimi_delet"></i></div></div>');
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });

    $(document).on('click', '.emgek_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.emgek_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});




$("#ssylka_click").click(function () {
    const inputsCounter = $('.needs-validation').find('input[name^="ssylka"]').length;
    const inputsCounter01 = 'ssylka_' + (inputsCounter + 1);

    $("#ssylka_pole").append('<div id="' + inputsCounter01 + '" class="mb-3 p-1 border" style="border-radius: 4px;"><div class="card-tools text-right"><i class="fas fa-trash btn btn-tool pr-0 ssylka_delet pr-2"></i></div><div class="form-row mb-0 pb-1"><div class="form-group col-md-6 required mb-0 mt-2"><p class="required mb-0">Аталышы</p><input type="text" name="ssylka_title[]" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Web сайт, портфолио" value="{{ old('ssylka_title') }}" required autocomplete="off"><div class="invalid-feedback">Сөзсүз толтуруу керек!</div></div><div class="form-group col-md-6 required mb-0 mt-2"><p class="required mb-0">Шилтемеси</p><input type="text" name="ssylka_adress[]" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="https://my_sait.kg" value="{{ old('ssylka_adress') }}" required autocomplete="off"><div class="invalid-feedback">Сөзсүз толтуруу керек!</div></div></div></div>');

    $(document).on('click', '.ssylka_delet', function(){
        const parentimg = this.parentNode.parentNode.id;
        $(this).parents("#" + parentimg).remove();
    });

});
$(document).on('click', '.ssylka_delet', function(){
    const parentimg = this.parentNode.parentNode.id;
    $(this).parents("#" + parentimg).remove();
});


</script>





   
<script type="text/javascript">
//<!-- для инпут тайп файл --> 
$(document).ready(function () {
  bsCustomFileInput.init()
})
//<!-- для инпут тайп файл --> 
</script>




<script>
//валидация формы 
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
//валидация формы 

</script>


@endsection