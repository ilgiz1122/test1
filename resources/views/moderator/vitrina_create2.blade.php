@extends('layouts.moderator_layouts')

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
                    <div class="col-md-9">
                        <div class="card card-outline card-info">
                            <div class="card-header"> 
                                <p class="mb-0 text-center"><b>Витринага материал жайгаштыруу</b></p>
                            </div>
                            <form id="fileUploadForm" action="{{ route('moderator_vitrina_store', $for_action) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            @csrf
                                <div class="card-body pl-3 pr-3">
                                    <div class="form-group required mt-3 mb-0">
                                        <p class="required mb-0">Темасы</p>
                                            <input type="text" id='files2' name="title" maxlength="100" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="Темасын жазыңыз" value="{{ old('title') }}" required autocomplete="off">
                                        <div class="invalid-feedback">Темасын жазыңыз!</div>
                                    </div>
                                    <div class="form-row m-0">      
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="required mb-0">Категория</p>
                                            <select name="vitrina_category_id" id="materialcategory_id" class="form-control productcategory form-control-border  pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Категорияны тандаңыз</option>
                                                @foreach ($vitrina_category as $materialcategory)
                                                <option value="{{$materialcategory['id']}}">{{$materialcategory['title']}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Категорияны тандаңыз!</div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="required mb-0">Подкатегория</p>
                                            <select name="vitrina_podcategory_id" id="materialpodcategory_id" class="form-control productname form-control-border  pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Алгач категорияны тандоо керек</option>
                                            </select>
                                            <div class="invalid-feedback">Подкатегорияны тандаңыз!</div>
                                        </div>
                                    </div>
                                    <div class="form-row m-0">
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Тили</p>
                                            <select name="language" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Тилин тандаңыз</option>
                                                @foreach ($languages as $language)
                                                <option value="{{$language->id}}">{{$language->language}}</option>
                                                @endforeach
                                            </select>
                                            <div class="invalid-feedback">Тилин тандаңыз!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Баасы (сом)</p>
                                                <input type="number" pattern="\d+" name="price" min="0" max="99999" maxlength="5" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" id="firstname3" placeholder="Мисалы: 30 " value="{{ old('price') }}" required>
                                                <span class="res"></span>
                                            <div class="invalid-feedback">Баасын көрсөтүңүз!</div>
                                        </div>
                                        <div class="form-group col-md-4 mb-0 required mt-5">
                                            <p class="required mb-0">Жеткирүү</p>
                                            <select id="select1" name="type_dostavki" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" required="">
                                                <option value="" disabled="true" selected="true">Тандаңыз</option>
                                                <option value="1">Өзүңүз алып кетесиз</option>
                                                <option value="2">Акы төлөнүүчү жеткирүү</option>
                                                <option value="3">Акысыз жеткирүү</option>
                                            </select>
                                            <div class="invalid-feedback">Жеткирүү ыкмасын тандаңыз!</div>
                                        </div>
                                    </div>
                                    <div class="form-group required m-0" id="adres_dostavki">
                                        
                                    </div>
                                    


                                    <div class="form-group mt-5 required">
                                        <div class="row align-items-top">
                                          <div class="col">
                                            <p class="required mb-1">Кыскача түшүндүрмөсү</p>
                                          </div>
                                          <div class="col-auto opisanie_bottom">
                                            <i id="opisanie_text" class="fas fa-pencil-alt btn btn-tool pr-0"></i>
                                            <i id="opisanie_text_summernot" class="fas fa-trash btn btn-tool pr-0"></i>
                                          </div>
                                        </div>
                                        <div id="opisanie_text00">
                                            <div id="ttrr">
                                                <textarea name="opisanie" rows="1" id="summernote2" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required placeholder="Кыскача түшүндүрмөсүн жазыңыз" value="{{ old('opisanie') }}"></textarea>
                                                <div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    

                                    <div class="required mt-5">
                                        <div class="row align-items-top">
                                          <div class="col">
                                            <p class="required mb-1">Сүрөт <small>(min: 1, max: 19)</small></p>
                                          </div>
                                          <div class="col-auto img_hide">
                                            <i id="uploadimg_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                          </div>
                                        </div>
                                        <div class="form-group align-items-center mb-1">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control-border" id="rebate_imag" name="img[]" accept=".jpeg, .jpg, .tiff, .png, .gif, .webp"  required multiple="">
                                                <span class="custom-file-label span_img" for="rebate_imag" data-browse="Жүктөө">Сүрөттөрдү тандаңыз</span>
                                                <div class="invalid-feedback">Сүрөттөрдү тандаңыз!</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col p-0 mt-1">
                                        <div id="image-holder2" class="img_hide" style="border-radius: 4px;"></div>
                                    </div>

                                    <div class="form-row m-0">      
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="required mb-1">Телефон номериңиз <small>(чалуу үчүн)</small></p>
                                            <div class="row align-items-end hover1">
                                              <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fas fa-phone-alt pr-3" style="color: green;"></i> +996</p>
                                              </div>
                                              <div class="col pl-0">
                                                <input name="phone_for_zvonok" value="{{ old('phone_for_zvonok') }}" type="text" class="form-control color1 form-control-border  pr-1 pl-1 pt-2 pb-1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999" required="true">
                                                <div class="invalid-tooltip">Телефон номериңизди жазыңыз!</div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 mb-0 required mt-5">
                                            <p class="mb-1">WhatsApp номериңиз</p>
                                            <div class="row align-items-end hover1">
                                              <div class="col-auto pr-0">
                                                <p class="form-control form-control-border color1 pr-1 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-whatsapp pr-3" style="color: green; font-size: 20px;"></i> +996</p>
                                              </div>
                                              <div class="col pl-0">
                                                <input name="phone_for_whatsapp" value="{{ old('phone_for_whatsapp') }}" type="text" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-1 color1" data-inputmask='"mask": "(999) 999-999"' data-mask placeholder="(700) 999-999">
                                              </div>
                                            </div>
                                        </div>
                                    </div>


                               


                                    <div class="col-auto dropup mt-5 text-right p-0">
                                      <a class="btn btn-default btn-tool pt-1 pb-1 pl-3 pr-3" data-toggle="dropdown" id="dropdownMenuOffset" type="button"  data-offset="0,5">Маалымат кошуу <i class="fas fa-plus pl-2"></i></a>
                                      <!-- dropdown-menu -->
                                      <div class="dropdown-menu dropdown-menu-right pt-0 pb-0">
                                        <button class="dropdown-item for_click_telefram" type="button">
                                          <div class="media">
                                            <div class="media-body">
                                              <h3 class="dropdown-item-title pt-2 pb-2">
                                                Telegram
                                                <span class="float-right text-sm"><i class="fab fa-telegram-plane btn btn-tool" style="font-size: 25px;"></i></span>
                                              </h3>
                                            </div>
                                          </div>
                                        </button>
                                        <div class="dropdown-divider  mb-0 mt-0"></div>
                                        <input type="file" name="demofile"  hidden="" id="uploadfile"  accept=".pptx, .ppt, .pptm, .potx, .potm, .ppsx, .ppsm, .pps, .pdf, .docx, .docm, .doc, .dotx, .dotm, .rtf, .xlsx, .xlsm, .xls, .xlsb, .xltx, .xltm, .rar, .zip, .7z, .tar, .mp3, .wav, .aif, .ac3, .amr, .aud, .flac, .ogg, .wma, .avi, .flv, .m4v, .mov, .mp4, .mpeg, .mpg, .webm, .3g2, .3gp,">
                                        <button type="submit"  class="dropdown-item" id="btn-file_upload">
                                          <div class="media">
                                            <div class="media-body">
                                              <h3 class="dropdown-item-title pt-2 pb-2">
                                                Демофайл
                                                <span class="float-right text-sm"><i class="fas fa-file-upload btn btn-tool" style="font-size: 20px;"></i></span>
                                              </h3>
                                            </div>
                                          </div>
                                        </button>
                                        <div class="dropdown-divider  mb-0 mt-0"></div>
                                        
                                        <button class="dropdown-item for_click_youtube" type="button">
                                          <div class="media">
                                            <div class="media-body">
                                              <h3 class="dropdown-item-title pt-2 pb-2">
                                                YouTube видео
                                                <span class="float-right text-sm"><i class="fab fa-youtube btn btn-tool" style="font-size: 20px;"></i></span>
                                              </h3>
                                            </div>
                                          </div>
                                        </button>
                                      </div>
                                    </div>


                                    

                                    <div class="form-group file_hide_telefram mb-0 required mt-3">
                                        <div class="row align-items-top">
                                            <div class="col">
                                                <p class="required mb-1">Telegram <small>(Имя пользователя)</small></p>
                                            </div>
                                            <div class="col-auto">
                                                <i id="telegram_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                            </div>
                                        </div>
                                        <div class="row align-items-end hover1">
                                          <div class="col-auto pr-0">
                                            <p class="form-control form-control-border color1 pr-0 pl-1 pt-2 pb-0 mb-0"><i class="fab fa-telegram-plane pr-3" style="color: green;"></i> https://t.me/</p>
                                          </div>
                                          <div class="col pl-0">
                                            <input name="telegram" value="{{ old('telegram') }}" id="for_telefram_input" type="text" class="form-control form-control-border pr-1 pl-0 pt-2 pb-1 color1" placeholder="ilgiz1209">
                                            <div class="invalid-tooltip">Толтуруңуз, болбосо өчүрүңүз!</div>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="file_hide mt-5">
                                        <div class="row align-items-top">
                                            <div class="col">
                                                <p class="required mb-1">Демофайл</p>
                                            </div>
                                            <div class="col-auto">
                                                <i id="uploadfile_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                            </div>
                                        </div>
                                        <div class="row align-items-end">
                                          <div class="col-auto pr-0">
                                            <p class="m-0 pr-2"><i class="fas fa-file-upload pr-3" style="color: green;"></i> Файл: </p>
                                          </div>
                                          <div class="col pl-0">
                                            <p class="m-0 truncate2" id="uploadfile_view"></p>
                                          </div>
                                        </div>
                                        <div class="bs-stepper-line file_hide"></div>
                                    </div>

                                    <div class="file_hide_youtube required mt-5">
                                        <div class="row align-items-top">
                                            <div class="col">
                                                <p class="required mb-1">Видеонун шилтемесин коюңуз <small>(YouTube)</small></p>
                                            </div>
                                            <div class="col-auto">
                                                <i id="youtube_clear" class="fas fa-trash btn btn-tool pr-0"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <input type="text" name="youtube" value="{{ old('youtube') }}" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" placeholder="https://www.youtube.com/watch?v=h05lKbcGxtM" id="for_youtube_input"  autocomplete="off">
                                            <div class="invalid-feedback">Видеонун шилтемесин коюңуз, болбосо өчүрүңүз!</div>
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
                    <div class="col-md-3">
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


$('#opisanie_text').show();
$('#opisanie_text_summernot').hide();
$('.file_hide_telefram').hide();
$('.file_hide_youtube').hide();

$(".for_click_telefram").click(function () {
    $('.file_hide_telefram').show();
    $('#for_telefram_input').focus();
    $('#for_telefram_input').prop('required', true);
});

$("#telegram_clear").click(function () {
    $('.file_hide_telefram').hide();
    $('#for_telefram_input').prop('required', false);
});

$(".for_click_youtube").click(function () {
    $('.file_hide_youtube').show();
    $('#for_youtube_input').focus();
    $('#for_youtube_input').prop('required', true);
});

$("#youtube_clear").click(function () {
    $('.file_hide_youtube').hide();
    $('#for_youtube_input').prop('required', false);
});



$("#opisanie_text").click(function () {
    var opisanie_text = $('#summernote2').val();
    $("#ttrr").remove();
    $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" id="summernote" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required></textarea><div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div></div>');
    $('#summernote').val(opisanie_text);
    $('#opisanie_text').hide();
    $('#opisanie_text_summernot').show();

    $(function () {
    // Summernote
        $('#summernote').summernote({
            lang: 'ru-RU',            // set maximum height of editor
              placeholder: 'Кыскача түшүндүрмөсүн жазыңыз',
              disableDragAndDrop: true,
              toolbar: [
                  ['font', ['style', 'bold', 'underline', 'italic', 'strikethrough', 'superscript', 'subscript', 'height']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table', 'hr', 'link', 'picture', 'video', 'undo', 'redo', 'fullscreen']],
                ],
                focus: true,
            });
      });
});


$("#opisanie_text_summernot").click(function () {
    $("#ttrr").remove();
    $("#opisanie_text00").append('<div id="ttrr"><textarea name="opisanie" rows="1" id="summernote2" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required placeholder="Кыскача түшүндүрмөсүн жазыңыз"></textarea><div class="invalid-feedback summernote02">Кыскача түшүндүрмөсүн жазыңыз!</div></div>');
    document.getElementById("summernote2").focus();
    $('#opisanie_text').show();
    $('#opisanie_text_summernot').hide();
    $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
});
</script>



<!-- для селектов-->
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('select[name="vitrina_category_id"]').on('change',function(){
            var countryID = jQuery(this).val();
            if(countryID)
            {
                jQuery.ajax({
                    url : '/moderator_panel/vitrina/vitrina_poluchenie_podcategorii/' +countryID,
                    type : "GET",
                    dataType : "json",
                    success:function(data)
                    {
                        jQuery('select[name="vitrina_podcategory_id"]').empty();
                        $('select[name="vitrina_podcategory_id"]').append('<option value="0" disabled="true" selected="true">Подкатегорияны тандаңыз</option>');
                        jQuery.each(data, function(key,value) {
                            $('select[name="vitrina_podcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="vitrina_podcategory_id"]').empty();
            }
        });
    });
    
</script>
<!-- для селектов-->


   
<script type="text/javascript">
        $('#uploadfile').bind('change', function() {  
            if (this.files[0].size > 10485760) // 30 mb for bytes.
            {
                Swal.fire({
                          icon: 'error',
                          text: 'Размер файла превышает 10 мб!',
                          showConfirmButton: false,
                          timer: 4000,
                          timerProgressBar: true,
                          padding: '1rem',
                      })
                $(this).val('');
            }
        });


//<!-- для инпут тайп файл --> 
$(document).ready(function () {
  bsCustomFileInput.init()
})
//<!-- для инпут тайп файл --> 
</script>


<script>
// для карусели
    // отображение картинки
    $(document).ready(function() {
    function readURL(input) {if (input.files && input.files[0]) {var reader = new FileReader();
        reader.onload = function (e) {$('#rebate_old_imag').attr('src', e.target.result);}
        reader.readAsDataURL(input.files[0]);}}
        $("#rebate_imag").change(function(){readURL(this);});});
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




$('.file_hide').hide();
$('.img_hide').hide();

$(function () {
    $('#btn-file_upload').click(function (e) {
        e.preventDefault();
        $('#uploadfile').click();
    });
     $('#uploadfile').on('change', function() {
          var splittedFakePath = this.value.split('\\');
          $('#uploadfile_view').text(splittedFakePath[splittedFakePath.length - 1]);
          $('.file_hide').show();
          $('.file_hide2').hide();
          
        });
     $("#uploadfile_clear").click(function () {
        $("#uploadfile").val("");
        $('#uploadfile_view').text("");
        $('.file_hide').hide();
        $('.file_hide2').show();
    });
});

$(function () {
    $('#btn-img_upload').click(function (e) {
        e.preventDefault();
        $('#rebate_imag').click();
    });

    $('#rebate_imag').on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder2 = $("#image-holder2");
          image_holder2.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "for_upload_img border shadow-sm m-2",
                    "style": "border-radius: 4px;"
                  }).appendTo(image_holder2);
                }
                image_holder2.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Pls select only images");
          }
          $('.img_hide').show();
          $('.img_hide2').hide();
      });

    $("#uploadimg_clear").click(function () {
        $("#rebate_imag").val("");
        $(".span_img").text("Сүрөттөрдү тандаңыз");
        $('.img_hide').hide();
        $('.img_hide2').show();
        $('.for_upload_img').remove();
    });
});
</script>


<script type="text/javascript">
    $("#select1").on('change',function(){
        var value=$(this).val();
        if(value=="1")
        {
            $(".adres_dostavki").remove();
            $("#adres_dostavki").append('<div class="adres_dostavki mt-5"><div class="row align-items-top"><div class="col"><p class="required mb-1">Кайсыл даректерден алып кетишсе болот?</p></div><div class="col-auto opisanie_bottom"><i id="opisanie_text_d" class="fas fa-pencil-alt btn btn-tool pr-0"></i><i id="opisanie_text_summernot_d" class="fas fa-trash btn btn-tool pr-0"></i></div></div><div id="opisanie_text00_d"><div id="ttrr_d"><textarea name="adres_dostavki" rows="1" id="summernote2_d" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" required placeholder="Даректердин тизмесин жазыңыз"></textarea><div class="invalid-feedback">Кайсыл даректерден алып кетишсе болот?</div></div></div></div>');
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
            $('#opisanie_text_d').show();
            $('#opisanie_text_summernot_d').hide();
            document.getElementById("summernote2_d").focus();
        }
        else if(value=="2")
        {
            $(".adres_dostavki").remove();
            $("#adres_dostavki").append('<div class="adres_dostavki mt-5"><div class="row align-items-top"><div class="col"><p class="required mb-1">Кайсыл аймактарга жеткирип бере аласыз?</p></div><div class="col-auto opisanie_bottom"><i id="opisanie_text_d" class="fas fa-pencil-alt btn btn-tool pr-0"></i><i id="opisanie_text_summernot_d" class="fas fa-trash btn btn-tool pr-0"></i></div></div><div id="opisanie_text00_d"><div id="ttrr_d"><textarea name="adres_dostavki" rows="1" id="summernote2_d" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" required placeholder="Даректердин тизмесин жазыңыз"></textarea><div class="invalid-feedback">Кайсыл аймактарга жеткирип бере аласыз?</div></div></div></div>');
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
            $('#opisanie_text_d').show();
            $('#opisanie_text_summernot_d').hide();
            document.getElementById("summernote2_d").focus();
        }
        else if(value=="3")
        {
            $(".adres_dostavki").remove();
            $("#adres_dostavki").append('<div class="adres_dostavki mt-5"><div class="row align-items-top"><div class="col"><p class="required mb-1">Кайсыл аймактарга акысыз жеткирип бере аласыз?</p></div><div class="col-auto opisanie_bottom"><i id="opisanie_text_d" class="fas fa-pencil-alt btn btn-tool pr-0"></i><i id="opisanie_text_summernot_d" class="fas fa-trash btn btn-tool pr-0"></i></div></div><div id="opisanie_text00_d"><div id="ttrr_d"><textarea name="adres_dostavki" rows="1" id="summernote2_d" class="form-control form-control-border pr-1 pl-1 pt-2 pb-0" required placeholder="Даректердин тизмесин жазыңыз"></textarea><div class="invalid-feedback">Кайсыл аймактарга акысыз жеткирип бере аласыз?</div></div></div></div>');
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
            $('#opisanie_text_d').show();
            $('#opisanie_text_summernot_d').hide();
            document.getElementById("summernote2_d").focus();
        }
        $("#opisanie_text_d").click(function () {
            var opisanie_text = $('#summernote2_d').val();

            $("#ttrr_d").remove();
            $("#opisanie_text00_d").append('<div id="ttrr_d"><textarea name="adres_dostavki" id="summernote_d" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" required></textarea><div class="invalid-feedback summernote02_d">Даректердин тизмесин жазыңыз!</div></div>');
            $('#summernote_d').val(opisanie_text);
            $('#opisanie_text_d').hide();
            $('#opisanie_text_summernot_d').show();

            $(function () {
            // Summernote
                $('#summernote_d').summernote({
                    lang: 'ru-RU',            // set maximum height of editor
                      placeholder: 'Кыскача түшүндүрмөсүн жазыңыз',
                      disableDragAndDrop: true,
                      toolbar: [
                          ['font', ['bold', 'underline', 'italic', 'strikethrough', 'superscript', 'subscript', 'height', 'color']],
                          ['para', ['fontname', 'ul', 'ol', 'table', 'hr', 'link']],
                        ],
                        focus: true,
                    });
              });
        });

        $("#opisanie_text_summernot_d").click(function () {
            $("#ttrr_d").remove();
            $("#opisanie_text00_d").append('<div id="ttrr_d"><textarea name="adres_dostavki" rows="1" id="summernote2_d" class="form-control form-control-border  pr-1 pl-1 pt-2 pb-0" placeholder="Даректердин тизмесин жазыңыз" required></textarea><div class="invalid-feedback summernote02_d">Даректердин тизмесин жазыңыз!</div></div>');
            document.getElementById("summernote2_d").focus();
            $('#opisanie_text_d').show();
            $('#opisanie_text_summernot_d').hide();
            $(document).ready(function() {autosize(document.querySelectorAll('textarea')); });
        });
    });
</script> 

@endsection